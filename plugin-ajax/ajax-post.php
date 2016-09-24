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
 
    $title = $_POST['apftitle'];
    $content =  $_POST['apfcontents'];

    echo "title :".$title." Content:".$content;
 
    $post_id = wp_insert_post( array(
        'post_title'        => $title,
        'post_content'      => $content,
        'post_status'       => 'pending',
        'post_author'       => '2'
    ) );
 
    if ( $post_id != 0 )
    {
        $results = '*Post Added';
    }
    else {
        $results = '*Error occurred while adding the post';
    }
    // Return the String
    die($results);
}

// Llamado ajax api wordpress
add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );