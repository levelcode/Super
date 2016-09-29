<div class="content_widget">
  <center class="wrapper">
      <div class="wrapper_container">
          <div class="booth">
              <canvas id="canvas" width="720" height="480"></canvas>
              <video src="https://supercrokantes.tk/wp-content/themes/theme-super-ricas/video/barra.mp4" id="super_video"></video>
          </div>
          <div id="objetos">
              <h2>Fondos</h2>
              <ul class="lista">
                  <li>
                  <button class="botonObjF"><img id="gif1" datan="1" src="<?php bloginfo('template_url')?>/img/b1.png" alt="" width="150"></button>
                  </li>
                  <li>
                  <button class="botonObjF"><img id="gif2" datan="2" src="<?php bloginfo('template_url')?>/img/b2.png" alt="" width="150"></button>
                  </li>
                  <li>
                  <button class="botonObjF"><img id="gif3" datan="3" src="<?php bloginfo('template_url')?>/img/b3.png" alt="" width="150"></button>
                  </li>
                  <li>
                  <button class="botonObjF"><img id="gif4" datan="4" src="<?php bloginfo('template_url')?>/img/b4.png" alt="" width="150"></button>
                  </li>
              </ul>
          </div>
          <div id="controls">
              <audio id="super_audio" style="display:none">
                <source src="https://supercrokantes.tk/wp-content/themes/theme-super-ricas/audio/super.ogg" type="audio/ogg">
                <source src="https://supercrokantes.tk/wp-content/themes/theme-super-ricas/audio/super.mp3" type="audio/mpeg">
                Tu navegador no soporta audio HTML5
              </audio>
              
              <!--<h3>Controles</h3>-->
              <p class="crono">0:0</p>
              <button class="boton grabar" >Grabar</button>
              <button class="boton parar" style="display:none;" >Parar</button>
              <div class="filtros_menu">
                <div id="options_video">
                  <h3>Filtros Video:</h3>
                  <button id="normal" value="normal">Normal</button>
                  <button id="brighten" value="brighten">Iluminar</button>
                  <button id="grey" value="grey">Grises</button>
                  <button id="noise" value="noise">Ruido</button>
                  <button id="blur" value="blur">Desenfocar</button>
                  <button id="sharpen" value="sharpen">Enfocar</button>
                  <button id="edges" value="edges">Contornos</button>
                  <button id="lumos" value="lumos">Niebla</button>
                  <button id="redCyan" value="redCyan">Hypster</button>
                  <button id="redCyan2" value="redCyan2">Hypster 2</button>
                  <button id="dots" value="dots">Ruido TV 2</button>
                </div>
              </div>
              <button class="boton filtros" >Ver filtros</button>
              <button class="boton borrar" >Borrar Elemento</button>
          </div>
      </div>
      
  </center>

  <a href="javascript:void(0);" class="instrucciones_widget"></a>

</div>
