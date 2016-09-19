(function() {
	var canvas = new fabric.StaticCanvas('canvas');
	var video = document.getElementById('video');
	var vendorURL = window.URL || window.webkitURL;
	var cam;

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
		// error.code

	});

	setTimeout(function(){ 
		cam = new fabric.Image(video, {
			flipX:true,
			width:400,
			height:300,
			left: 200,
			top: 150,
			angle: 0,
			originX: 'center',
			originY: 'center',
		});

		canvas.add(cam);
		//cam.getElement().play();
		cam.moveTo(0);
	}, 1500);
	/*
	var ctracker = new clm.tracker();
	ctracker.init(pModel);
	ctracker.start(video);


	function positionLoop() {
    	requestAnimationFrame(positionLoop);
	    var positions = ctracker.getCurrentPosition();
	    // positions = [[x_0, y_0], [x_1,y_1], ... ]
	    // do something with the positions ...
	}
	positionLoop();
	*/

	

	/* Grabadora */

	var recorder = new CanvasRecorder(document.getElementById('canvas'), {
	    disableLogs: false
	});

	// start recording <canvas> drawings

	$( ".grabar" ).click(function() {
		recorder.record();
	});
	
	$('.parar').click(function() {
		recorder.stop(function(blob) {
		    var url = URL.createObjectURL(blob);
		    window.open(url);
		});
	});
	init("img/objetos/1.png",0.5, 10, 10);
	function init(url, scale, top, left){
		//Se agrega al canvas
		/*
		var texto1 = new fabric.Text(texto_inicial, { 
		  fontFamily: font,
		  left: x,
		  top: y,
		  textAlign: "center",
		  evented: false,
		  fontSize: size,
		  selectable: false

		});
		*/
		insertarFotoDrag(url,false, false,1,"init",scale, top, left);
		//canvas.add(texto1);
		//canvas.moveTo(texto1, 2);

		fabric.util.requestAnimFrame(function render() {
		  canvas.renderAll();
		  fabric.util.requestAnimFrame(render);
		});
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

	canvas.on({
    	'object:selected': selectedObject,
    	'mouse:down': mousedown,
    	'mouse:up': mouseup
	});
	function mousedown(e){
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

	function insertarFotoDrag(url, seleccionable, eventos, zindex, nombre, scale)
	{
		fabric.Image.fromURL(url, function(oImg) { 
			oImg.scale(scale);
			oImg.selectable = seleccionable;
			oImg.evented = eventos;
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
	

})();