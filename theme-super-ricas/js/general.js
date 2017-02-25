$(document).ready(function() {

    // LOADING 

    function loading() {
        $('.loading').delay(2000).fadeOut(700);
     } 

    $('.content_signs').delay(2500).fadeIn(400);
    // LOADING 

	// menu 
	$(".terminos").on('click', function(e) {
      $('#modal-test .formularios').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/mm8wpFYGT_0?autoplay=1&enablejsapi=1" frameborder="0" allowfullscreen></iframe>');
  });
  $(".ver_instructivo").on('click', function(e) {
    $('.modal').show();
    $('.modal .video').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/mm8wpFYGT_0?autoplay=1" frameborder="0" allowfullscreen></iframe>');
  });

  $(".modal").on('click', function(e) {
  	$('.modal').fadeOut( "slow" );
    $('.modal .video').html('');
  });
  var url = window.location.href;
  console.log("Local: "+url);
  if(url == "https://supercrokantes.com/" || url == "https://www.supercrokantes.com/")
  {
    $('.modal').show();
    $('.modal .video').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/mm8wpFYGT_0?autoplay=1" frameborder="0" allowfullscreen></iframe>');
  }


    loading();

    
  	
});