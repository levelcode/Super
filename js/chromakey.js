$(function(){
    var img = $("#source").get(0);
    var $canvasbg = $("<div id='target-container' />");
    var canvas = $("<canvas class='greenscreen'></canvas>").get(0);
    $canvasbg.append(canvas);
    $('#container').append($canvasbg);
    img.onload = function() {
        greenScreen(img, canvas, $canvasbg);
    };
    
    var doGS;
    var slider = $( "#tolerance-control" ).slider({
        max: 255+255+255,
        min: 0,
        value: $('#tolerance').val(),
        slide : function(event, ui) {
            $('#tolerance').val(ui.value);
            clearTimeout(doGS);
            doGS = setTimeout(function(){greenScreen(img, canvas, $canvasbg);},100);
        }
    });
    var r = 70, g = 200, b = 255;
    $('#color').val('rgb(' + r + ', ' + g + ', ' + b + ')');
    var rslider = $('#color-r').slider({
        max: 255,
        min: 0,
        value: r,
        slide : function(event, ui) {
            r = ui.value;
            $('#color').val('rgb(' + r + ', ' + g + ', ' + b + ')');
            clearTimeout(doGS);
            doGS = setTimeout(function(){greenScreen(img, canvas, $canvasbg);},60);
        }
    });
    var gslider = $('#color-g').slider({
        max: 255,
        min: 0,
        value: g,
        slide : function(event, ui) {
            g = ui.value;
            $('#color').val('rgb(' + r + ', ' + g + ', ' + b + ')');
            clearTimeout(doGS);
            doGS = setTimeout(function(){greenScreen(img, canvas, $canvasbg);},60);
        }
    });
    var bslider = $('#color-b').slider({
        max: 255,
        min: 0,
        value: b,
        slide : function(event, ui) {
            b = ui.value;
            $('#color').val('rgb(' + r + ', ' + g + ', ' + b + ')');
            clearTimeout(doGS);
            doGS = setTimeout(function(){greenScreen(img, canvas, $canvasbg);},60);
        }
    });
    $('#tolerance').keyup(function(){
        slider.slider("value", $(this).val());
        clearTimeout(doGS);
        doGS = setTimeout(function(){greenScreen(img, canvas, $canvasbg);},100);
    });
});

function greenScreen(img, canvas, $container, bg) {
    var context = canvas.getContext('2d');
    canvas.width = img.clientWidth;
    canvas.height = img.clientHeight;
    $container.width(img.clientWidth);
    $container.height(img.clientHeight);
    context.drawImage(img, 0, 0);
    
    var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
    var data = imageData.data;
    var start = {
        red: data[0],
        green: data[1],
        blue: data[2]
    };

    // iterate over all pixels
    for(var i = 0, n = data.length; i < n; i += 4) {
        var diff = Math.abs(data[i] - data[0]) + Math.abs(data[i+1] - data[1]) + Math.abs(data[i+2] - data[2]);
        data[i + 3] = (diff*diff)/$('#tolerance').val();
    }
    context.putImageData(imageData, 0, 0);
    $container.css('background',$('#color').val());
}
