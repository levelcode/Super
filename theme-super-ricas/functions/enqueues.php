<?php

function bst_enqueues() {

	/* Styles */

	/*Custom styles*/
	wp_register_style('reset-css', get_template_directory_uri() . '/layoutcss/reset.css', false, null);
	wp_enqueue_style('reset-css');

	wp_register_style('fonts-css', get_template_directory_uri() . '/layoutcss/fonts.css', false, null);
	wp_enqueue_style('fonts-css');

	wp_register_style('general-css', get_template_directory_uri() . '/layoutcss/general.css', false, null);
	wp_enqueue_style('general-css');

	wp_register_style('mq-css', get_template_directory_uri() . '/layoutcss/mq.css', false, null);
	wp_enqueue_style('mq-css');

	wp_register_style('validator-css', get_template_directory_uri() . '/js/validator/validationEngine.jquery.css', false, null);
	wp_enqueue_style('validator-css');

	/* Scripts */

	//add ajax support

	wp_register_script('filtr-js', get_template_directory_uri() . '/js/ajax_filter.js', false, null, true);
	wp_enqueue_script('filtr-js');

  	wp_register_script('jquery-js', get_template_directory_uri() . '/js/jquery-2.2.0.min.js', false, null, true);
	wp_enqueue_script('jquery-js');

  	wp_register_script('general-js', get_template_directory_uri() . '/js/general.js', false, null, true);
	wp_enqueue_script('general-js');

	wp_register_script('stats-js', get_template_directory_uri() . '/js/stats.min.js', false, null, true);
	wp_enqueue_script('stats-js');

	wp_register_script('fabric-js', get_template_directory_uri() . '/js/fabric.js', false, null, true);
	wp_enqueue_script('fabric-js');

	wp_register_script('validator-engine', get_template_directory_uri() . '/js/validator/jquery.validationEngine.js', false, null, true);
	wp_enqueue_script('validator-engine');

	wp_register_script('validator-engine-lang', get_template_directory_uri() . '/js/validator/jquery.validationEngine-es.js', false, null, true);
	wp_enqueue_script('validator-engine-lang');

	wp_register_script('whamy-js', 'https://cdn.webrtc-experiment.com/RecordRTC/Whammy.js', false, null, true);
	wp_enqueue_script('whamy-js');

	wp_register_script('RecordRTC-js', 'https://cdn.WebRTC-Experiment.com/RecordRTC.js', false, null, true);
	wp_enqueue_script('RecordRTC-js');

	wp_register_script('canvasRec-js', 'https://cdn.webrtc-experiment.com/RecordRTC/CanvasRecorder.js', false, null, true);
	wp_enqueue_script('canvasRec-js');

	wp_register_script('gscript-js', get_template_directory_uri() . '/js/gonzo.js', false, null, true);
	wp_enqueue_script('gscript-js');


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

    wp_register_script('custom-script-js', get_template_directory_uri() . '/js/script.js', false, null, true);
	wp_enqueue_script('custom-script-js');

}
add_action('wp_enqueue_scripts', 'bst_enqueues', 100);