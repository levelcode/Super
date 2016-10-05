//Ajax call
jQuery(document).ready(function($) {

	//global vars
	var par1;
	var par2;
	//Click action
	$('#filter_video .buscar').on("click",function(e){
		e.preventDefault();
			$('.default-query').remove();
			//assign vars
			var par1 = $('#gallery #filter').val(),
				par2 = $('#gallery #filter2').val();
			callback(par1,par2);
		});
		
});

function callback(var1,var2){
	console.log(var1+'///////////'+var2);
	// This does the damn ajax request

	jQuery.ajax({
	    type:"POST",
	    url: "/wp-admin/admin-ajax.php",
	    data: { 
	        action:'ajax_filter',
            par1:var1,
            par2:var2
	    },
	    success: function (data) {
	        jQuery('.box_content_videos').html(data);
	    },
        error: function(errorThrown){
            console.log(errorThrown);
        },
        timeout: 3000
	});
}
