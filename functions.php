<?php

function enqueue_scripts() {

    wp_enqueue_style( 'angularwp', get_stylesheet_uri() );

    wp_enqueue_script('angularjs', get_stylesheet_directory_uri() . '/bower_components/angular/angular.min.js');
    
    wp_enqueue_script('angularjs-route', get_stylesheet_directory_uri() . '/bower_components/angular-route/angular-route.min.js');
    
    wp_enqueue_script('angularjs-sanitize', get_stylesheet_directory_uri() . '/bower_components/angular-sanitize/angular-sanitize.min.js');

    wp_enqueue_script('angularwp-script', get_stylesheet_directory_uri() . "/js/script.js", array("angularjs", "angularjs-route", "angularjs-sanitize") );

    wp_localize_script('angularwp-script', 'localized',
        array(
            'view' => trailingslashit( get_template_directory_uri() ) . 'view/'
            )
    );

}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

/**
 * Disable emojis
 */

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

/**
 * Remove meta generator
 */

remove_action('wp_head', 'wp_generator');

/**
 * Disable WLW
 */
 
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link'); 

/**
 * Disable XML RPC for security
 */
add_filter('xmlrpc_enabled', '__return_false');
remove_action ('wp_head', 'rsd_link');
add_filter('wp_headers', 'remove_x_pingback');
function remove_x_pingback( $headers )
{
    unset( $headers['X-Pingback'] );
    return $headers;
}