<?php
/**
 * Fallback template — index.php
 * Digunakan WordPress jika tidak ada template lain yang cocok.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content" class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="text-center px-6 py-20">
        <h1 class="text-3xl font-bold text-gray-900 mb-3" style="font-family:'Plus Jakarta Sans',sans-serif;">
            <?php bloginfo( 'name' ); ?>
        </h1>
        <p class="text-gray-500" style="font-family:'Plus Jakarta Sans',sans-serif;">
            <?php bloginfo( 'description' ); ?>
        </p>
    </div>
</main>

<?php get_footer(); ?>
