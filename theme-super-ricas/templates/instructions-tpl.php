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
	            <p>Compra un paquete de cualquier sabor de Super Ricas Super Crokantes.</p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/rec_logo.png" alt="">
	            <span><strong>2. JUEGA</strong></span>
	            <p>Grábate comiendo tus papas al ritmo de la música y cae en el Croonch. <br> Decora tu video para que sea más original y métele toda la actitud.<br> <a href="#">Ver video instructivo.</a>  </p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/ingresa_logo_2.png" alt="">
	            <span><strong>3. COMPARTE</strong></span>
	            <p>Regístralo y pídele a tus amigos que te ayuden votando por tu video en 
	            <a href="https://supercrokantes.com/#gallery">www.supercrokantes.com</a>, en la sección del Ranking.<br><a href="https://supercrokantes.com/#gallery">Ver cómo</a></p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/premios.png" alt="">
	            <span><strong>4. GANA</strong></span>
	            <p><b>El lunes 10 de Abril de 2017</b> escogeremos los 10 videos más votados.
	            <br>Si tu video es el más votado de todo el concurso ,serás el ganador de uno de los grandes premios…
	            <br>Los 9 finalistas restantes, automáticamente ganarán audífonos Sony y anchetas de nuestros productos.<br><a href="<?php echo site_url(); ?>/premios" class="">Ver premios</a></p>
	        </div>
	    </div>
	</div><!--box_instrucciones-->
</div>
<script>
var init_single = true;
</script>
<?php get_footer();?>