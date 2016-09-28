<?php
/**
 * Plugin Name: Post Video Ajax
 * Plugin URI: http://levelcode.com
 * Description: Permite a los usuarios crear posts via ajax
 * Version: 1.0.0
 * Author: Camilo Vanegas
 * Author URI: http://levelcode.com
 * License: GPL2
 */

define('APFSURL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
define('APFPATH', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );

//Se instancian los scripts
function apf_enqueuescripts()
{
    wp_enqueue_script('apf', APFSURL.'/js/ajax_posts.js', array('jquery'));
    wp_localize_script( 'apf', 'apfajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', apf_enqueuescripts);

//Lectura post
function apf_addpost() {
    $results = '';
    $link_post = '';

    $title = $_POST['apftitle'];
    $video =  $_POST['apfvideo'];
    $mail =  $_POST['apfmail'];
    $alias =  $_POST['apfalias'];
    $content = $_POST['apfcontents'];

    //Conditional for duplicate post

    if (!get_page_by_title($title, 'OBJECT', 'post') ){
        //add post
        $post_id = wp_insert_post( array(
            'post_title'        => $title,
            'post_content'      => $content,
            'post_status'       => 'pending',
            'post_author'       => '2'
        ));

        //Update mail
        update_post_meta($post_id,'Mail',$mail);
        update_post_meta($post_id,'Alias',$alias);
        update_post_meta($post_id,'url_video',$video);
        //get permalink
        $link_post = get_permalink($post_id);
    }

    if ( $post_id != 0 )
    {
        $results = $link_post.'&preview=true';
    }
    else {
        $results = '*Error al añadir el video';
    }
    // Return the String
    die($results);
}

// Llamado ajax api wordpress
add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );