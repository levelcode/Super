//funcion ajax para añadir`posts
function apfaddpost(posttitle,postcontent,postmail,postalias,postname,postphoto,callback) {
    jQuery.ajax({
        type: 'POST',
        url: apfajax.ajaxurl,
        data: {
            action: 'apf_addpost',
            apftitle: posttitle,
            apfcontents: postcontent,
            apfmail: postmail,
            apfalias: postalias,
            apfname: postname,
            apfphoto: postphoto,
            apfvideo: postcontent

        },
        success: function(data, textStatus, XMLHttpRequest) {
            jQuery('.url_generated').val(data);
            jQuery('.url_generated').addClass('succed');
            resetvalues();
            callback("url");
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            callback("error", errorThrown);
        }
    });
}
 
function resetvalues() {
    //append body for new window
    $('body').addClass('procced-post');
    //reset value input
    $('.volver').remove();
    $('.generar_url').remove();
}