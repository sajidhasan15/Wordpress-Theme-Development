<?php

/* This is for header themeplate */
get_header();

?>

<div class="container main">
     <?php


if(have_posts()):
while(have_posts()) : the_post();
the_content();
endwhile;
else :
_e('No post found', 'webexplore');
endif;

?>
</div>



<?php

/* This is for Footer themeplate */
get_footer();

?>