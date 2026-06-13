<?php
/**
 * Related posts for single article footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$related_posts = dc_get_related_posts( get_the_ID(), 3 );

if ( ! $related_posts->have_posts() ) {
    return;
}
?>

<section class="article-related" aria-labelledby="article-related-title">
    <div class="article-section-heading">
        <span><?php esc_html_e( 'Lanjut membaca', 'depocleanique-custom' ); ?></span>
        <h2 id="article-related-title"><?php esc_html_e( 'Artikel terkait', 'depocleanique-custom' ); ?></h2>
    </div>

    <div class="article-related-grid">
        <?php
        while ( $related_posts->have_posts() ) :
            $related_posts->the_post();
            get_template_part( 'template-parts/content/content', 'article-card' );
        endwhile;
        ?>
    </div>
</section>

<?php wp_reset_postdata(); ?>
