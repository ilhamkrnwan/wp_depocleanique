<?php
/**
 * Template: Generic Page
 * Digunakan untuk halaman WordPress generik yang tidak punya template khusus.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content" class="min-h-screen bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-16 lg:py-24">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="mb-10">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                        <?php the_title(); ?>
                    </h1>
                </header>
                <div class="text-gray-700 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
