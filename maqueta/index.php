<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- keywords -->
    <meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<!-- title -->
    <title>base</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="layoutcss/reset.css"/>
    <link rel="stylesheet" type="text/css" href="layoutcss/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="layoutcss/general.css"/>
    <link rel="stylesheet" type="text/css" href="layoutcss/mq.css"/>
    
    <!-- Styles -->
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/general.js"></script>
</head>
<body>

	<header>
        <nav>
            <div class="social">
                <a href="javascript:void(0);" class="youtube_header"></a>
                <a href="javascript:void(0);" class="facebook_header"></a>
            </div>
            <ul>
                <li><a href="javascript:void(0);">HOME</a></li>
                <li><a href="javascript:void(0);">INSTRUCCIONES</a></li>
                <li><a href="javascript:void(0);"><img src="assets/logo.png" alt=""></a></li>
                <li><a href="javascript:void(0);">PREMIOS</a></li>
                <li><a href="javascript:void(0);">GALERIAS</a></li>
            </ul>
        </nav>   
    </header>
    
    <div class="widget" style="display: block;">

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

        <div class="content_videos">
            <div class="header_videos">            
                <form action="" class="videos_form">    
                    <div class="select-style select_1">
                        <select>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                        </select>
                    </div>

                    <div class="select-style select_2">
                        <select>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                        </select>
                    </div>
                    <button></button>
                </form>
            </div>
            <div class="busqueda_galeria_botones"></div>
            <div class="box_content_videos">
                
                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>

                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>



                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>


                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>




                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>



                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>




                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>




                <div class="videos">
                    <div class="box_estrellas">
                        <div class="estrella activate"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                        <div class="estrella"></div>
                    </div>
                    <div class="box_video">
                        
                    </div>
                    <span class="nombre_video">
                        Andres rincon
                    </span>
                    <span class="titulo_video">
                        Reto super ricas
                    </span>
                    <div class="shadow_video"></div>
                </div>



            </div>
        </div>
    </div><!--widget-->



    <div class="wrapper_int" style="display: none;"><!--colocar clase premios para colocar el otro bg-->




        <div class="box_compartir"  style="display:none;">
            <div class="titulo_compartir">
                <p><strong>Andrés</strong>, ya hizo el <strong>Reto Super Crokantes</strong>, anímate a hacer el tuyo y podrás viajar a disfrutar los sonidos de Colombia...</p>
            </div>
            <div class="box_video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SRB2YlQOSBI" frameborder="0" allowfullscreen></iframe>  
            </div>
            <div class="controls_video_compartir">
                <div class="play">
                    
                </div>
            </div>
            <div class="shadow_compartir"></div>
            <div class="box_social_compartir">
                <a href="javascript:void(0);" class="compartir_facebook_video"></a>
                <a href="javascript:void(0);" class="inicia_el_reto"></a>
            </div>
        </div><!--box_compartir-->

        <div class="box_instrucciones" style="display:none;">
            <div class="titulo_instrucciones">
                <p>Solo debes seguir estos 4 pasos y podrás ganar <strong>increíbles premios</strong></p>
            </div>
            <div class="box_pasos_instrucciones">
                <div class="pasos">
                    <img src="assets/compra_logo.png" alt="">
                    <span><strong>1. COMPRA</strong></span>
                    <p>Compra un paquete de nuestros productos <br> Super Ricas - Super Crokantes, debes mostrar el paquete en alguna parte del video.</p>
                </div>
                <div class="pasos">
                    <img src="assets/rec_logo.png" alt="">
                    <span><strong>2. GRABA</strong></span>
                    <p>Graba tu reto <br> Super Crokante, solo debes “caer en el Crok” con tus <br>Super Crokantes mientras suena la canción, diviértete y  ponle toda la actitud.</p>
                </div>
                <div class="pasos">
                    <img src="assets/ingresa_logo.png" alt="">
                    <span><strong>3. INGRESA</strong></span>
                    <p>Ingresa tus datos de contacto y acepta los términos.</p>
                </div>
                <div class="pasos">
                    <img src="assets/comparte_logo.png" alt="">
                    <span><strong>4. COMPARTE</strong></span>
                    <p>Haz que tu video sea el más compartido de la semana y podrás ganar uno de nuestro premios semanales, o un viaje para dos personas a Caño Cristales con todos los gastos pagos*</p>
                </div>
            </div>
        </div><!--box_instrucciones-->

        <div class="box_premios" style="display:none;">
            <div class="titulo_premios">
                <p>Grábate haciendo el <span> <strong>Reto Super Crokantes</strong></span> , compártelo con tus amigos en Facebook, haz que tu video sea el más compartido y podrás ganar un viaje a caño cristales todo incluido* para que lo disfrutes con la persona que quieras *</p>
            </div>
            <div class="titulo_premios_2">
                <p>Además, si tu video es el más compartido de la semana podrás ganar uno de nuestros premios semanales*</p>
            </div>
            <a href="javascript:void(0);" class="inicia_el_reto"></a>
            <a href="javascript:void(0);" class="terminos_condiciones_premios">
                *Términos y condiciones
            </a>
        </div><!--box_compartir-->

        <div class="box_formulario" style="display:none;">
            <div class="titulo_formulario">
                <p>¡Está listo! ya hiciste el reto Super Crokante, ahora solo debes compartir la URL a todos tus amigos para que puedas ganar</p>
            </div>

            <div class="formulario">
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Correo">
                <input type="text" placeholder="Alias">
                <div class="box_captcha"></div>
                <a href="javascript:void(0);" class="generar_url">GENERAR URL</a>
                <input type="text" placeholder="URL GENERADA">
                <input type="submit" class="enviar_compartir" >
            </div>

            <div class="box_video_formulario">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SRB2YlQOSBI" frameborder="0" allowfullscreen></iframe>  
            </div>
            <div class="controls_video_compartir">
                <div class="play">
                    
                </div>
            </div>
            <div class="shadow_compartir"></div>
            <a href="" class="volver"></a>
        </div><!--box_formulario-->
    </div>

    <footer>
        <div class="terminos_y_condiciones">
            <span>Términos y condiciones</span>
            <a href="javascript:void(0);">Términos y condiciones <span>AQUI</span></a>
        </div>
        <div class="terminos_y_condiciones">
            <span>Redes sociales</span>
            <a href="javascript:void(0);" class="facebook_footer"></a>
            <a href="javascript:void(0);" class="youtube_footer"></a>
        </div>
        <div class="terminos_y_condiciones">
            <a href="javascript:void(0);" class="logo_footer">
                <img src="assets/logo_footer.png" alt="">
            </a>
        </div>
        <div class="derechos_copy">
            Reservados todos los derechos.
        </div>
    </footer>

    <script src="js/stats.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/fabric.js"></script>
    <script src="https://cdn.webrtc-experiment.com/RecordRTC/Whammy.js"></script>
    <script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
    <script src="https://cdn.webrtc-experiment.com/RecordRTC/CanvasRecorder.js"></script>
    <script src="js/clmtrackr.js"></script>
    <script src="js/model_pca_20_svm.js"></script>
    <script src="js/script.js"></script>

    
</body>
</html>