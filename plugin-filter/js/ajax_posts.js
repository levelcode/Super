//funcion ajax para añadir`posts
function filterPost(var1,var2) {
    // This does the damn ajax request
    jQuery('.box_content_videos > .videos').remove();
    jQuery.ajax({
        type:"POST",
        url: filterAjax.ajaxurl,
        data: {
            action:'ajax_filter',
            par1:var1,
            par2:var2
        },
        success: function(data, textStatus, XMLHttpRequest) {
            jQuery('.box_content_videos').append(data);
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            callback("error", errorThrown);
        }
    });
}

