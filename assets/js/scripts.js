/*!
* Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
* Copyright 2013-2020 Start Bootstrap
* Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
*/
(function($) {
  "use strict";
  
  // Add active state to sidbar nav links
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
    if (this.href === path) {
                sessionStorage.setItem("lasTUrl",path);
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
         e.preventDefault();
         $("body").toggleClass("sb-sidenav-toggled");
    });

    
})(jQuery);


    function convertDateFormat(string) {
      var info = string.split('-');
      return info[2] + '-' + info[1] + '-' + info[0];
    }

    function isValidDate(day,month,year)
    {
      var dteDate;
      month=month-1;
      dteDate= new Date(year,month,day);

      return ((day == dteDate.getDate())&&(month==dteDate.getMonth())&&(year==dteDate.getFullYear()));
      
    }
    function validateFecha(fecha)
    {
      var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
      if(fecha.search(patron)==0)
      {
        var values=fecha.split("-");
        if(isValidDate(values[2],values[1],values[0]))
        {
         return true;
        }
      }
      return false;
    }

/*validacion*/
function expRegular(texto,contenido){
/* console.log(texto);
console.log(contenido);
return false; */
  var letras_latinas;
  var letras_Frm;
  var ercorreo;
  var phonearray;   
  var mesaje;
  var pass;
  var varif;
  var decimal;  
  var fecha;

  switch (texto) {
    case "nombre":
     letras_latinas = /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ/-_-\s]+$/;
     varif = letras_latinas;
    break;

    case "frm":
      letras_Frm = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/;
      varif = letras_Frm;
     break;
    
    case "email":
     ercorreo=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
     varif = ercorreo;

    break;
    
    case "phone":
     phonearray = /^[0-9]+$/;
     varif =   phonearray;
    break; 
    
    case "decimales":
     decimal = /^([0-9]+\.?[0-9]{0,2})$/;
     varif =   decimal;
    break; 

    case "messagge":
    case "dir":
     mesaje = /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_;,.()¿$?\s]+$/;
     varif= mesaje; 
    break;

    case "date":
     fecha = /^\d{1,2}\-\d{1,2}\-\d{2,4}$/;
     varif = fecha;
    break; 

    case "dateSlash":
     fecha = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
     varif = fecha;
    break; 
    
    case "pass":
    pass = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
    varif =   pass;
    /*La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos.
Ejemplo:
w3Unpocodet0d0 */
    break; 

  }
  if (!(varif.test(contenido)) || contenido == "") {
       return 0;
    }else{
       return texto;
    }

}

function getAbsolutePath() {
    var loc = window.location;
    //var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    var pathName = loc.pathname.substring(0,8);
    // var pathName = loc.pathname.substring(0, 1);
    //console.log(pathName);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));    
}

function sumar(uno,dos){
  var result;
  result = (uno + dos);

  return result;
}

function restar(uno,dos){
  var resta;
  resta = (uno - dos);

  if(resta < 0){
    return 0;
  }else{
    return resta;
  }
}

function emptyInput(input){
  if(input === ''){
    return 'empty';
  }else{
    return input;
  }
}

function dosDecimales(n) {
  let t=n.toString();
  let regex=/(\d*.\d{0,2})/;
  return t.match(regex)[0];
}



/**
 * @param String name
 * @return String
 */
function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function hoy(){
        var hoy = new Date();
        var hoyAno = hoy.getFullYear();
        var hoyMes = hoy.getMonth()+1;
        var hoyDia = hoy.getDate();

        return hoyDia+"-"+hoyMes+"-"+hoyAno;
}

/* boton regresar una pantalla atras en la historia */
 document.getElementById('botondiv').onclick = function(e){
   sessionStorage.setItem("logguin","logueado");
   if(e.target == document.getElementById('backHisotry')){
     window.history.back();
   }
 }

// mostrar y coultar password

// document.getElementById('botondiv').onclick = btnreturn;
  // function btnreturn(e){
  //   var hola = $(this).attr('id');
  //   console.log(hola);
  //   sessionStorage.setItem("logguin","logueado");
  //   if(e.target == document.getElementById('backHisotry')){
  //     window.history.back();
  //   }
  // }
  


