<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Super Crocantes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    	<center class="wraper">

	    	<div class="booth">
	    		<video id="video" width="720" height="480" autoplay></video>
	    		<canvas id="canvas" width="720" height="480"></canvas>
	    	</div>
	    	<div id="objetos">
                
                <ul class="lista">
                    <h4>Adornos</h4>
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
                </ul>
                <ul class="lista">
                    <h4>Fondos</h4>
                    <li>
                    <button class="botonObjF"><img id="gif1" src="img/objetos/gif1.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObjF"><img id="gif2" src="img/objetos/gif2.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObjF"><img id="gif3" src="img/objetos/gif3.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObjF"><img id="gif4" src="img/objetos/gif4.gif" alt="" width="105"></button>
                    </li>
                    <li>
                    <button class="botonObjF"><img id="gif5" src="img/objetos/gif5.gif" alt="" width="105"></button>
                    </li>  
                </ul>
            </div>
        </div>


			<div class="botonera">
				<button class="boton grabar" >Grabar</button>
	    		<button class="boton parar" >Parar</button>
	    		<button id="remove" class="boton" >Borrar Elemento</button>
                <div class="controls">
                  <h3>Filtros:</h3>
                  <p>
                    <label><span>Grises:</span> <input type="checkbox" id="grayscale"></label>
                  </p>
                  <p>
                    <label><span>Invertido:</span> <input type="checkbox" id="invert"></label>
                  </p>
                  <p>
                    <label><span>Sepia1:</span> <input type="checkbox" id="sepia"></label>
                  </p>
                  <p>
                    <label><span>Sepia2:</span> <input type="checkbox" id="sepia2"></label>
                  </p>
                  <p>
                    <label><span>Quitar Blanco:</span> <input type="checkbox" id="remove-white"></label>
                    <br>
                    <label>Limite: <input type="range" id="remove-white-threshold" value="60" min="0" max="255"></label>
                    <br>
                    <label>Distancia: <input type="range" id="remove-white-distance" value="10" min="0" max="255"></label>
                  </p>
                  <p>
                    <label><span>Brillo:</span> <input type="checkbox" id="brightness"></label>
                    <br>
                    <label>Valor: <input type="range" id="brightness-value" value="100" min="0" max="255"></label>
                  </p>
                  <p>
                    <label><span>Ruido:</span> <input type="checkbox" id="noise"></label>
                    <br>
                    <label>Valor: <input type="range" id="noise-value" value="100" min="0" max="1000"></label>
                  </p>
                  <p>
                    <label><span>Gradiente con transparencia:</span> <input type="checkbox" id="gradient-transparency"></label>
                    <br>
                    <label>Valor: <input type="range" id="gradient-transparency-value" value="100" min="0" max="255"></label>
                  </p>
                  <p>
                    <label><span>Pixelar</span> <input type="checkbox" id="pixelate"></label>
                    <br>
                    <label>Valor: <input type="range" id="pixelate-value" value="4" min="2" max="20"></label>
                  </p>
                  <p>
                    <label><span>Difuminar:</span> <input type="checkbox" id="blur"></label>
                  </p>
                  <p>
                    <label><span>Enfocar:</span> <input type="checkbox" id="sharpen"></label>
                  </p>
                  <p>
                    <label><span>Realzar:</span> <input type="checkbox" id="emboss"></label>
                  </p>
                  <p>
                    <label><span>Tinta:</span> <input type="checkbox" id="tint"></label><br>
                    <label>Color: <input type="color" id="tint-color" value=""></label><br>
                    <label>Opacidad: <input type="range" id="tint-opacity" min="0" max="1" value="1" step="0.1"></label><br>
                  </p>
                  <p>
                    <label><span>Multiplicar:</span> <input type="checkbox" id="multiply"></label><br>
                    <label>Color: <input type="color" id="multiply-color" value=""></label><br>
                  </p>
                  <p>
                  <label><span>Mezcla:</span> <input type="checkbox" id="blend"></label>
                  <br>
                  <label>Mode:</label>
                    <select id="blend-mode" name="blend-mode">
                      <option selected="" value="add">Agregar</option>
                      <option value="diff">Difuminar</option>
                      <option value="subtract">Sustraer</option>
                      <option value="multiply">Multiplicar</option>
                      <option value="screen">Pantalla</option>
                      <option value="lighten">Aclarar</option>
                      <option value="darken">Oscurecer</option>
                    </select>
                    <br>
                    <label>Color: <input type="color" id="blend-color" value="#00f900"></label><br>
                  </p>
                </div>
			</div>
    	</center>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.4/fabric.min.js"></script>
    	<script src="https://cdn.webrtc-experiment.com/RecordRTC/Whammy.js"></script>
    	<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
		<script src="https://cdn.webrtc-experiment.com/RecordRTC/CanvasRecorder.js"></script>
		<script src="js/clmtrackr.js"></script>
		<script src="js/model_pca_20_svm.js"></script>
        <script src="js/stats.min.js"></script>
        <script src="js/video.js"></script>
    </body>
</html>