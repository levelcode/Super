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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5HHKC4X');</script>
    <!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5HHKC4X"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-92604602-1', 'auto');
      ga('send', 'pageview');

    </script>
    <div class="modal">
        
        <div class="cerrar-modal">X</div>
      <div class="video">
        
      </div>
    </div>
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
            <li><a href="<?php echo home_url('/'); ?>#gallery">RANKING</a></li>
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
                <li><a href="<?php echo home_url('/'); ?>#gallery">RANKING</a></li>
            </ul>
        </nav>
    </header>