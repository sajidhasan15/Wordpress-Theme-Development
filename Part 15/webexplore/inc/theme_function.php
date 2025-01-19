<?php


/* Here is All footer widgets */


function webexplore_widgets_init(){
     register_sidebar (array(
          'name' => __('Footer 1', 'webexplore'),
          'id'   => 'footer-1',
          'description' => __('this is footer 1', 'webexplore'),
          'before_widgets' => '<div class="footer_widget">',
          'after_widgets' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>'
     ));
     register_sidebar (array(
          'name' => __('Footer 2', 'webexplore'),
          'id'   => 'footer-2',
          'description' => __('this is footer 2', 'webexplore'),
          'before_widgets' => '<div class="footer_widget">',
          'after_widgets' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>'
     ));
     register_sidebar (array(
          'name' => __('Footer 3', 'webexplore'),
          'id'   => 'footer-3',
          'description' => __('this is footer 3', 'webexplore'),
          'before_widgets' => '<div class="footer_widget">',
          'after_widgets' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>'
     ));
   
}

add_action('widgets_init', 'webexplore_widgets_init');




/* Here is for Logo customizer */

function webexplore_customizer_register($wp_customize){
     $wp_customize-> add_section('webexplore_header_area', array(
          'title' => __('Header Logo', 'webexplore'),
          'description' => 'If you interested to change your logo you can do it here.'
     ));
     $wp_customize-> add_setting('webexplore_logo', array(
          'default' => get_bloginfo('template_directory') . '/assets/images/webexplore.png',
          'sanitize_callback' => 'esc_url_raw'
     ));
     $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'webexplore_logo', array(
          'label' => __('Image Upload', 'webexplore'),
          'description' => 'You can select you logo from your local folder.',
          'settings' => 'webexplore_logo',
          'section' => 'webexplore_header_area'
     )));
     $wp_customize-> add_setting('webexplore_logo_size', array(
          'default' => 100,
          'sanitize_callback' => 'absint',
     ));
     $wp_customize-> add_control('webexplore_logo_size', array(
          'label' => __('Logo Size (%)', 'webexplore'),
          'description' => 'If you interested to change your logo size you can do it here.',
          'section' => 'webexplore_header_area',
          'settings' => 'webexplore_logo_size',
          'type' => 'number',
          'input_attrs' => array(
               'min' => 10,
               'max' => 200,
               'step' =>1,
          ),
     ));


}

add_action('customize_register','webexplore_customizer_register');