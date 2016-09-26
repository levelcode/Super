//funcion ajax para añadir`posts
function apfaddpost(posttitle,postcontent,postmail,postalias,postvideo) {
    jQuery.ajax({
        type: 'POST',
        url: apfajax.ajaxurl,
        data: {
            action: 'apf_addpost',
            apftitle: posttitle,
            apfcontents: postcontent,
            apfmail: postmail,
            apfalias: postalias,
            apfvideo: postvideo

        },
        success: function(data, textStatus, XMLHttpRequest) {
            var id = '#apf-response';
            jQuery(id).html('');
            jQuery(id).append(data);
            resetvalues();
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }

    });
}
 
function resetvalues() {
    //append body for new window
    $('body').addClass('procced-post');
    //reset value input
    $('#apfform input').val('');
 
}