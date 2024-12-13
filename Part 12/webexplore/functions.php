<?php

/* Here is add all theme functions */

add_theme_support('title-tag');

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


/* Here is for menu register */


register_nav_menus( array(
    'main' => esc_html__( 'Primary Menu', 'webexplore' ),
    'main-menu' => 'Main Menu'
) );



add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}


function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

function slug_provide_walker_instance( $args ) {
    if ( isset( $args['walker'] ) && is_string( $args['walker'] ) && class_exists( $args['walker'] ) ) {
        $args['walker'] = new $args['walker'];
    }
    return $args;
}
add_filter( 'wp_nav_menu_args', 'slug_provide_walker_instance', 1001 );


/**
 * Register Custom post type
 */
function create_image_slider_cpt_webexplore() {
    $labels = array(
        'name' => _x('Image Sliders', 'post type general name', 'webexplore'),
        'singular_name' => _x('Image Slider', 'post type singular name', 'webexplore'),
        'menu_name' => _x('Image Sliders', 'admin menu', 'webexplore'),
        'add_new_menu' => __('Add New Image Slider', 'webexplore'),
        'edit_item' => __('Edit Image Slider', 'webexplore'),
        'all_items' => __('All Image Sliders', 'webexplore'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title'),
    );

    register_post_type('image_slider', $args);
}

add_action('init', 'create_image_slider_cpt_webexplore');