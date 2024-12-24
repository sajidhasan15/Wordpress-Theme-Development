<?php

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


/**
 * Add meta box for the image
 */

 function image_slider_meta_box_webexplore(){
     add_meta_box(
     'slider_image_meta',
     __('Slider Image', 'webexplore'),
     'slider_image_meta_box_callback_webexplore', 
     'image_slider',
     'normal',
     'default'
     );

 }
 add_action('add_meta_boxes', 'image_slider_meta_box_webexplore');

 /**
 * Add meta box callback
 */

function slider_image_meta_box_callback_webexplore($post) {
    wp_nonce_field('save_slider_image', 'slider_image_nonce');
    $slider_image = get_post_meta($post->ID, '_slider_image', true);
    ?>
<p>
     <label for="slider_image"><?php _e('Upload Image:', 'webexplore'); ?></label><br />
     <input type="hidden" id="slider_image" name="slider_image" value="<?php echo esc_attr($slider_image); ?>">
     <button type="button" class="button slider_image_upload"><?php _e('Select Image', 'webexplore'); ?></button>
     <button type="button" class="button slider_image_remove"><?php _e('Remove Image', 'webexplore'); ?></button>
</p>
<div class="slider-image-preview" style="margin-top:10px">
     <?php if ($slider_image): ?>
     <img src="<?php echo esc_url($slider_image); ?>" style="max-width:100%; height:auto;" />
     <?php endif; ?>
</div>
<?php
}


/**
 * Save the image
 */
function save_slider_image_meta_webexplore($post_id) {
    if (!isset($_POST['slider_image_nonce']) || !wp_verify_nonce($_POST['slider_image_nonce'], 'save_slider_image')) {
        return;
    }

    if (isset($_POST['slider_image'])) {
        update_post_meta($post_id, '_slider_image', esc_url_raw($_POST['slider_image']));
    }
}

add_action('save_post', 'save_slider_image_meta_webexplore');

/**
 * Enqueue admin scripts
 */
function enqueue_admin_scripts_webexplore($hook) {
    wp_enqueue_media();
    wp_enqueue_script(
        'slider_media_uploader',
        get_template_directory_uri() . '/assets/js/slider_media_uploader.js',
        array('jquery'),
        null,
        true
    );
}

add_action('admin_enqueue_scripts', 'enqueue_admin_scripts_webexplore');

/**
 * Enqueue swiper assets
 */
function enqueue_slider_assets_webexplore() {
    // Enqueue swiper CSS & JS 
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

    // Add custom JS for swiper initialization
    wp_add_inline_script('swiper-js', "
        document.addEventListener('DOMContentLoaded', function() {
          const swiper = new Swiper('.swiper-container', {
               loop: true,
               autoplay: {
                    delay: 3000,
               },
               pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
               },
               navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
               },
               slidesPerView: 1,
               spaceBetween: 20,
               breakpoints: {
                    1024: {
                         slidesPerView: 1,
                         spaceBetween: 20,
                    },
                    768: {
                         slidesPerView: 1,
                         spaceBetween: 15,
                    },
                    480: {
                         slidesPerView: 1,
                         spaceBetween: 10,
                    },
               },
          });
     });

    ");
}

add_action('wp_enqueue_scripts', 'enqueue_slider_assets_webexplore');