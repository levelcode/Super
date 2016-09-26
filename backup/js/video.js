var Super = function(){
	var canvas = new fabric.Canvas('canvas');
	var video = document.getElementById('video');
	var vendorURL = window.URL || window.webkitURL;
	var cam_canvas;
	var recorder;
	var ctracker = new clm.tracker;
	var num_zobject = 4;
	var gif_a = document.getElementById('vid1');
	var gif;

	//videos
	var c, ctx, c2, ctx2, v, winWidth, winHeight, vHeight, c2Width, c2Height, ratio, animation;

	v = document.createElement('video');
	v.src = 'video/gif1.mp4';
	v.autoplay = true;
	v.loop = true;
	v.addEventListener("loadedmetadata", vidLoaded, false);

	function vidLoaded() {
		ratio = v.videoHeight / v.videoWidth;
		vHeight = winWidth * ratio;
		v.width = winWidth;
		v.height = vHeight;
		console.log("video cargado");
		//createCanvas();
	}
	this.init = function(){
		//cargamos la camara
		console.log(this.camera());
		console.log(this.recorder());
		console.log(this.init_canvas("img/objetos/gif1.gif",1, 10, 10));
		console.log(this.eventos());
		console.log(this.stats());
		console.log(this.filtros());
		//Segunda camara
		//console.log(this.getVideo());
		this.gifs();
		//Reconocimiento Facial
		//console.log(this.reconocimientofacial());

	}
	this.camera = function(){
	    navigator.getMedia = 	navigator.getUserMedia ||
								navigator.webkitGetUserMedia ||
								navigator.mozGetUserMedia ||
								navigator.msGetUserMedia;
		navigator.getMedia({
			video:true,
			audio:false

		},function(stream){
			video.src = vendorURL.createObjectURL(stream);
			video.play();

		},function(error){
			// Ocurrio un error
			console.log(error.code);

		});
		return "Camara OK"
  	};
  	this.getVideo = function() {
		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
		window.URL = window.URL || window.webkitURL;

		navigator.getUserMedia({video: true}, function(localMediaStream) {
			v.src = window.URL.createObjectURL(localMediaStream);

		}, function(error) {
			console.log(error);
		});
		return "Video OK"
	};
	this.stats = function(){
		// stats
		var stats = new Stats();
		stats.setMode(0);
		stats.domElement.style.position = 'absolute';
		stats.domElement.style.left = '0px';
		stats.domElement.style.top = '124px';
		stats.domElement.style.zIndex = 1;
		document.body.appendChild( stats.domElement );
		return "Estadisticas OK"
	}
  	this.recorder = function(){
  		recorder = new CanvasRecorder(document.getElementById('canvas'), {
		    disableLogs: false
		});
		return "Grabadora OK"
  	}
  	this.init_canvas = function(url, scale, top, left){
  		//dimensiones del canvas
		canvas.setWidth(720);
        canvas.setHeight(480);
        //desactivamos seleccion por grupos
        canvas.selection = true;
        // Permitimos el scroll
        canvas.allowTouchScrolling = true;
		//Se agregan los elementos iniciales al canvas
		cam = new fabric.Image(video, {
			flipX:true,
			width:720,
			height:480,
			left: 360,
			top: 240,
			angle: 0,
			originX: 'center',
			originY: 'center',
		});
		cam.selectable = false;
		canvas.add(cam);
		cam.moveTo(0);

		insertarFotoDrag(url,false ,1,"init",scale, top, left);

		fabric.util.requestAnimFrame(function render() {
		  canvas.renderAll();
		  fabric.util.requestAnimFrame(render);
		});
		return "Canvas OK"
  	};
  	this.gifs = function(){



  		gif = new fabric.Image(v, {
			left: 360,
			top: 240,
			angle: 0,
			originX: 'center',
			originY: 'center',
		});
		gif.set('width', '720px');
		gif.width = 720;
		gif.height = 480;
		gif.crossOrigin = "Anonymous";
		var imagen = new Image();

		imagen = gif;

		var filter = new fabric.Image.filters.RemoveWhite({
		  threshold: 40,
		  distance: 140
		});
		imagen.filters.push(filter);

		
	    var imageData = canvas.getContext().getImageData(0, 0, 720, 480);
	    var data = imageData.data;
	    console.log(data);
	    var start = {
	        red: data[0],
	        green: data[1],
	        blue: data[2]
	    };

    	// iterate over all pixels
    	for(var i = 0, n = data.length; i < n; i += 4) {
        	var diff = Math.abs(data[i] - data[0]) + Math.abs(data[i+1] - data[1]) + Math.abs(data[i+2] - data[2]);
        	data[i + 3] = (diff*diff)/50;
    	}
    	canvas.getContext().putImageData(imageData, 0, 0);
    	
    	

    	//canvas.add(gif);
		canvas.add(imagen);
		imagen.moveTo(3);
		canvas.renderAll();

		
  	}
	this.cambiarfondo = function(url){
		this.this.insertarFotoDrag(url,true, false,1,"init",scale, top, left);
	}
	this.eventos = function(){
		//Grabación
		$( ".grabar" ).click(function() {
			canvas.discardActiveObject();
  			canvas.renderAll(); 
			recorder.record();
		});
		
		$('.parar').click(function() {
			recorder.stop(function(blob) {
			    var url = URL.createObjectURL(blob);
			    window.open(url);
			});
		});
		//Handler para carga de los elementos desde una lista 
		$(".botonObj img").click(function(e){

			var var_url = $(this).prop('src');
			insertarFotoDrag(var_url,true, num_zobject, "init", 0.5, 0, 0);
			num_zobject++
		});
		//Handler para carga fondos 
		$(".botonObjF img").click(function(e){
			var fondo = canvas.item(1);
			canvas.remove(fondo);
			var var_url = $(this).prop('src');
			insertarFotoDrag(var_url,false, 1, "init", 1, 0, 0);
			num_zobject++
		});
		//Función para borrar los elementos en focus
		$('#remove').click(function(){
		    var object = canvas.getActiveObject();
			if (!object){
				alert('Porfavor seleccione un objeto para eliminar');
				return '';
			}
			canvas.remove(object);
		});


		return "Eventos OK"
	}
	this.reconocimientofacial = function(){
		ctracker.init(pModel);
		ctracker.start(video);
		function positionLoop() {
	    	requestAnimationFrame(positionLoop);
		    var positions = ctracker.getCurrentPosition();
		    console.log(positions);

		    // positions = [[x_0, y_0], [x_1,y_1], ... ]
		    // do something with the positions ...
		}
		positionLoop();
		return "Reconocimiento OK"
	}
	this.filtros = function(){

		fabric.Object.prototype.transparentCorners = false;

		  var $ = function(id){return document.getElementById(id)};

		  function applyFilter(index, filter) {
		    var obj = canvas.getActiveObject();
		    obj.filters[index] = filter;
		    obj.applyFilters(canvas.renderAll.bind(canvas));
		  }

		  function applyFilterValue(index, prop, value) {
		    var obj = canvas.getActiveObject();
		    if (obj.filters[index]) {
		      obj.filters[index][prop] = value;
		      obj.applyFilters(canvas.renderAll.bind(canvas));
		    }
		  }

		  fabric.Object.prototype.padding = 5;
		  fabric.Object.prototype.transparentCorners = false;

		  var f = fabric.Image.filters;


		  canvas.on({
		    'object:selected': function() {
		      fabric.util.toArray(document.getElementsByTagName('input'))
		                          .forEach(function(el){ el.disabled = false; })

		      var filters = ['grayscale', 'invert', 'remove-white', 'sepia', 'sepia2',
		                      'brightness', 'noise', 'gradient-transparency', 'pixelate',
		                      'blur', 'sharpen', 'emboss', 'tint', 'multiply', 'blend'];

		      for (var i = 0; i < filters.length; i++) {
		        $(filters[i]).checked = !!canvas.getActiveObject().filters[i];
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
		  return "Filtros OK"

	}
	//Funciones Globales
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
			canvas.add(oImg);
			canvas.moveTo(oImg, zindex);
			canvas.renderAll();
		});
		console.log("Se agrego:"+url);
	}
	//Función para insertar imagenes desde URL
	function handleImage(e){
		var reader = new FileReader();
		reader.onload = function(event){
			//var img = new Image();
			var img = new Image();
			var foto = null;
			img.onload = function() {
				var ancho = img.width;
				var alto = img.height;
				var top = 0;
				var left = 0;
				var angulo = 0;
				EXIF.getData(img, function() {
					var dir = EXIF.getTag(this, "Orientation");
					var wh = ResizeImage(360,460,ancho, alto)
					ancho = wh[0];
					alto = wh[1];
					switch(dir){
						case 8:
							angulo = -90;
							break;
						case 3:
							angulo = 180;
							break;
						case 6:
							angulo = 90;
							top = 0;
							left = alto;
							break;
						default:
							angulo = 0;
				    }
					var imagen = new fabric.Image(img, {
						left: left,
						top: top,
						angle: angulo,
						width:ancho,
						height:alto,
						opacity: 1,
						borderColor: 'red',
					    cornerColor: 'green',
					    cornerSize: 15,
					    lockUniScaling: true,
					    transparentCorners: false
					});
					imagen.id = 'imgPre';   
					canvas.add(imagen);
					canvas.moveTo(imagen, 1);
					$("#next3").show();
					$("#imageLoader").hide();
					
		        });
			};
			img.src = event.target.result;
		}
		reader.readAsDataURL(e.target.files[0]);
	}
	
}
window.onload = function(e) {
    var superc = new Super();
    superc.init();
    window.superc = superc;
}











	
	
	

	

	/* Grabadora */

	

	// start recording <canvas> drawings

	
	
	

	

	/*
	

	canvas.on({
    	'object:selected': selectedObject,
    	'mouse:down': mousedown,
    	'mouse:up': mouseup
	});
	function mousedown(e){
		console.log("MouseDown")
		var id = canvas.getObjects().indexOf(e.target);
		if (id == 1) {
		    var portada = canvas.item(2);
	    	portada.opacity = 0.5;
        	canvas.renderAll();
	    }

	}
	function mouseup(e){
		var id = canvas.getObjects().indexOf(e.target);
		if (id == 1) {
		    var portada = canvas.item(2);
	    	//portada.opacity = 1;
        	canvas.renderAll();
	    }
	}

	function selectedObject(e) {
	    var id = canvas.getObjects().indexOf(e.target);
	    var object = canvas.item(id);
	    if(id != 1){
	    	canvas.moveTo(object, 100);
			canvas.moveTo(canvas.getObjects('text')[0], 101);
	    }else{
	    	var portada = canvas.item(2);
	    	portada.opacity = 0.5;
        	canvas.renderAll();
	    }
	    
	}

	
	//Num adornos
	var numa = 4;
	//Handler para carga de los elementos desde una lista, deven ir como img dentro de un wrapper 
	$(".botonObj img").click(function(e){
		var var_url = $(this).prop('src');
		insertarFotoDrag(var_url, true, true, 10, "obj");
		numa++
	})
	//Función para borrar los elementos en focus
	$('#remove').click(function(){
	    var object = canvas.getActiveObject();
		if (!object){
			alert('Porfavor seleccione un objeto para eliminar');
			return '';
		}
		canvas.remove(object);
	});
	*/
	

