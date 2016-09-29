<?php get_header(); ?>
<!--Index file-->
<div class="widget single">
	<div class="wrapper_int"><!--colocar clase premios para colocar el otro bg-->


	    <?php
	    //GET VALIDATION
	    if(isset($_GET['preview'])){
	    	echo '<h2>pronto verás tu post</h2>';
	    } else {
	    while(have_posts()):the_post();

            $videoUrl = get_post_meta($post->ID, 'url_video' );
            $post_state = get_post_meta($post->ID, 'meta-box-dropdown' );

            //post validation
            if($post_state[0] == "publicado"){
         ?>
				<script>
					alert('publicado!!');
				</script>
         <?php } else { ?>
		         <script>
					alert('no publicado!!');
				</script>
        <?php } ?>
        <!--content compartir-->
	    <div class="box_compartir">
	        <div class="titulo_compartir">
	            <p><strong><?php the_title(); ?></strong>, ya hizo el <strong>Reto Super Crokantes</strong>, anímate a hacer el tuyo y podrás viajar a disfrutar los sonidos de Colombia...</p>
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
                	<source src="https://supercrokantes.tk/wp-content/themes/theme-super-ricas/audio/super.ogg" type="audio/ogg">
                	<source src="https://supercrokantes.tk/wp-content/themes/theme-super-ricas/audio/super.mp3" type="audio/mpeg">
                Tu navegador no soporta audio HTML5
              	</audio>
	        </div>
	        <div class="shadow_compartir"></div>
	        <div class="box_social_compartir">
	            <a href="javascript:void(0);" class="compartir_facebook_video"></a>
	            <a href="<?php echo home_url('/'); ?>" class="inicia_el_reto"></a>
	        </div>
	        <script>
	        var init_single = true;
	        </script>

	    </div><!--box_compartir-->
	    <?php
	    	endwhile;
	    	wp_reset_query();
	    	}
	    ?>
    </div>
</div>
<?php get_footer();?>