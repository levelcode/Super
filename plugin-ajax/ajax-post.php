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
    $mail =  $_POST['apfmail'];
    $alias =  $_POST['apfalias'];

    //Conditional for duplicate posts
    $args = array("meta_key" => "Mail", "meta_value" =>$mail);
    $posts = get_posts($args);
    if (count($posts) < 0){
        //add post
        $post_id = wp_insert_post( array(
            'post_title'        => $title,
            'post_content'      => $content,
            'post_status'       => 'pending',
            'post_author'       => '2'
        ) );

        //Update mail
        update_post_meta($post_id,'Mail',$mail);
        update_post_meta($post_id,'Alias',$alias);
    }
 
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

add_action( 'init', 'my_func' );

function my_func()  {
$my_post = '';
if( get_page_by_title('test','OBJECT','ads') == NULL )
$my_post= array(
        'post_title'    => 'test',
        'post_name'     => 'test',
        'post_type'     => 'ads',
        'post_status'   => 'publish'
);
wp_insert_post( $my_post );
}

// Llamado ajax api wordpress
add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );