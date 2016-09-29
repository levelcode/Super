$(function(){
	//Gonzo script
     $('a.menu').click(function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('#menu_p').animate({
                opacity: 0,
                margin: '-100% 0 0 0',
                'z-index': -100
            }, 900 );
        }else{
            $(this).addClass('active');
            $('#menu_p').animate({
                opacity: 1,
                margin: '30px 0 0 0',
            }, 900 ).css('z-index', 100);
        }
    });
     //Hide on internal
   	$(window).load(function() {
   		$('.loader').hide();
   	});
});