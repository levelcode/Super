<?php
/**
 * Plugin Name: Filtr
 * Plugin URI: http://levelcode.com
 * Description: Permite a los usuarios crear posts via ajax
 * Version: 1.0.0
 * Author: Camilo Vanegas
 * Author URI: http://levelcode.com
 * License: GPL2
 */

define('FILURL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
define('FILPATH', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );



//Se instancian los scripts
function filter_enqueuescripts()
{
    wp_enqueue_script('ajaxFilter', FILURL.'/js/ajax_posts.js', array('jquery'));
    wp_localize_script('ajaxFilter', 'filterAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', filter_enqueuescripts);


//ajax action
function my_ajax_filter() {

    $par1 = $_POST['par1'];
    $par2 = $_POST['par2'];

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
            <?php echo $alias[0]; ?>
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

// Llamado ajax api wordpress
add_action( 'wp_ajax_nopriv_ajax_filter', 'my_ajax_filter' );
add_action( 'wp_ajax_ajax_filter', 'my_ajax_filter' );