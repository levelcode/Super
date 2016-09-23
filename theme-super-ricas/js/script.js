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
var stats = new Stats();
stats.setMode(0);
stats.domElement.style.position = 'absolute';
stats.domElement.style.top = '137px';
stats.domElement.style.zIndex = 1;
$('.booth').append(stats.domElement);


var c, ctx, c2, ctx2, v, winWidth, winHeight, vHeight, c2Width, c2Height, ratio, animation;

var activeFilter = 'normal';
var num_zobject = 4;



function init() {

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
	c.width = 0;
	c.height = 0;


	c2 = document.createElement('canvas');
	ctx2 = c2.getContext('2d');
	c2Width = Math.floor(winWidth / 4);
	c2Height = (winWidth / 4) * ratio;
	c2.width = c2Width;
	c2.height = c2Height;

	fabric.util.requestAnimFrame(function render() {
	  draw();
	  c.setBackgroundColor('', c.renderAll.bind(c));
	  c.renderAll();
	  fabric.util.requestAnimFrame(render);
	  stats.update();
	});
	insertarFotoDrag('img/objetos/gif2.gif',false, 1, "init", 1, 0, 0);
	getFiltrosfabric();
}

function loop() {
	animation = requestAnimationFrame( function(){ loop(); } );
	draw();
	stats.update();
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
	console.log("Grabadora OK");
}

function getCamera() {
	navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
	window.URL = window.URL || window.webkitURL;

	navigator.getUserMedia({video: true}, function(localMediaStream) {
		v.src = window.URL.createObjectURL(localMediaStream);

	}, function(error) {
		console.log(error);
	});
	console.log("Camara OK");
}
function getEvents(){
	$( ".grabar" ).click(function() {
		$('.grabar').hide();
		$('.parar').show();
		c.discardActiveObject();
		c.renderAll();
		recorder.record();
	});

	//Stop action for generate video
	$('.parar').click(function() {
		$('.grabar').show();
		$('.parar').hide();
		recorder.stop(function(blob) {
		    var url = URL.createObjectURL(blob),
		        heightWG = $('.content_widget').outerHeight();
		    $('.box_formulario .box_video_formulario').append('<video id="video_1" controls><source src="'+url+'" type="video/webm"></video>');
		    $('body').addClass('active_form');
		    //Animation scroll
		    $('html, body').animate({
	          	scrollTop: heightWG
	        }, 1000);
		});
	});

	//Back button
	$('.volver').click(function(event) {
		$('body').removeClass('active_form');
		//Clena video
		$('.box_formulario .box_video_formulario').find('video').remove();
		//Animation scroll
	    $('html, body').animate({
          	scrollTop: 0
        }, 1000);
	});
	//Handler para carga de los elementos desde una lista
	$(".botonObj img").click(function(e){

		var var_url = $(this).prop('src');
		insertarFotoDrag(var_url,true, num_zobject, "init", 0.5, 0, 0);
		num_zobject++
	});
	//Handler para carga fondos
	$(".botonObjF img").click(function(e){
		var fondo = c.item(1);
		c.remove(fondo);
		var var_url = $(this).prop('src');
		insertarFotoDrag(var_url,false, 1, "init", 1, 0, 0);
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
	$( ".filtros" ).click(function() {
	  	$( ".filtros_menu" ).slideToggle( "slow", function() {
	    // Animation complete.
	  });
	});
	$('.filtros_menu').slideUp(0);
	console.log("Eventos OK");
}
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
	console.log("Se agrego:"+url);
}
function getFiltrosfabric(){
	fabric.Object.prototype.transparentCorners = false;

	  var $ = function(id){return document.getElementById(id)};

	  function applyFilter(index, filter) {
	    var obj = c.getActiveObject();
	    obj.filters[index] = filter;
	    obj.applyFilters(c.renderAll.bind(c));
	  }

	  function applyFilterValue(index, prop, value) {
	    var obj = c.getActiveObject();
	    if (obj.filters[index]) {
	      obj.filters[index][prop] = value;
	      obj.applyFilters(c.renderAll.bind(c));
	    }
	  }

	  fabric.Object.prototype.padding = 5;
	  fabric.Object.prototype.transparentCorners = false;

	  var f = fabric.Image.filters;


	  c.on({
	    'object:selected': function() {
	      fabric.util.toArray(document.getElementsByTagName('input'))
	                          .forEach(function(el){ el.disabled = false; })

	      var filters = ['grayscale', 'invert', 'remove-white', 'sepia', 'sepia2',
	                      'brightness', 'noise', 'gradient-transparency', 'pixelate',
	                      'blur', 'sharpen', 'emboss', 'tint', 'multiply', 'blend'];

	      for (var i = 0; i < filters.length; i++) {
	        $(filters[i]).checked = !!c.getActiveObject().filters[i];
	      }
	    },
	    'selection:cleared': function() {
	      fabric.util.toArray(document.getElementsByTagName('input'))
	                          .forEach(function(el){ el.disabled = true; })
	    }
	  });

	  $('grayscale').onclick = function() {
	    applyFilter(0, this.checked && new f.Grayscale());
	  };
	  $('invert').onclick = function() {
	    applyFilter(1, this.checked && new f.Invert());
	  };
	  $('remove-white').onclick = function () {
	    applyFilter(2, this.checked && new f.RemoveWhite({
	      threshold: $('remove-white-threshold').value,
	      distance: $('remove-white-distance').value
	    }));
	  };
	  $('remove-white-threshold').onchange = function() {
	    applyFilterValue(2, 'threshold', this.value);
	  };
	  $('remove-white-distance').onchange = function() {
	    applyFilterValue(2, 'distance', this.value);
	  };
	  $('sepia').onclick = function() {
	    applyFilter(3, this.checked && new f.Sepia());
	  };
	  $('sepia2').onclick = function() {
	    applyFilter(4, this.checked && new f.Sepia2());
	  };
	  $('brightness').onclick = function () {
	    applyFilter(5, this.checked && new f.Brightness({
	      brightness: parseInt($('brightness-value').value, 10)
	    }));
	  };
	  $('brightness-value').onchange = function() {
	    applyFilterValue(5, 'brightness', parseInt(this.value, 10));
	  };
	  $('noise').onclick = function () {
	    applyFilter(6, this.checked && new f.Noise({
	      noise: parseInt($('noise-value').value, 10)
	    }));
	  };
	  $('noise-value').onchange = function() {
	    applyFilterValue(6, 'noise', parseInt(this.value, 10));
	  };
	  $('gradient-transparency').onclick = function () {
	    applyFilter(7, this.checked && new f.GradientTransparency({
	      threshold: parseInt($('gradient-transparency-value').value, 10)
	    }));
	  };
	  $('gradient-transparency-value').onchange = function() {
	    applyFilterValue(7, 'threshold', parseInt(this.value, 10));
	  };
	  $('pixelate').onclick = function() {
	    applyFilter(8, this.checked && new f.Pixelate({
	      blocksize: parseInt($('pixelate-value').value, 10)
	    }));
	  };
	  $('pixelate-value').onchange = function() {
	    applyFilterValue(8, 'blocksize', parseInt(this.value, 10));
	  };
	  $('blur').onclick = function() {
	    applyFilter(9, this.checked && new f.Convolute({
	      matrix: [ 1/9, 1/9, 1/9,
	                1/9, 1/9, 1/9,
	                1/9, 1/9, 1/9 ]
	    }));
	  };
	  $('sharpen').onclick = function() {
	    applyFilter(10, this.checked && new f.Convolute({
	      matrix: [  0, -1,  0,
	                -1,  5, -1,
	                 0, -1,  0 ]
	    }));
	  };
	  $('emboss').onclick = function() {
	    applyFilter(11, this.checked && new f.Convolute({
	      matrix: [ 1,   1,  1,
	                1, 0.7, -1,
	               -1,  -1, -1 ]
	    }));
	  };
	  $('tint').onclick = function() {
	    applyFilter(12, this.checked && new f.Tint({
	      color: document.getElementById('tint-color').value,
	      opacity: parseFloat(document.getElementById('tint-opacity').value)
	    }));
	  };
	  $('tint-color').onchange = function() {
	    applyFilterValue(12, 'color', this.value);
	  };
	  $('tint-opacity').onchange = function() {
	    applyFilterValue(12, 'opacity', parseFloat(this.value));
	  };
	  $('multiply').onclick = function() {
	    applyFilter(13, this.checked && new f.Multiply({
	      color: document.getElementById('multiply-color').value
	    }));
	  };
	  $('multiply-color').onchange = function() {
	    applyFilterValue(13, 'color', this.value);
	  };

	  $('blend').onclick= function() {
	    applyFilter(14, this.checked && new f.Blend({
	      color: document.getElementById('blend-color').value,
	      mode: document.getElementById('blend-mode').value
	    }));
	  };

	  $('blend-mode').onchange = function() {
	    applyFilterValue(14, 'mode', this.value);
	  };

	  $('blend-color').onchange = function() {
	    applyFilterValue(14, 'color', this.value);
	  };
	  console.log("Filtros Fabric OK");
}

window.onload = init();

