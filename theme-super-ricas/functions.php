<?php
/*
All the functions are in the PHP pages in the functions/ folder.
*/
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/cleanup.php');
require_once locate_template('/functions/enqueues.php');
require_once locate_template('/functions/search.php');

add_action('after_setup_theme', 'true_load_theme_textdomain');

function true_load_theme_textdomain(){
    load_theme_textdomain( 'bst', get_template_directory() . '/languages' );
}

//ajax action
add_action( 'wp_ajax_nopriv_ajax_filter', 'my_ajax_filter' );
add_action( 'wp_ajax_ajax_filter', 'my_ajax_filter' ); 

  
function my_ajax_filter() {
	$par1 = $_POST['par1'];
	$par2 = $_POST['par2'];

	var_dump($post_ID);
    var_dump(get_post_type($post_ID));

	$args = array(
        'post_type' => 'post',
        'posts_per_page' => 200,
        'orderby' => $par1,
		'order'   => $par2,
    );

    query_posts($args);

    while (have_posts()):the_post();

    		$videoUrl = get_post_meta(get_the_ID(), 'url_video' );
            $alias = get_post_meta(get_the_ID(), 'Alias' );
            $photo = get_post_meta(get_the_ID(), 'photo' );
            $post_state = get_post_meta(get_the_ID(), 'meta-box-dropdown' );

		?>
	<div class="videos">
        <div class="box_estrellas">
            <?php

            	rw_the_post_rating(get_the_ID(), 'front-post');
            ?>
        </div>
        <div class="box_video">
            <a href="<?php the_permalink();?>" data-attr="<?php echo $videoUrl[0]; ?>">
                <?php if($post_state[0] == "publicado"){ ?>
                    <div class="img-poster" style="display: block;">
                        <img width="248" src="<?php echo bloginfo('template_url');?>/<?php echo $photo[0]; ?>" alt="Preview video2">
                    </div>
                <?php } else { ?>
                    <div class="img-poster" style="display: block;">
                        <img width="248" src="<?php bloginfo('template_url')?>/img/no_pub.jpg" alt="Video NO Aprobado">
                    </div>
                <?php } ?>
            </a>
        </div>
        <span class="nombre_video">
            <?php echo $alias[0] ?>
        </span>
        <!--span class="titulo_video">
            Reto super ricas
        </span-->
        <div class="shadow_video"></div>
    </div>
<?php		
	endwhile;
	wp_reset_postdata();
	die();
}


