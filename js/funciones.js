
$(function(){
	/*FECHAS AMIGABLES*/
 	//$(".timeago").timeago();

 	/*INICIAR LA CARGA DE UNA PAGINA*/
 	$(document).on("ajaxStart",function(){
		$("#progress").fadeIn()
	})

	/*FINALIZAR LA CARGA DE UNA PAGINA*/
	$(document).ajaxStop(function(){
		$("#progress").fadeOut()
	})

 })
	var loadPage=function(file,obj){
		$.ajax({
			url:file,
			success:function(vista){
				$(obj).html(vista)
			}
		})
	}

$(document).on("click",".print",function(e){
	e.preventDefault()
	$(this).printPage()
})
//$(".print, #print").printPage();