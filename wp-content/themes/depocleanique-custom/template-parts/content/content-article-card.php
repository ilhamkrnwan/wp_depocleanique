<?php
/**
 * Article card used by archive, related posts, and latest lists.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-card' ); ?>>
    <a class="article-card-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Baca artikel: %s', 'depocleanique-custom' ), get_the_title() ) ); ?>">
        <?php echo dc_article_thumbnail( get_the_ID(), 'medium_large' ); ?>
    </a>

    <div class="article-card-body">
        <div class="article-card-top">
            <?php echo dc_article_category_badge(); ?>
        </div>

        <h2 class="article-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <p class="article-card-excerpt">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
        </p>

        <div class="article-meta">
            <span><?php echo dc_icon( 'calendar' ); ?><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></span>
            <span><?php echo dc_icon( 'clock' ); ?><?php echo esc_html( dc_article_reading_time() ); ?></span>
            <span><?php echo dc_icon( 'user' ); ?><?php echo esc_html( get_the_author() ); ?></span>
        </div>

        <a class="article-read-link" href="<?php the_permalink(); ?>">
            <?php esc_html_e( 'Baca Artikel', 'depocleanique-custom' ); ?>
            <?php echo dc_icon( 'arrow-right' ); ?>
        </a>
    </div>
</article>
