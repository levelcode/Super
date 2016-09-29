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
    <title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="loader" style="width: 100%;height: 100%;background-color: #b10e17; z-index: 10000;display:block">
        <div class="loader_center"></div>
    </div>

    <div class="menu_icon">
        <a href="javascript:void(0);" class="menu"></a>
    </div>
    <div id="menu_p">
        <ul>
            <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
            <li><a href="/instrucciones">INSTRUCCIONES</a></li>
            <li><a href="/premios">PREMIOS</a></li>
            <li><a href="<?php echo home_url('/'); ?>#gallery">GALERIAS</a></li>
        </ul>   
    </div>

	<header>
        <nav>
            <ul>
                <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
                <li><a href="/instrucciones">INSTRUCCIONES</a></li>
                <li><a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url')?>/assets/logo.png" alt=""></a></li>
                <li><a href="/premios">PREMIOS</a></li>
                <li><a href="<?php echo home_url('/'); ?>#gallery">GALERIAS</a></li>
            </ul>
        </nav>
    </header>