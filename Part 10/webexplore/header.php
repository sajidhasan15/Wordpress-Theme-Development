<?php wp_head(); ?>

<header class="site-header">
     <div class="container">

          <nav class="navbar navbar-expand-lg bg-body-tertiary">
               <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                         <img src="<?php echo esc_url(get_theme_mod('webexplore_logo', get_template_directory_uri() . '/assets/images/webexplore.png')); ?>"
                              alt="<?php bloginfo('name'); ?>"
                              style="width: <?php echo esc_attr(get_theme_mod('webexplore_logo_size', 100)); ?>%; height: auto;">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                         aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'webexplore' ); ?>">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu( array(
                    'theme_location'  => 'main-menu',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'menu_class'      => 'navbar-nav mr-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => 'WP_Bootstrap_Navwalker',
                    ) );
                    ?>
               </div>
          </nav>
     </div>
</header>