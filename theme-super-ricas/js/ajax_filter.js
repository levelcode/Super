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
            filterPost(par1,par2);
        });
});
