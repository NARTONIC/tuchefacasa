      function validar(){
        var form = document.check;
        var total = 0;
        for(var i = 0; i < form.platos.length; i++){
          if(form.platos[i].checked){
            total = total+1;
          }
        }  
        if(total > 4){
          for(i = 0; i < form.platos.length; i++){
            if(!form.platos[i].checked){
              form.platos[i].disabled=true;
              form.boton.disabled=false;
            }
          }
        }else{
          for(i = 0; i < form.platos.length; i++){
            form.platos[i].disabled=false;
            form.boton.disabled=true;
          }
        }
        return false;
      } 