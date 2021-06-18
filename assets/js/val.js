$(document).ready(function(){
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

        // validar direccion de envios

        $("#enviarInfoPedido").on('click',function(e){
            e.preventDefault();
           /*  var calle = $("#calle").val();
            var numero = $("#numero").val();
            var estado = $("#selectEstado").val();
            var municipio = $("#selectMunicipio").val();
            var cp = $("#cp").val();
            var ref = $("#referencia").val(); */
            

            var verificarname = expRegular('nombre',$("#calle").val());
            var retun =  useVeruif(verificarname,'calle');
            if(retun == false){return false;}

            var verificarnumero = expRegular('phone',$("#numero").val());
            var retun =  useVeruif(verificarnumero,'numero');
           if(retun == false){return false;}

            var verifiacrEstado = expRegular('phone',$("#selectEstado").val());
            var retun =  useVeruif(verifiacrEstado,'selectEstado');
           if(retun == false){return false;}

            var verificarMun = expRegular('phone',$("#selectMunicipio").val());
            var retun =  useVeruif(verificarMun,'selectMunicipio');
            if(retun == false){return false;}

            var vericarCp = expRegular('phone',$("#cp").val());
                var largo = $("#cp").val().length;
                console.log(largo);
               if(largo === 5){
                   var retun =  useVeruif(vericarCp,'cp');
            }else{
                   var retun =  useVeruif(0,'cp');
                   return false;
               }
            if(retun == false){return false;}

            var varificarAtencion = expRegular('nombre',$("#atencion").val());
            var retun =  useVeruif(varificarAtencion,'atencion');
            if(retun == false){return false;}

            var varificaReferencia = expRegular('nombre',$("#referencia").val());
            var largoRef = $("#referencia").val().length;
            if(largoRef > 500){
                var retun =  useVeruif(0,'referencia');
                return false;
            }else{
                var retun =  useVeruif(varificaReferencia,'referencia');
            }
            if(retun == false){return false;}
            
            if(retun == true){$("#frm-direccion-Pedido").submit()}
        })


})