<div class="wrapper_int"><!--colocar clase premios para colocar el otro bg-->

    <div class="box_compartir box_preview">
        <div class="titulo_compartir">
            <p>Revisa tu video antes de publicarlo</p>
        </div>
        <div class="box_video">

        </div>
        <div class="controls_video_compartir">
            <div class="play" id="play_video_prev"></div>
            <div class="stop" id="stop_video_prev" ></div>
        </div>
        <div class="shadow_compartir"></div>
        <div class="box_social_compartir">
            <a href="javascript:void(0);" class="volver"></a>
            <a href="javascript:void(0);" class="publish_preview">Publicar</a>
        </div>
    </div><!--box_compartir-->

    <div class="box_formulario">
        <div class="titulo_formulario">
            <p>¡Estás listo! ya hiciste el reto Super Crokante, ahora solo debes compartir la URL a todos tus amigos para que puedas ganar</p>
        </div>

        <form class="formulario" id="apfform" method="post" enctype="multipart/form-data">
            <div class="loader_form">
                <img src="<?php bloginfo('template_url');?>/img/loading.svg" alt="loader">
                <p></p>
                <span>Subiendo tu Video</span>
            </div><!--loader-->

            <div id="apf-response" style="background-color:#E6E6FA"></div>
            <input type="text" class="name validate[required,minSize[3]]" placeholder="Nombre" name="apftitle" required>
            <input type="email" class="mail validate[required,custom[email]]" placeholder="Correo" name="apfmail" required>
            <input type="text" class="alias validate[required,minSize[3]]" placeholder="Alias">
            <input type="hidden" class="content" name="apfcontents">
            <div class="box_captcha">
                <div class="g-recaptcha" data-sitekey="6LdCVggUAAAAAME42kSwJkp8enkbldoR2emOHkjm"></div>
            </div> 
            <input type="checkbox" class="validate[required]" placeholder="Alias"><span class="tyc">Acepto<a href="">Términos y Condiciones</a></span>
            <input type="button" class="generar_url" value="Subir">
            <input type="text" class="url_generated" placeholder="URL GENERADA" style="display:none">
            <input type="button" class="enviar_compartir" style="display:none">
        </form>

        <div class="box_video_formulario">

        </div>
        <div class="controls_video_compartir">
            <div class="play" id="play_video_def"></div>
            <div class="stop" id="stop_video_def"></div>
        </div>
        <div class="shadow_compartir"></div>
        <a href="" class="volver"></a>
    </div><!--box_formulario-->
</div>