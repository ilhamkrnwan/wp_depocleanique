<?php
/**
 * Template: Front Page
 * Titik masuk utama landing page Depo Cleanique.
 * Setiap section dipanggil via get_template_part() agar modular dan mudah diedit.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content">
    <?php get_template_part( 'template-parts/sections/hero' ); ?>
    <?php get_template_part( 'template-parts/sections/social-proof' ); ?>
    <?php get_template_part( 'template-parts/sections/about-preview' ); ?>
    <?php get_template_part( 'template-parts/sections/advantages' ); ?>
    <?php get_template_part( 'template-parts/sections/product-catalog' ); ?>
    <?php get_template_part( 'template-parts/sections/pricing' ); ?>
    <?php get_template_part( 'template-parts/sections/comparison-table' ); ?>
    <?php get_template_part( 'template-parts/sections/partnership-flow' ); ?>
    <?php get_template_part( 'template-parts/sections/faq' ); ?>
    <?php get_template_part( 'template-parts/sections/cta-banner' ); ?>
    <?php get_template_part( 'template-parts/sections/contact-preview' ); ?>
</main>

<?php get_footer(); ?>
