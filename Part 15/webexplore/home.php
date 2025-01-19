<?php

/* This is for header themeplate */
get_header();

?>

<!----------------- This is for Image Slider ------------------------->


<?php
    $args = array(
        'post_type'      => 'image_slider', // Custom post type slug
        'posts_per_page' => -1,             // Get all posts
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
<!-- Swiper Slider HTML Structure -->
<div class="swiper-container">
     <div class="swiper-wrapper">
          <?php
                while ($query->have_posts()) : $query->the_post();
                    // Get the custom field value for the image
                    $slider_image = get_post_meta(get_the_ID(), '_slider_image', true);

                    if ($slider_image) :
                ?>
          <div class="swiper-slide">
               <img src="<?php echo esc_url($slider_image); ?>" alt="<?php the_title(); ?>" class="slider-image">
               <h2 class="slider-title"><?php the_title(); ?></h2>
          </div>
          <?php
                    endif;
                endwhile;
                ?>
     </div>
     <!-- Pagination and Navigation -->
     <div class="swiper-pagination"></div>
     <div class="swiper-button-next"></div>
     <div class="swiper-button-prev"></div>
</div>
<?php
    else :
        echo '<p>No sliders found.</p>';
    endif;

    wp_reset_postdata();
    ?>


<!----------------- This is for About Portion ------------------------->

<div class="container-fluid px-2 px-lg-5" id="about">
     <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
               <img src="<?php echo get_template_directory_uri() . '/assets/images/about.png'; ?>" alt="about image"
                    class="img-fluid rounded">
          </div>
          <div class="col-md-6">
               <div class="about-title mb-3">About Webexplore</div>
               <div class="about-heading mb-4">The team behind Webexplore project</div>
               <p class="about-description-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla soluta ipsa
                    provident voluptatibus quas. Veritatis excepturi maiores atque recusandae, mollitia, quo delectus
                    nam illum perferendis modi eaque laborum doloribus reprehenderit consequatur, vero totam eligendi
                    aspernatur alias quod iure error quasi! Vero adipisci aliquam rem ea cumque vitae magnam, nobis
                    accusantium nam recusandae, odit voluptatum temporibus esse numquam totam dolor pariatur.</p>
               <a href="#" class="about-button">Learn More</a>
          </div>
     </div>
</div>


<?php

/* This is for Footer themeplate */
get_footer();

?>