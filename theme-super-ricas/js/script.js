//Globales
//Esta variable es el elemento del Blob
var url_video;
//Esta variable es el elemento de video con HTML, se genera en el evento parar
var append_video;
//variable global
var blob_video;

window.fbAsyncInit = function() {
	FB.init({
	appId      : '336586346674445',
	xfbml      : true,
	version    : 'v2.7'
	});
	console.log("Listo FB SDK")
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=336586346674445";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//**********************
//*** Salida Consola ***
//**********************

function console_dev(string){
	console.log(string);
};

//**********************
//*** Salida Consola ***
//**********************

//******************************
//*** Validadores de Browser ***
//******************************

//Search if the client is mobile
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

function iOS() {

  var iDevices = [
    'iPad Simulator',
    'iPhone Simulator',
    'iPod Simulator',
    'iPad',
    'iPhone',
    'iPod',
    'safari'
  ];

  while (iDevices.length) {
    if (navigator.platform === iDevices.pop()){ return true; }
  }
  return false;
}
function isFacebookRef(){
  var fb_valid = false;
  var ref = document.referrer
  if (ref.match(/^https?:\/\/([^\/]+\.)?facebook\.com(\/|$)/i)) {
    fb_valid = true;
    console_dev("Usuario viene de Facebook");
  }
  return fb_valid
}
function isFacebookApp() {
    var fb_valid = false;
    var ua = navigator.userAgent || navigator.vendor || window.opera;
    if((ua.indexOf("FBAN") > -1) || (ua.indexOf("FBAV") > -1))
    {
      fb_valid = true;
      console_dev("Usuario esta en inappbrowser FB");
    }
    return fb_valid
}
//Detect if comes from Mobile
var mobile = jQuery.browser.mobile;
//Detect if comes from iOS
var ios =  iOS();
//Detect if comes from facebook
var fb_valid = isFacebookRef();
//Detect if comes from FB inappbrowser
var fb_inapp = isFacebookApp();

//******************************
//*** Validadores de Browser ***
//******************************


(function() {

    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());

// stats
/*
var stats = new Stats();
stats.setMode(0);
stats.domElement.style.position = 'absolute';
stats.domElement.style.top = '137px';
stats.domElement.style.zIndex = 1;
$('.booth').append(stats.domElement);
*/


var c, ctx, c2, ctx2, v, winWidth, winHeight, vHeight, c2Width, c2Height, ratio, animation;

var activeFilter = 'normal';
var num_zobject = 4;

function con(str){
	console.log(str);
}

function init() {
	con("Constructor call");
	$('.loader').hide();
	if(init_single != true)
	{
		con("Constructor Widget");
		winWidth = 720;
		winHeight = 405;

		v = document.createElement('video');

		v.addEventListener("loadedmetadata", vidLoaded, false);

		document.getElementById('options_video').addEventListener('click', function(e) {
			var value = e.target.value;
			activeFilter = value ? value : activeFilter;
		}, false);
		getCamera();
		getRecorder();
		getEvents();
	}else{
		con("Constructor Single");
		getEvents();
	}

}

function vidLoaded() {
	ratio = v.videoHeight / v.videoWidth;
	vHeight = winWidth * ratio;
	v.width = winWidth;
	v.height = vHeight;

	createCanvas();
}

function createCanvas() {
	c = new fabric.Canvas('canvas');
	ctx = c.getContext('2d');
	ctx.translate(720, 0);
  	ctx.scale(-1, 1);
	c.width = 0;
	c.height = 0;

	var url_back = 'https://supercrokantes.com/wp-content/themes/theme-super-ricas/img/objetos/default.png';
	insertarFotoDrag(url_back,false, 0, "init", 1, 0, 0);


	c2 = document.createElement('canvas');
	ctx2 = c2.getContext('2d');
	c2Width = Math.floor(winWidth / 2);
	c2Height = (winWidth / 2) * ratio;
	c2.width = c2Width;
	c2.height = c2Height;

	fabric.util.requestAnimFrame(function render() {
	  draw();
	  c.setBackgroundColor('', c.renderAll.bind(c));
	  c.renderAll();
	  fabric.util.requestAnimFrame(render);
	  //stats.update();
	});
}

function loop() {
	animation = requestAnimationFrame( function(){ loop(); } );
	draw();
	//stats.update();
}

function draw() {

    switch (activeFilter) {
        case 'normal':
            ctx.drawImage(v, 0, 0, winWidth, vHeight);
            break;
        case 'brighten':
			brighten(50);
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'threshold':
			threshold(50);
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'grey':
			grey();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'invert':
			invert();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'noise':
			noise();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'blur':
			blur();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'sharpen':
			sharpen();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'edges':
			edges();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'lumos':
			lumos();
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'redCyan':
			colorStuff(4);
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'redCyan2':
			colorStuff(2);
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'lines':
			colorStuff(9);
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        case 'dots':
			colorStuff(7);
			ctx.drawImage(c2, 0, 0, winWidth, vHeight);
            break;
        default:
            // ARGH
        break;
    }
}
// FROM http://www.iandevlin.com/html5/webcam-filters

// Brightens the canvas image
function brighten(adj) {
	// Get the picel data from the
	var pixelData = getPixelData();
	var pixelDataLen = pixelData.data.length;
	for (var i = 0; i < pixelDataLen; i += 4 ) {
		pixelData.data[i] += adj;
		pixelData.data[i+1] += adj;
		pixelData.data[i+2] += adj;
	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}

// Thresholds the canvas image
function threshold(t) {
	var pixelData = getPixelData();
	var pixelDataLen = pixelData.data.length;
	for (var i = 0; i < pixelDataLen; i += 4 ) {
		// Get the RGB values for this pixel
		var r = pixelData.data[i];
		var g = pixelData.data[i+1];
		var b = pixelData.data[i+2];
		// Compare each pixel's greyscale value to the threshold value...
		var value = (0.2126 * r + 0.7152 * g + 0.0722 * b >= t) ? 255 : 0;
		// ...and set the colour based on the result
		pixelData.data[i] = pixelData.data[i+1] = pixelData.data[i+2] = value;
	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}

function grey() {
	var pixelData = getPixelData();
	var pixelDataLen = pixelData.data.length;
	// Loop through each pixel and convert it to grey scale
	for (var i = 0; i < pixelDataLen; i += 4 ) {
		// Get the RGB values for this pixel
		var r = pixelData.data[i];
		var g = pixelData.data[i+1];
		var b = pixelData.data[i+2];
		// Get the weighted average colour across all 3 RGB values (based on standard Colour to GrayScale convertion methods)
		var averageColour = (r + g + b) / 3;
		pixelData.data[i] = averageColour;
		pixelData.data[i+1] = averageColour;
		pixelData.data[i+2] = averageColour;
	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}

function invert() {
	var pixelData = getPixelData();
	var pixelDataLen = pixelData.data.length;

	for (var i = 0; i < pixelDataLen; i += 4 ) {
		// Get the RGB values for this pixel
		var r = pixelData.data[i];
		var g = pixelData.data[i+1];
		var b = pixelData.data[i+2];

		pixelData.data[i] = 255 - r;
		pixelData.data[i+1] = 255 - g;
		pixelData.data[i+2] = 255 - b;
	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}

function noise() {
	var pixelData = getPixelData();
	var pixelDataLen = pixelData.data.length;

	for (var i = 0; i < pixelDataLen; i += 4 ) {
		var rand =  (0.5 - Math.random()) * 70;

		var r = pixelData.data[i];
		var g = pixelData.data[i+1];
		var b = pixelData.data[i+2];

		pixelData.data[i] = r + rand;
		pixelData.data[i+1] = g + rand;
		pixelData.data[i+2] = b + rand;
	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}

// Blurs the canvas image
function blur() {
	var weights = [
		1/9, 1/9, 1/9,
		1/9, 1/9, 1/9,
		1/9, 1/9, 1/9];
	convolute(weights);
}

// Sharpens the canvas image by applying a 3x3 sharpen filter
function sharpen() {
	var weights = [
		0, -1,  0,
		-1,  5, -1,
		0, -1,  0 ];
	convolute(weights);
}

// various places, inc here http://www.phpied.com/canvas-pixels-2-convolution-matrix/
function edges() {
	var weights = [
		1, 1, 1,
		1, -7, 1,
		1, 1, 1 ];
	convolute(weights);
}

function lumos() {
	var weights = [
		1, 0, 0,
		0, 1, 0,
		0, 0, 1 ];
	convolute(weights);
}

// Applies a convolution filter
//(for more information see: http://www.html5rocks.com/en/tutorials/canvas/imagefilters/#toc-convolution)
function convolute(weights, opaque) {
	var side = Math.round(Math.sqrt(weights.length));
	var halfSide = Math.floor(side / 2);
	var pixels = getPixelData();
	var src = pixels.data;
	var sw = pixels.width;
	var sh = pixels.height;
	var pixelData = ctx2.createImageData(c2Width, c2Height);
	var dst = pixelData.data;
	// Iterate through the destination image pixels
	var alphaFac = opaque ? 1 : 0;
	for (var y = 0; y < c2Height; y++) {
		for (var x = 0; x < c2Width; x++) {
			var sy = y;
			var sx = x;
			var dstOff = (y * c2Width + x) * 4;
			// Calculate the weighed sum of the source image pixels that fall under the convolution matrix
			var r = 0, g = 0, b = 0, a = 0;
			for (var cy = 0; cy < side; cy++) {
				for (var cx = 0; cx < side; cx++) {
					var scy = sy + cy - halfSide;
					var scx = sx + cx - halfSide;
					if (scy >= 0 && scy < sh && scx >= 0 && scx < sw) {
						var srcOff = (scy * sw + scx) * 4;
						var wt = weights[cy * side + cx];
						r += src[srcOff] * wt;
						g += src[srcOff+1] * wt;
						b += src[srcOff+2] * wt;
						a += src[srcOff+3] * wt;
					}
				}
			}
			dst[dstOff] = r;
			dst[dstOff+1] = g;
			dst[dstOff+2] = b;
			dst[dstOff+3] = a + alphaFac * (255 - a);
		}
	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}

// Draws the contents of the video element onto the background canvas and returns the image data
function getPixelData() {
	// Draw the video onto the backing canvas
	ctx2.drawImage(v, 0, 0, c2Width, c2Height);
	// Grab the pixel data and work on that directly
	return ctx2.getImageData(0, 0, c2Width, c2Height);
}

function colorStuff(number) {
	var pixelData = getPixelData();
	var data = pixelData.data;
	var pixelDataLen = data.length;
	// Loop through each pixel and convert it to grey scale
	for (var i = 0; i < pixelDataLen; i += number ) {

		// Loop through the subpixels, convoluting each using an edge-detection matrix.
        if( i % 4 == 3 ) continue;
        data[i] = 127 + 2 * data[i] - data[i + 4] - data[i + c2Width * 4];

	}
	// Draw the data on the visible canvas
	ctx2.putImageData(pixelData, 0, 0);
}
function getRecorder(){
	recorder = new CanvasRecorder(document.getElementById('canvas'), {
	    disableLogs: false
	});
	con("Grabadora OK");
}
function errorMessage(message, e) {
    console.error(message, typeof e == 'undefined' ? '' : e);
    //alert(message);
}

function getCamera() {
	if (location.protocol === 'https:') {
		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
		if (navigator.getUserMedia) {
			window.URL = window.URL || window.webkitURL;
			navigator.getUserMedia({video: true}, function(localMediaStream) {
				v.src = window.URL.createObjectURL(localMediaStream);
			}, function (e) {
	            var message;
	            switch (e.name) {
	                case 'NotFoundError':
	                case 'DevicesNotFoundError':
	                    message = 'Porfavor configure su webcam primero';
	                    break;
	                case 'SourceUnavailableError':
	                    message = 'La cámara esta en estado ocupado';
	                    break;
	                case 'PermissionDeniedError':
	                case 'SecurityError':
	                    message = 'Permisos Negados';
	                    break;
	                default: errorMessage('Reeeejected!', e);
	                    return;
	            }
	            errorMessage(message);
	        });
		} else errorMessage('Navegador Incompatible');
	} else errorMessage('Use https:// para ver este sitio')
	con("Camara OK");
}

function getEvents(){

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

	$( ".grabar" ).click(function() {
		if(ios == true){
			alert("Lo sentimos, tu dispositivo no soporta grabación en linea.");
		}else{
			start_fn();
		}
	});

	//Stop action for generate video
	$('.parar').click(function() {
		detener_fn(false);
	});
	$('.publish_preview').click(function(event) {
		$('#stop_video_prev').trigger("click");
		$('.box_preview .box_video').empty();
		append_video = '<video id="video_def" ><source src="'+url_video+'" width="590" type="video/webm"></video>'
	    $('.box_formulario .box_video_formulario').append(append_video);
	    $('#play_video_def').click(function() {
	    	$('#play_video_def').hide();
	    	$('#stop_video_def').show();
	    	playAudioVideo($("#video_def"));
	    });
	    $('#stop_video_def').click(function() {
	    	$('#play_video_def').show();
	    	$('#stop_video_def').hide();
	    	stopAudioVideo($("#video_def"));
	    });
		/* Act on the event */
		$('body').addClass('active_form');
		//destroy preview
		 $('.box_preview').remove();
	});

	//Ajax form data
	$('.generar_url').click(function(event) {
		upload(postPublicado);
		$(this).parent().addClass('loading');
	});

	//Back button
	$('.volver').click(function(event) {
		$('body').removeClass('active_form');
		$('body').removeClass('active_preview');

		//Clean video
		$('.box_formulario .box_video_formulario').find('video').remove();
		$('.box_formulario .box_video_formulario').find('video').remove();

		//Reset value form
		$('#apfform input.content').val('');

		//Animation scroll
	    $('html, body').animate({
          	scrollTop: 0
        }, 1000);
	});
	//Handler para carga fondos
	$(".botonObjF img").click(function(e){
		var fondo = c.item(0);
		c.remove(fondo);
		var var_url = $(this).attr('datan');
		var url_back = 'https://supercrokantes.com/wp-content/themes/theme-super-ricas/img/objetos/gif'+var_url+'.png';
		insertarFotoDrag(url_back,false, 0, "init", 1, 0, 0);
		num_zobject++
	});
	//Función para borrar los elementos en focus
	$('.borrar').click(function(){
	    var object = c.getActiveObject();
		if (!object){
			alert('Porfavor seleccione un objeto para eliminar');
			return '';
		}
		c.remove(object);
	});
	$( ".filtros").unbind('click').click(function() {
	  	$( '#options_video' ).slideToggle( "slow", function() {
	    // Animation complete.
	  });
	});
	$('#play_video_def').click(function() {
    	$('#play_video_def').hide();
    	$('#stop_video_def').show();
    	playAudioVideo($("#video_def"));
    });
    $('#stop_video_def').click(function() {
    	$('#play_video_def').show();
    	$('#stop_video_def').hide();
    	stopAudioVideo($("#video_def"));
    });

	$('#options_video').slideUp(0);
	con("Eventos OK");

	$('.box_social_compartir').click(function() {
    	FB.ui({
		    method: 'share',
		    href: window.location.href ,
		  },
		  // callback
		  function(response) {
		    if (response && !response.error_message) {
		      alert('Posting completed.');
		    } else {
		      alert('Error while posting.');
		    }
		});
    });
    $('.enviar_compartir').click(function() {

    	//form validation
    	var name = $.trim($('#apfform .name').val()),
    		mail = $.trim($('#apfform .mail').val()),
    		alias = $.trim($('#apfform .alias').val());

    		if(name === '' || mail === '' || alias === ''){
    			alert('Ingresa los datos completos');
    			return false;
    		}

    	FB.ui({
		    method: 'share',
		    href: $('.url_generated').val(),
		  },
		  // callback
		  function(response) {
		    if (response && !response.error_message) {
		      alert('Posting completed.');
		    } else {
		      alert('Error while posting.');
		    }
		});
    });





}
//Publish preview in form
function postPublicado(progress, response){
	if(progress == "error"){
		con(String('Error al Publicar '+response));
	}else{
		con('Éxito al publicar en Wordpress');
		$('.loader_form').hide(200);
	};
};
//Upload Video
function upload(callback){
	uploadToServer(blob_video, function(progress, response) {
	    switch(progress) {
		    case "fin":
		        con("Video subido con éxito:" + response);
		       	var tName = Math.floor((Math.random() * 1000000) + 1);
		       	create(c, tName, callback_foto);
		       	function callback_foto(url, nombre){
		       		var title = nombre,
		       		name = $('.formulario .name').val(),
		       		photo = url,
					contents = response,
					mail = $('.formulario .mail').val(),
					alias = $('.formulario .alias').val();
					//Subida de post a WordPress !!! AGREGARLE LOS CAMPOS: photo y name.
					apfaddpost(title,contents,mail,alias,name,photo,callback);
		       	}
		        break;
		    case "progreso":
		    	$('.loader_form').show(200);
		    	$('.loader_form p').html(response);
		    	con("Subiendo: " + response);
		        break;
		    case "error":
		        callback(progress, response);

		        break;
		    default:
		        con("Error General");
		};
	});
};
//Start Recording
function start_fn(){
	playVideo();
	cronoStart();
	$('.grabar').hide();
	$('.parar').show();
	c.discardActiveObject();
	c.renderAll();
	recorder.record();
}
//Stop Recording
function detener_fn(valid_end){
	stopVideo();
	cronoStop();

	$('.grabar').show();
	$('.parar').hide();
	$(this).hide();
	$(this).parent().addClass('loading');
	//temporal video
	recorder.stop(function(blob) {
		if(valid_end ==true)
		{
			//Blob a glogal
			blob_video = blob;
			//Video en URL
		    url_video = URL.createObjectURL(blob_video);
		    //Elemento del video en el append
		    append_video = '<video id="video_prev" ><source src="'+url_video+'" width="590" type="video/webm"></video>'
		    $('.box_preview .box_video').append(append_video);
		    $('#play_video_prev').click(function() {
		    	$('#play_video_prev').hide();
		    	$('#stop_video_prev').show();
		    	playAudioVideo($("#video_prev"));
		    });
		    $('#stop_video_prev').click(function() {
		    	$('#play_video_prev').show();
		    	$('#stop_video_prev').hide();
		    	stopAudioVideo($("#video_prev"));
		    });
		    $('body').addClass('active_preview');
		    //send value to form
		    $('#apfform input.content').val(url_video);
		    //enable input
		    $("#apfform input").prop('disabled', false);
		    //dissapear widget
		    $('.content_widget').hide();
		}else{
			blob = null;
			alert("Debes grabar los 30 segundos para concursar!");
		}
	});
};
function cambiarfondo(url){
	insertarFotoDrag(url,true, false,1,"init",scale, top, left);
}
var insertarFotoDrag = function(url, seleccionable, zindex, nombre, scale)
{
	fabric.Image.fromURL(url, function(oImg) {
		oImg.scale(scale);
		oImg.selectable = seleccionable;
		oImg.set({
		    borderColor: 'red',
		    cornerColor: 'green',
		    cornerSize: 10,
		    transparentCorners: false
		});
		c.add(oImg);
		c.moveTo(oImg, zindex);
		c.renderAll();
	});
	con("Se agrego:"+url);
}

//Controles video y Audio Super
function playAudioVideo(video){
	video.prop("currentTime",0);
	video.trigger('play');
	$("#super_audio").trigger('play');
	var aud = document.getElementById("super_audio");
	aud.onended = function() {
	    video.trigger('pause');
	    video.prop("currentTime",0);
	};
};
function stopAudioVideo(video){
	video.trigger('pause');
  	video.prop("currentTime",0);
  	$("#super_audio").trigger('pause');
  	$("#super_audio").prop("currentTime",0);
};
function playVideo(){
	$("#super_video").trigger('play');
	var aud = document.getElementById("super_video");
	aud.onended = function() {
	    detener_fn(true);
	};
};
function stopVideo(){
  $("#super_video").trigger('pause');
  $("#super_video").prop("currentTime",0);
};
//Crono
var crono;
function cronoStart(){
	var tiempo = 0;
	var duracion = 20;
	crono = setInterval(function(){
		tiempo = $("#super_video").prop("currentTime");
		var tiempo_v = 29 - Math.floor(tiempo);
		$(".crono").html(Number(tiempo_v));
	}, 1);
}
function cronoStop(){
	clearInterval(crono);
}

function uploadToServer(blob, callback) {
    //var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
    var fileType = blob.type.split('/')[0] || 'audio';
    var fileName = (Math.random() * 1000).toString().replace('.', '');

    if (fileType === 'audio') {
        fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
    } else {
        fileName += '.webm';
    }

    // create FormData
    var formData = new FormData();
    formData.append(fileType + '-filename', fileName);
    formData.append(fileType + '-blob', blob);

    callback('Uploading ' + fileType + ' recording to server.');

    makeXMLHttpRequest('https://supercrokantes.com/wp-content/themes/theme-super-ricas/save.php', formData, function(progress) {
		var res = progress.split(":");

		switch(res[0]) {
		    case "fin":
		        var initialURL = 'https://supercrokantes.com/wp-content/themes/theme-super-ricas/uploads/';
        		callback(res[0], initialURL + fileName);
		        break;
		    case "progreso":
		        callback(res[0], res[1]);
		        break;
		    case "error":
		        callback(res[0], res[1]);
		        break;
		    default:
		        con("Error General");
		}
    });
}

function makeXMLHttpRequest(url, data, callback) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            callback('fin: Archivo Disponible');
        }
    };

    request.upload.onloadstart = function() {
        callback('progreso: Iniciando Subida...');
    };

    request.upload.onprogress = function(event) {
        callback('progreso:' + Math.round(event.loaded / event.total * 100) + "%");
    };

    request.upload.onload = function() {
        callback('progreso: Generando imagen');
    };

    request.upload.onerror = function(error) {
        callback('error :Failed to upload to server');
        console.error('XMLHttpRequest failed', error);
    };

    request.upload.onabort = function(error) {
        callback('error :Upload aborted.');
        console.error('XMLHttpRequest aborted', error);
    };

    request.open('POST', url);
    request.send(data);
}

//Funcion para crear la foto en el canvas



//create(canvas, tName, callback);

function create(canvas, tName, callback){
    canvas.discardActiveObject();
    canvas.renderAll();
    var return_t = '';

    con('name: ' + tName);
    canvas = document.getElementById("canvas");
    var imagen = canvas.toDataURL({
        format: 'jpeg',
        multiplier: 1,
        quality: 6
    })
    var file= dataURLtoBlob(imagen);
    //creamos un form data object
    var fd = new FormData();
    fd.append("foto", file);
    fd.append("name_file",tName);
    // Envío del canvas via ajax
    $.ajax({
        url: "https://supercrokantes.com/wp-content/themes/theme-super-ricas/upload_photo.php",
        type: "POST",
        data: fd,
        processData: false,
        contentType: false,
    }).done(function(respond){
        /*
        var nombre_foto = Math.floor((Math.random() * 1000000) + 1);
        downloadURL = "https://www.datapola.com/download_pic.php?file="+respond+"&name="+nombre_foto;
        */
        con('foto id:'+respond);
        callback(respond, tName);
        $('body').removeClass('loading');
    });
};
function dataURLtoBlob(dataURL) {
      var binary = atob(dataURL.split(',')[1]);
      var array = [];
      for(var i = 0; i < binary.length; i++) {
          array.push(binary.charCodeAt(i));
      }
      return new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
};

window.onload = init();

