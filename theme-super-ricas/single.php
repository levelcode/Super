<?php
    //GET VALIDATION
    if(isset($_GET['preview'])){
    	echo '<h2>pronto verás tu post</h2>';
    } else {
    while(have_posts()):the_post();
    	$alias = get_post_meta($post->ID, 'Alias' );
        $videoUrl = get_post_meta($post->ID, 'url_video' );
        $post_state = get_post_meta($post->ID, 'meta-box-dropdown' );
        $name = get_post_meta($post->ID, 'name' );
        $photo = get_post_meta($post->ID, 'photo' );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- keywords -->
    <meta name="description" content="Ayúdame a ganar votos para ir a conocer caño Cristales Con Super Ricas Super Crokantes">
	<meta name="keywords" content="Super, Ricas, super, crokantes">
    <meta property="fb:app_id"             content="336586346674445" />
	<meta property="og:url"                content="<?php the_permalink();?>" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="Vota por mi video del Reto Super Crokante"/>
	<meta property="og:description"        content="Ayúdame a ganar votos para ir a conocer caño Cristales Con Super Ricas Super Crokantes" />
	<meta property="og:image"              content="<?php echo bloginfo('template_url');?>/<?php echo $photo[0]; ?>" />
    <meta property="article:publisher" content="https://www.facebook.com/superricasoficial" />
    <meta property="article:author" content="https://www.facebook.com/superricasoficial" />
	<!-- title -->
    <title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="loader" style="width: 100%;height: 100%;background-color: rgb(190, 4, 17); z-index: 10000;display:block">
        <div class="loader_center"></div>
    </div>

    <div class="menu_icon">
        <a href="javascript:void(0);" class="menu"></a>
    </div>
    <div id="menu_p">
        <ul>
            <li><a href="<?php echo home_url('/'); ?>">INICIO</a></li>
            <li><a href="/instrucciones">INSTRUCCIONES</a></li>
            <li><a href="/premios">PREMIOS</a></li>
            <li><a href="<?php echo home_url('/'); ?>#gallery">GALERIAS</a></li>
        </ul>   
    </div>

	<header>
        <nav>
            <ul>
                <li><a href="<?php echo home_url('/'); ?>">INICIO</a></li>
                <li><a href="/instrucciones">INSTRUCCIONES</a></li>
                <li><a href="<?php echo home_url('/'); ?>">
                <img src="<?php bloginfo('template_url')?>/img/logo.png" alt=""></a></li>
                <li><a href="/premios">PREMIOS</a></li>
                <li><a href="<?php echo home_url('/'); ?>#gallery">GALERIAS</a></li>
            </ul>
        </nav>
    </header>
<!--Index file-->
<div class="widget single">
	<div class="wrapper_int"><!--colocar clase premios para colocar el otro bg-->

		<!--box_compartir-->
	    <div class="box_compartir">
	        <div class="titulo_compartir">
	            <p><strong><?php echo $alias[0]; ?></strong>, ya hizo el <strong>Reto Super Crokantes</strong>, anímate a hacer el tuyo y podrás viajar a disfrutar los sonidos de Colombia...</p>
	        </div>
	        <div class="box_video">
	        	<video id="video_def" webkit-playsinline playsinline>
                    <source src="<?php echo $videoUrl[0]; ?>" type="video/webm">
                </video>
	        </div>
	        <div class="controls_video_compartir">
	            <div class="play" id="play_video_def"></div>
	            <div class="stop" id="stop_video_def"></div>
	            <audio id="super_audio" style="display:none">
                	<source src="https://supercrokantes.com/wp-content/themes/theme-super-ricas/audio/super.ogg" type="audio/ogg">
                	<source src="https://supercrokantes.com/wp-content/themes/theme-super-ricas/audio/super.mp3" type="audio/mpeg">
                Tu navegador no soporta audio HTML5
              	</audio>
	        </div>
	        <div class="shadow_compartir"></div>
            <div class="box_estrellas">
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
            </div>
	        <div class="box_social_compartir">
	            <a href="javascript:void(0);" class="compartir_facebook_video"></a>
	            <a href="<?php echo home_url('/'); ?>" class="inicia_el_reto"></a>
	        </div>
	        
	    </div><!--box_compartir-->
	    <?php
	    	endwhile;
	    	wp_reset_query();
	    	}
	    ?>
	    <script>
        	var init_single = true;
        </script>
    </div>
</div>
<?php get_footer();?>