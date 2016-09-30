<?php
	/*
		Template name: Instrucciones
	*/
	get_header();
?>
<div class="wrapper_int">
	<div class="box_instrucciones">
	    <div class="titulo_instrucciones">
	        <p>Solo debes seguir estos 4 pasos y podrás ganar <strong>increíbles premios</strong></p>
	    </div>
	    <div class="box_pasos_instrucciones">
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/compra_logo.png" alt="">
	            <span><strong>1. PRUEBA</strong></span>
	            <p>Ten un paquete de cualquier sabor de Super Ricas Super Crokantes a la mano.</p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/rec_logo.png" alt="">
	            <span><strong>2. JUEGA</strong></span>
	            <p>Grábate comiendo tus papas Super Crokantes al ritmo de la música, intenta caer en el Croonch. Decora tu
video cómo quieras con los filtros y paisajes. Y listo… ¡Métele toda la actitud!</p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/ingresa_logo_2.png" alt="">
	            <span><strong>3. COMPARTE</strong></span>
	            <p>Escribe tus datos y comparte tu video en Facebook.</p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/premios.png" alt="">
	            <span><strong>4. GANA</strong></span>
	            <p>Pídele a tus amigos a través de tus redes que voten por tu video en la página web. Si tu video es el más votado
de la semana ganarás un increíble premio y quedarás seleccionado para participar por un viaje para dos
personas a Caño Cristales con todo incluido*. <a href="<?php echo site_url(); ?>/premios" class="">Ver Premios</a></p>
	        </div>
	    </div>
	</div><!--box_instrucciones-->
</div>
<script>
var init_single = true;
</script>
<?php get_footer();?>