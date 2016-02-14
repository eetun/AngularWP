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