$(function(){
     //Hide on internal
   	$(window).load(function() {
   		$('.loader').hide();
   	});

   	$('.single .box_estrellas').hide();

   	$('.single .box_estrellas').click(function(event) {
   		return false;
   	});

});