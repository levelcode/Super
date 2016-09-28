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
         ?>
	    <div class="box_compartir">
	        <div class="titulo_compartir">
	            <p><strong><?php the_title(); ?></strong>, ya hizo el <strong>Reto Super Crokantes</strong>, anímate a hacer el tuyo y podrás viajar a disfrutar los sonidos de Colombia...</p>
	        </div>
	        <div class="box_video">
	        	<video controls>
                    <source src="<?php echo $videoUrl[0]; ?>" type="video/webm">
                </video>
	        </div>
	        <div class="controls_video_compartir">
	            <div class="play"></div>
	        </div>
	        <div class="shadow_compartir"></div>
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
    </div>
</div>
<?php get_footer();?>