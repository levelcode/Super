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


//Create posts select in admin

function select_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-dropdown">Estado Post</label>
            <select name="meta-box-dropdown">
                <?php
                    $option_values = array("no publicado","publicado");

                    foreach($option_values as $key => $value)
                    {
                        if($value == get_post_meta($object->ID, "meta-box-dropdown", true))
                        {
                            ?>
                                <option selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
    <?php
}

//Create posts select
function add_select_meta_box()
{
    add_meta_box("select-meta-box", "Estado", "select_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "add_select_meta_box");

//save post select
function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_dropdown_value = "";

    if(isset($_POST["meta-box-dropdown"]))
    {
        $meta_box_dropdown_value = $_POST["meta-box-dropdown"];
    }
    update_post_meta($post_id, "meta-box-dropdown", $meta_box_dropdown_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);

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

    $rand = rand(1000000, 9999999);
    $title = $rand;
    $video =  $_POST['apfvideo'];
    $mail =  $_POST['apfmail'];
    $alias =  $_POST['apfalias'];
    $photo =  $_POST['apfphoto'];
    $name =  $_POST['apfname'];
    $content = $_POST['apfcontents'];
    $error = "";


    //Conditional for duplicate post

    if (!get_page_by_title($title, 'OBJECT', 'post') ){
        //add post
        $post_id = wp_insert_post( array(
            'post_title'        => $title,
            'post_content'      => $content,
            'post_status'       => 'publish',
            'post_author'       => '2'
        ));

        //Update mail
        update_post_meta($post_id,'Mail',$mail);
        update_post_meta($post_id,'Alias',$alias);
        update_post_meta($post_id,'url_video',$video);
        update_post_meta($post_id,'name',$name);
        update_post_meta($post_id,'photo',$photo);
        //get permalink

        $link_post = get_permalink($post_id);
    }else{
        $error = "El Nombre de post ya existe";
    }

    if ( $post_id != 0 )
    {
        
        $results = $link_post;
    }
    else {
        $results = 'Error '.$error;
    }
    // Return the String
    die($results);
}

// Llamado ajax api wordpress
add_action( 'wp_ajax_nopriv_apf_addpost', 'apf_addpost' );
add_action( 'wp_ajax_apf_addpost', 'apf_addpost' );