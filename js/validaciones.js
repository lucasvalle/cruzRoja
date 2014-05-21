
 function validar(campo)
    {
    	var campo=$(campo)
      //  var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
      //value del campo
      var valor=campo.val();
      var filtro=RegExp(campo.attr("pattern"));
      var ejm=campo.attr("title")
      var requerido=campo.attr("required");
      var max=campo.attr("max");
      var min=campo.attr("min");
      var length=valor.length;
      var pass1=campo.attr("pass0")
      var pass2=campo.attr("pass1")
		if(requerido!==undefined && length==0){
				$(campo).prev().fadeIn().html(" este campo es obligatorio");
				focus=campo.focus();
        return false;
		}else if(filtro!==undefined && filtro.test(valor)==false){
                          $(campo).prev().fadeIn().html("El Formato no es valido ejm. "+ ejm);
				focus=campo.focus();
        return false;
            }else if(min!==undefined && length<min){
                                  $(campo).prev().fadeIn().html("Minimo " + min + " Caracteres");
                          focus=campo.focus();
                          return false;
            }else if(max!==undefined && length>max){
                                  $(campo).prev().fadeIn().html("Maximo " + max + " Caracteres");
                            focus=campo.focus();
                            return false;
        	}
    }

  $(document).on("blur",  "input[validar]",function(){
   $(this).prev().fadeOut();
   validar($(this))
  })

  $(document).on("blur",  "input[validarSaldo]",function(){
   $(this).prev().fadeOut();
  $this=$(this)
  if($this.data("saldo")<$this.val()){
    $this.prev().fadeIn().html("No Alcanza") 
    $this.focus()
    $this.val("")
  }
  })

/* validar contraseña */
  $(document).on("blur","input[confirm]",function(){
    original=$("input[pass]").val();
    confirm=$(this).val();
    
    if(original !== confirm){
      $("input[pass]").prev().fadeIn().html("Las contraseñas no son iguales");
      $(this).val("")
      $("input[pass]").val("");
    }else{
      $("input[pass]").prev().children().fadeOut();
    }     

  })

