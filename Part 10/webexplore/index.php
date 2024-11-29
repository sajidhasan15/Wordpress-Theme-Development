<?php

/* This is for header themeplate */
get_header();

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
     <meta charset="<?php bloginfo('charset'); ?>" class="no-js">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body <?php body_class(); ?>>

     <?php

     if(have_posts()):
          while(have_posts()) : the_post();
          the_content();
     endwhile;
     else :
          _e('No post found', 'webexplore');
     endif;

     ?>


     <?php

     /* This is for Footer themeplate */
     get_footer();

     ?>