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
				$("#errorEmail").html("No coincide el formato de email");
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
				$("#errorpsw").html("No coincide el formato de password");
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
});