$(document).ready(function(){
	
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

	  // validar que los campos no se envien en blanco
	  $("#enviarRegistro").on('click',function(e){
		  e.preventDefault();
		  var name = $("#nombre").val();
		  var lastName = $("#apellidos").val();
		  var email = $("#emailRegistro").val();
		  var pasword = $("#password").val();

		  
			var verificar = expRegular('nombre',$("#nombre").val());
			if(verificar == 0){
				$("#nombre").css('border','1px solid red');
				Swal.fire({
					icon: 'error',
					title: 'NOMBRE',
					text: 'FORMATO DE NOMBRE INCORRECTO',
					footer: 'Ernesto'
				  })
				verif = false;
				return false;
			 }else{
				$("#nombre").css('border','1px solid green');
				verif = true;
			 }


			 var verificar = expRegular('nombre',$("#apellidos").val());
			 if(verificar == 0){
				$("#apellidos").css('border','1px solid red');
				Swal.fire({
					icon: 'error',
					title: 'APELLIDOS',
					text: 'FORMATO DE APELLIDOS INCORRECTO',
					footer: 'Ramirez Loyola'
				  })
				verif = false;
				return false;
			 }else{
				$("#apellidos").css('border','1px solid green');
				verif = true;
			 }

			 var verificar = expRegular('email',$("#emailRegistro").val());
			 if(verificar == 0){
				$("#emailRegistro").css('border','1px solid red');
				Swal.fire({
					icon: 'error',
					title: 'CORREO',
					text: 'FORMATO DE CORREO INCORRECTO',
					footer: 'ejemplo@ejemplo.com'
				  })
				verif = false;
				return false;
			 }else{
				$("#emailRegistro").css('border','1px solid green');
				verif = true;
			 }

			 var verificar = expRegular('pass',$("#passwordRegistro").val());
			 if(verificar == 0){
				$("#passwordRegistro").css('border','1px solid red');
				Swal.fire({
					icon: 'error',
					title: 'PASSWORD',
					text: 'FORMATO DE PASSWORD INCORRECTO',
					footer: 'La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.'
				  })
				verif = false;
				return false;
			 }else{
				$("#passwordRegistro").css('border','1px solid green');
				verif = true;
			 }

			 if(verif == true){ $("#Frm-registro").submit();}
	  	});

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


});