<?php
	/*
		Template name: premios
	*/
	get_header();
?>
<div class="wrapper_int premios">
	<div class="box_premios">
        <div class="titulos-premios">
        <h1>Vive experiencias únicas con Super Ricas - Super crokantes</h1>
        
        <h2>Si tu video es el más votado de los 10 finalistas del Reto Super Crokantes, serás el ganador de uno de estos grandes premios:</h2>
            
        </div>
        
        <div class="titulo_premios1">
            <img class="logo-premio" src="<?php bloginfo('template_url')?>/img/premio1_logo.png" alt="">
            <div class="texto">
                <p>Te llevamos a que disfrutes de una aventura extrema con un acompañante al lado de los mejores instructores de paracaidismo.</p>
                <h3>El premio incluye:</h3>
                <ul>
                    <li>Salto Tandem con un Instructor para 2 personas.</li>
                    <li>Transporte ida y vuelta de la ciudad de destino a la plataforma de lanzamiento.</li>
                    <li>Refrigerio.</li>
                    <li>Anchetas de producto.</li>
                </ul>
            </div>
        </div>
        <div class="titulo_premios2">
            <img class="logo-premio" src="<?php bloginfo('template_url')?>/img/premio2_logo.png" alt="">
            <div class="texto">
                <p>Lleva el control de una aventura única en la que vivirás al lado de un experimentado piloto la hazaña de manejar un avión.</p>
                <h3>El premio incluye:</h3>
                <ul>
                    <li>Preparación  en la cabina del avión o en simulador.</li>
                    <li>Vuelo en monomotor junto a Piloto Experto.</li>
                    <li>Transporte ida y vuelta de la ciudad de destino al lugar de la actividad.</li>
                    <li>Refrigerio.</li>
                    <li>Anchetas de producto.</li>
                </ul>
            </div>
        </div>
        <div class="titulo_premios_2">
            <p>Los 9 finalistas restantes automáticamente serán ganadores de audífonos <strong>Sony</strong> y anchetas de <span> <strong>nuestros productos.</strong></span></p>
        </div>
        <a href="<?php echo site_url(); ?>/premios" class="inicia_el_reto"></a>
        <a href="<?php echo site_url(); ?>/terminos.pdf" class="terminos_condiciones_premios">
            *Términos y condiciones
        </a>
    </div><!--box_compartir-->
</div>
<script>
var init_single = true;
</script>
<?php get_footer();?>