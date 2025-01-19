<?php


/* Here is add css, js & jQuery */

function webexplore_css_js(){

     //main style
     wp_enqueue_style('style', get_stylesheet_uri());
     wp_enqueue_style('main', get_template_directory_uri().'/assets/css/main.css',array(), '1.0.0', 'all');
     wp_enqueue_script('main', get_template_directory_uri(). '/assets/css/main.js',array(), '1.0.0', true);
     wp_enqueue_script('jquery');



     //bootstrap style
     // wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css',array(), '1.0.0', 'all');
     // wp_enqueue_script('bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.bundle.min.js',array('jquery'), '1.0.0', true);

     wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
     wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'));

     
}
add_action('wp_enqueue_scripts', 'webexplore_css_js');