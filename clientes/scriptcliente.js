$(document).on("ready",function(){
	//alert ("fuunciona");
	//manejo del div buscar dni a cuil
	$('#buscadorCuil').hide();

	$('#ocultar').on('click',function(){

    	$('#buscadorCuil').hide();
	})

	$('#mostrar').on('click',function(){

    	$('#buscadorCuil').show();
	})

});