<div class="content_widget">
  <center class="wrapper">
      <div class="wrapper_container">
          <div class="booth">
              <canvas id="canvas" width="720" height="480"></canvas>
          </div>
          <div id="objetos"> 
              <h2>Adornos</h2>
              <ul class="lista">
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
              <h2>Fondos</h2>
              <ul class="lista">
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
          <div id="controls">
              <!--<h3>Controles</h3>-->
              <button class="boton grabar" >Grabar</button>
              <button class="boton parar" style="display:none;" >Parar</button>
              <button class="boton filtros" >Ver filtros</button>
              <button class="boton borrar" >Borrar Elemento</button>
          </div>
      </div>
      <div class="filtros_menu">
          <div id="options_video">
              <h3>Filtros Video:</h3>
              <button id="normal" value="normal">Normal</button>
              <button id="brighten" value="brighten">Iluminar</button>
              <button id="threshold" value="threshold">B/W</button>
              <button id="grey" value="grey">Grises</button>
              <button id="invert" value="invert">Invertir</button>
              <button id="noise" value="noise">Ruido</button>
              <button id="blur" value="blur">Desenfocar</button>
              <button id="sharpen" value="sharpen">Enfocar</button>
              <button id="edges" value="edges">Contornos</button>
              <button id="lumos" value="lumos">Niebla</button>
              <button id="redCyan" value="redCyan">Hypster</button>
              <button id="lines" value="lines">Ruido TV</button>
              <button id="dots" value="dots">Ruido TV2</button>
              
          </div>
          <div id="options_fabric">
              <h3>Filtros Elementos:</h3>
              <div id="wrapper">
                  <div class="controls">
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
                    <label>Modo:</label>
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
          </div>
      </div>
  </center>

  <a href="javascript:void(0);" class="instrucciones_widget"></a>

  </div>