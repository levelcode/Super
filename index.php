<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Super Crocantes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    	<center class="wraper">

	    	<div class="booth">
	    		<video id="video" width="400" height="300" autoplay></video>
	    		<canvas id="canvas" width="400" height="300"></canvas>
	    	</div>
	    	<div id="objetos">
                <button id="remove" class="boton" >Borrar Elemento Seleccionado</button>
                <ul id="lista">
                    <li>
                    <button class="botonObj"><img src="img/objetos/1.png" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/2.png" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/3.png" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/4.png" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/5.png" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/gif1.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/gif2.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/gif3.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/gif4.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObj"><img src="img/objetos/gif5.gif" alt="" width="105"></button>
                    </li>  
                </ul>
            </div>
        </div>


			<div class="botonera">
				<button class="boton grabar" >Grabar</button>
	    		<button class="boton parar" >Parar</button>
	    		<button id="remove" class="boton" >Borrar</button>
			</div>
    	</center>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.4/fabric.min.js"></script>
    	<script src="https://cdn.webrtc-experiment.com/RecordRTC/Whammy.js"></script>
    	<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
		<script src="https://cdn.webrtc-experiment.com/RecordRTC/CanvasRecorder.js"></script>
		<script src="js/clmtrackr.js"></script>
		<script src="js/model_pca_20_svm.js"></script>
        <script src="js/video.js"></script>
    </body>
</html>