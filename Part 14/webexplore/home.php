<?php

/* This is for header themeplate */
get_header();

?>


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


<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod molestias quidem dolor sed eos deserunt minus corrupti
     assumenda quas voluptatem odit id cum maiores suscipit possimus commodi, iusto quam? Dolor quidem eveniet
     assumenda, architecto perspiciatis consequuntur distinctio adipisci natus esse enim voluptas nisi minus, impedit
     totam vitae. Corrupti doloremque pariatur sint rem similique sunt at dolorem cum omnis numquam suscipit consectetur
     voluptatum, iusto deleniti tempore! Sapiente possimus quam beatae assumenda? Deleniti ut architecto assumenda, aut
     inventore expedita tempore quisquam. Totam veniam esse et deserunt voluptas animi nulla tempore vero? Dolore,
     laudantium veritatis dolor tempora non perferendis quisquam suscipit corporis libero expedita itaque mollitia
     inventore quos tenetur modi ad beatae, delectus neque sit quia? Voluptatum eligendi nobis suscipit nulla. Animi,
     tempora nesciunt, accusamus laudantium laboriosam quod repellendus omnis sed sint beatae voluptatibus tenetur
     recusandae dicta exercitationem debitis iure! Deserunt saepe quo officiis voluptas inventore at eius? Repellendus
     minus quod sed. Commodi quae id blanditiis omnis laborum labore sapiente corrupti. Inventore illo expedita dolor
     deserunt officiis corrupti voluptatum culpa sit placeat. Accusantium voluptates tenetur illo dolores, inventore
     exercitationem vero ducimus provident fugiat officia quod voluptatem, doloremque maxime, sunt cum consectetur?
     Perferendis voluptatum debitis, dolorem esse, ducimus maiores labore, nisi aliquid inventore libero numquam non
     fuga iure modi sint ratione quibusdam? Explicabo expedita voluptate similique aut ab deserunt eligendi?
     Accusantium, modi quia! Quasi quo itaque quas assumenda harum. Error modi consequatur ex vero illo facere, quasi
     necessitatibus, dolorem facilis nisi distinctio minus. Alias maiores, sapiente minus eum perferendis in deleniti
     soluta officiis commodi, a aliquid harum non unde corporis fugit itaque ad earum. Corrupti vero perferendis
     perspiciatis facere omnis ab, aliquam dolorum quo facilis? Voluptates minus nesciunt illo voluptatum iste sequi
     iusto amet voluptas voluptatem, quas libero animi veritatis exercitationem et suscipit officia consequatur? Quas
     dolore, laboriosam odit at ad quo repellat exercitationem, nihil accusantium, dolorem voluptas ipsa fugit. Nulla
     aliquam doloremque harum labore eos molestias quod sint unde vel ea magni maiores perferendis deserunt nihil nobis,
     magnam quibusdam doloribus! Saepe quaerat, eligendi libero quos repudiandae earum tempore explicabo consequuntur
     tenetur et praesentium voluptas ipsum dolore odit temporibus. Inventore, maxime voluptatem corporis nulla deleniti,
     quasi dicta fuga vel modi architecto veniam illo. Exercitationem est voluptas culpa ipsam blanditiis ipsum quod
     velit beatae, eveniet nihil nobis sunt maxime explicabo facere harum ad in tempora. Non eos culpa, minus corrupti
     delectus, itaque similique quis labore alias dignissimos, inventore unde in omnis blanditiis ex a ipsa earum
     officiis quia id. Id tempora necessitatibus, culpa commodi adipisci dolores assumenda, eveniet libero ea fuga esse
     harum minima dolore consequatur quae magnam, nihil excepturi? Aperiam laudantium beatae quam tenetur libero.
     Voluptas fuga praesentium optio incidunt pariatur a impedit aliquid dolorum, placeat nostrum inventore atque amet
     officiis, ut est exercitationem voluptates eligendi consectetur ducimus sit deleniti ipsam? Quas nihil, nobis
     placeat quidem repellat consequatur minus repellendus voluptatem accusantium dolore saepe, tempora explicabo vero.
     Qui fugit cum magni enim? Qui neque fuga asperiores distinctio beatae, maxime, harum saepe officia ipsum reiciendis
     dolor possimus earum ratione minus adipisci accusantium repudiandae vero nemo quia illo, veniam placeat quisquam.
     Nam, saepe! Quasi veritatis accusantium officiis alias! Provident fuga dolores totam doloribus voluptas! Similique,
     quas distinctio! Voluptate repudiandae blanditiis, animi vitae quam earum adipisci ipsum laborum cum enim ad ab,
     commodi doloribus a, praesentium minus aliquam! Dolor asperiores, ad quam quaerat cumque voluptate hic quibusdam,
     aliquam architecto fugit, rem eaque enim error perferendis? Culpa et, aut illo ea nobis optio? Porro deserunt optio
     pariatur laudantium inventore labore, et ex nobis libero. Modi voluptatibus dolore eum earum nobis. Quisquam, unde
     eaque. Porro, labore eius. Natus, sint obcaecati dolor dolores debitis accusamus. Ducimus sapiente, suscipit
     delectus aperiam soluta dolor, dolorum laborum deserunt saepe, ipsum excepturi. Hic, officia quidem? Libero, nisi
     vitae quam vel voluptate velit. Voluptatibus sed nihil, consectetur mollitia, facere veniam eius doloribus, et
     cumque totam saepe! Assumenda dolorum maxime fuga debitis placeat accusamus repellendus, voluptas numquam
     voluptates incidunt cum quis amet recusandae quo nobis aliquam a quisquam pariatur sapiente. At, natus quod laborum
     a ex neque pariatur? Modi illo culpa quas. Corrupti incidunt beatae quibusdam, soluta dolore neque obcaecati animi
     minima nemo cum quis commodi ex suscipit quaerat, ab, ea ratione culpa optio sequi perspiciatis. Voluptates natus
     saepe repellendus a repellat nesciunt illo fuga recusandae eos molestiae aspernatur tenetur dolor rem laudantium
     autem magni, dolore quis fugit deleniti voluptatem iure ipsam suscipit velit blanditiis? Corrupti dolores quod quo
     quasi accusantium, illum blanditiis consequuntur nobis, rem ducimus perspiciatis magni modi laborum. Vel ad,
     deserunt, fugiat soluta consequatur voluptas maiores rerum ducimus velit veritatis nisi aut odio amet alias. Qui
     pariatur eaque itaque molestiae laudantium veritatis perspiciatis fuga reprehenderit illo dolorum aliquam nulla
     illum eveniet sit modi sapiente rem accusamus odio cupiditate molestias impedit totam, atque iste. Ex suscipit
     iusto fugiat exercitationem fuga veniam? Soluta, asperiores facilis? Voluptatum fugiat aut, accusamus hic rerum
     culpa corrupti beatae aspernatur nostrum molestias odit iusto quae dolore ducimus? Fugiat voluptas recusandae
     tempora quaerat minima quia magnam alias repellendus, ullam dolorum, velit dolores modi, cum debitis ducimus
     perspiciatis veniam facere et vero! Fugit deserunt, tempora totam aut rem quam voluptas deleniti commodi ab, libero
     nisi perferendis porro autem recusandae? Natus iusto aut ab aspernatur accusamus dolore nam? Doloribus nulla autem
     natus exercitationem laborum, consectetur tempore ut accusamus veritatis mollitia, officiis illum perspiciatis
     placeat architecto facere beatae quia possimus unde. Error assumenda voluptate voluptates blanditiis beatae qui,
     harum laborum ex mollitia placeat doloribus vel repellendus minima repudiandae consectetur ea maxime, ducimus
     commodi reprehenderit ut voluptatibus veniam? Porro nostrum fugit ea! Debitis ut deleniti iste, saepe magni aut
     dolor autem enim, ipsum est explicabo soluta officiis laudantium minus molestiae numquam? Accusamus ratione aliquid
     sunt maxime eos a id unde inventore dolores, laboriosam totam architecto odit reiciendis maiores fugiat tempore
     debitis sequi odio atque quibusdam minus cum voluptate. Voluptatibus consequuntur eveniet deleniti? Ea cupiditate
     doloremque qui placeat molestiae! Eveniet repellendus iusto eligendi, incidunt natus enim facilis? Ducimus quo
     velit in necessitatibus exercitationem repellat quae hic! Quasi voluptatibus quam fugit aperiam tenetur, voluptate
     voluptatem, velit amet sint commodi itaque reprehenderit beatae porro! Vel aliquam vero iusto?</p>
<?php

/* This is for Footer themeplate */
get_footer();

?>