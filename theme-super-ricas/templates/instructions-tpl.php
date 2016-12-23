<?php
	/*
		Template name: Instrucciones
	*/
	get_header();
?>
<div class="wrapper_int">
	<div class="box_instrucciones">
	    <div class="titulo_instrucciones">
	        <p>Solo debes seguir estos 4 pasos y podrás ganar <strong>Increíbles premios</strong></p>
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
	            <p>Grábate comiendo tus papas al ritmo de la música y cae en el Croonch. <br> Decora tu video para que sea más original y métele toda la actitud  <a href="#">Ver video instructivo</a>  </p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/ingresa_logo_2.png" alt="">
	            <span><strong>3. COMPARTE</strong></span>
	            <p>Regrístralo y compártelo en Facebook.<br>Pídele a tus amigos que voten por tu video. <br><a href="#">Ver Cómo</a></p>
	        </div>
	        <div class="pasos">
	            <img src="<?php bloginfo('template_url')?>/assets/premios.png" alt="">
	            <span><strong>4. GANA</strong></span>
	            <p>Si tu video es el más votado de la semana ganarás unos increíbles audífonos Sony y anchetas de nuestro producto.
Adicional a esto quedarás seleccionado para participar por el Gran Premio*. <br><a href="<?php echo site_url(); ?>/premios" class="">Ver Premios</a></p>
	        </div>
	    </div>
	</div><!--box_instrucciones-->
</div>
<script>
var init_single = true;
</script>
<?php get_footer();?>