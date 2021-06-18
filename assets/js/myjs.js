$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();   
	// datatble
	$(".TableGenerica").DataTable();

	
	var path = window.location.href;
	var login = sessionStorage.getItem("logguin");
	var prevurl = sessionStorage.getItem("lasTUrl");
	// obtener el url
      if(path == getAbsolutePath() && login == "logueado"){
	 	var session = document.getElementById("frmLogginVerif");
	 	var attr = session.getAttribute("data-id");
	 	if(attr == 1){
	 		Swal.fire({
	 		title: '¿Quieres salir de la aplicación?',
	 		showDenyButton: true,
	 		confirmButtonText: `Si Salir`,
	 		denyButtonText: `NO Quedarme`,
	 		}).then((result) => {
	 		/* Read more about isConfirmed, isDenied below */
	 		if (result.isConfirmed) {
				 sessionStorage.removeItem("logguin");
	 			$(location).attr('href',getAbsolutePath()+'Loggin/logout');
	 		} else if (result.isDenied) {
				sessionStorage.removeItem("lasTUrl");
	 			$(location).attr('href',prevurl);
	 		}
	 		})
	 	}
	 }
	 $(".eyeHiddeNo").on('click', function(){
		var tipo = $("#passwordRegistro").attr('type');
		if(tipo == "password"){
		 $("#passwordRegistro").attr('type', 'text');
		}else{
		 $("#passwordRegistro").attr('type', 'password');
		}
	   })
	/* disabled div usuario */
	$(".permisoDoctor").attr('disabled','disabled');
	$('.dropdown-toggle').on("click",function(){
		$('.dropdown-menu').toggleClass('show');
	  });

      // al pulsar el boton de inciar session
      $("#startSession").on("click",function(e){
          e.preventDefault();
		  var verif = false;
          var correo = $("#email").val();
          var pass = $("#Password").val();
		 if(correo == ""){
			$("#email").css('border','1px solid red');
			$("#errorEmail").css({"color":"red",'font-size':'x-small'});
			$("#errorEmail").html("este campo es obligatorio");
			verif = false;
			return false;
		 }else{
			var verificar = expRegular('email',$("#email").val());
			if(verificar == 0){
				$("#email").css('border','1px solid red');
				$("#errorEmail").css({"color":"red",'font-size':'x-small'});
				Swal.fire({
					icon: 'error',
					title: 'CORREO',
					text: 'FORMATO DE CORREO INCORRECTO',
					footer: 'ejemplo@ejemplo.com'
				  })
				verif = false;
				return false;
			 }else{
				$("#email").css('border','1px solid green');
				$("#errorEmail").css({"color":"red",'font-size':'x-small'});
				$("#errorEmail").html("");
				verif = true;
			 }
		 }

		 if(pass == ""){
			$("#Password").css('border','1px solid red');
			$("#errorpsw").css({"color":"red",'font-size':'x-small'});
			$("#errorpsw").html("este campo es obligatorio");
			verif = false;
				return false;
		 }else{
			 var verificar = expRegular('pass',$("#Password").val());
			 if(verificar == 0){
				$("#Password").css('border','1px solid red');
				$("#errorpsw").css({"color":"red",'font-size':'x-small'});
				Swal.fire({
					icon: 'error',
					title: 'PASSWORD',
					text: 'FORMATO DE PASSWORD INCORRECTO',
					footer: 'La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.'
				  })
				verif = false;
				return false;
			 }else{
				$("#Password").css('border','1px solid green');
				$("#errorpsw").css({"color":"red",'font-size':'x-small'});
				$("#errorpsw").html("");
				verif = true;
			 }
		 }
      
          if(verif == true){
			 $("#frmInicoSession").submit();
		  }

      })

	
		// verificar si esta libre el correo
		  $("#emailRegistro").on('change',function(){
			 var valorInput = $(this).val();
			 var correo = new FormData();
			 correo.append('email',valorInput);
			 $.ajax({
				 url:getAbsolutePath()+"views/layout/ajax.php",
				 method:"POST",
				 data:correo,
				 cache:false,
				 contentType:false,
				 processData: false,
				 beforeSend:function(){
					$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
				 },
				 success:function(existe){
					 if(existe == 100){
						$('.spinnerWhite').css('color','red');
						$('.spinnerWhite').html('FORMATO DE PASSWORD INCORRECTO');
						$('#enviarRegistro').attr('disabled','disabled');
					}else if(existe == 1){
						$('.spinnerWhite').css('color','red');
						$('.spinnerWhite').html('EL CORREO INRGESADO ESTA EN USO');
						$('#emailRegistro').css('border','1px solid red');
						$('#enviarRegistro').attr('disabled','disabled');
					 }else{
						$('.spinnerWhite').css('color','green');
						$('.spinnerWhite').html('ESTE CORREO PUEDE USARSE');
						$('#emailRegistro').css('border','1px solid GREEN');
						$('#enviarRegistro').removeAttr('disabled');
					 }
				 }
			 });
		  })

		  $("#cantidadPieza").on('keyup',function(){
			    var precioTotal = 0.0;
				var cantidad = $(this).val();
				var precio = $('#precioUnidad').val();
				precioTotal = multiplicar(cantidad,precio);

				$("#priceTotal").html(precioTotal);
		  });

		  // eliminar categoria
		  $("#deleteCategoria").on('click', function(e){
			  e.preventDefault();
			  var idCategoria = $("#categoriaHidden").val();
			  Swal.fire({
				title: 'ELIMINAR',
				text: "¿Esta Seguro que desea elimiar esta categoria?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Eliminar'
			  }).then((result) => {
				if (result.isConfirmed) {

					var idCat = new FormData();
					idCat.append('cat_id',idCategoria);
					$.ajax({
						url:getAbsolutePath()+"views/layout/ajax.php",
						method:"POST",
						data:idCat,
						cache:false,
						contentType:false,
						processData: false,
						beforeSend:function(){
							//$("#charge").addClass("spinner-grow spinner-grow-sm");

						let timerInterval
						Swal.fire({
							title: 'Verificando Datos ...',
							html: 'se esta verificando las categorias',
							timer: 2000,
							timerProgressBar: true,
							didOpen: () => {
								Swal.showLoading()
								timerInterval = setInterval(() => {
									const content = Swal.getHtmlContainer()
									if (content) {
										const b = content.querySelector('b')
										if (b) {
											b.textContent = Swal.getTimerLeft()
										}
									}
								}, 100)
							},
							willClose: () => {
								clearInterval(timerInterval)
							}
						})
							
						},
						success:function(existe){
							if(existe == 0){
								/* Swal.fire(
								'Eliminado!',
								'La categoria se elimino correctamente',
								'success'
								); */
								Swal.fire({
									title: 'Eliminado',
									text: "Se ha eliminado con exito",
									icon: 'success',
									showCancelButton: false,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'ok'
								  }).then((result) => {
									if (result.isConfirmed) {
										window.location.href = getAbsolutePath()+"categoria/index"
									}
								  })
							}else if(existe == 1){
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'ESTA CATEGORIA ESTA ASIGANDA A UNO O VARIO PRODUCTOS',
									footer: '<a href="">Why do I have this issue?</a>'
								  })
							}				
						}
					});
				}
			  })

		  });

		  // seleccionar estado
		 
		  $('.selectEstado').on('change', function(){
			var  idselec= $(this).val();		
			var pintamuni= '';
			var id =  new FormData();
			id.append("idEstado",idselec);
		
			$.ajax({
				url: getAbsolutePath()+"views/layout/ajax.php",
				method:"POST",
				data:id,
				cache:false,
				contentType:false,
				processData:false,
				beforeSend:function(){
				$('.spinnerWhite').html('<i class="fas fa-sync fa-spin"></i>');
				},
				success:function(mun){				
						$.each(mun,function(i,item){
						pintamuni+='<option value="'+item.id+'">'+item.nombre+' </option>';
					}); 
					 $('.spinnerWhite').html(''); 
					$('.selectMunicipio').html(pintamuni);
				}
			}) 
		}); 

		// redireccionar para agregar al carrito
		$("#idAddCarritoCompreas").on("click",function(e){
			e.preventDefault();
			var cantidadPedido = $("#cantidadPieza").val();
			var totalPedido = $("#priceTotal").html();
			var idPRoducto = $("#idPr").val();

			window.location.href = getAbsolutePath()+"Carrito/add&id="+idPRoducto+"&pz="+cantidadPedido+"&total="+totalPedido;
		})

});