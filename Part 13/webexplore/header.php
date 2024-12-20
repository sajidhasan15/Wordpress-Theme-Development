<?php wp_head(); ?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
     <meta charset="<?php bloginfo('charset'); ?>" class="no-js">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body <?php body_class(); ?>>

<header class="site-header">
     <div class="container-fluid px-2 px-lg-5">
          <nav class="navbar navbar-expand-lg">
               <!-- Logo -->
               <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_theme_mod('webexplore_logo', get_template_directory_uri() . '/assets/images/webexplore.png')); ?>"
                         alt="<?php bloginfo('name'); ?>"
                         style="width: <?php echo esc_attr(get_theme_mod('webexplore_logo_size', 100)); ?>%; height: auto;">
               </a>

               <!-- Toggler Button for Mobile -->
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <!-- Menu -->
               <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                         'theme_location'  => 'main-menu',
                         'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                         'container'       => false,
                         'menu_class'      => 'navbar-nav', // Bootstrap default nav classes.
                         'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                         'walker'          => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
               </div>
          </nav>
     </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
     const header = document.querySelector('.site-header');

     window.addEventListener('scroll', function() {
          const scrollY = window.scrollY;
          const viewportHeight = window.innerHeight;
          const scrollThreshold = viewportHeight * 0.50;

          if (scrollY <= scrollThreshold) {
               const opacity = scrollY / scrollThreshold;
               header.style.backgroundColor =
                    `rgba(149, 175, 192, ${opacity})`;
               header.style.borderBottomColor =
                    `rgba(149, 175, 192, ${opacity})`;
          } else {
               header.style.backgroundColor =
                    `rgba(149, 175, 192, 1)`;
               header.style.borderBottomColor =
                    `rgba(149, 175, 192, 1)`;
          }
     });
});
</script>

<style>
.site-header {
     position: fixed;
     width: 100%;
     z-index: 999;
     transition: background-color 0.5s ease, border-bottom-color 0.5s ease;
     border-bottom: 1px solid transparent;
}
</style>