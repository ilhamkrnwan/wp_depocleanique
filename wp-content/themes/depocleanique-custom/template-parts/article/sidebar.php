<?php
/**
 * Shared article sidebar.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$latest_posts = new WP_Query(
    [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => true,
        'post__not_in'        => is_singular( 'post' ) ? [ get_the_ID() ] : [],
    ]
);
?>

<aside class="article-sidebar" aria-label="<?php esc_attr_e( 'Sidebar artikel', 'depocleanique-custom' ); ?>">
    <section class="article-sidebar-panel">
        <h2><?php esc_html_e( 'Cari artikel', 'depocleanique-custom' ); ?></h2>
        <form class="article-sidebar-search" role="search" method="get" action="<?php echo esc_url( home_url( '/artikel/' ) ); ?>">
            <label class="screen-reader-text" for="article-sidebar-search"><?php esc_html_e( 'Cari artikel', 'depocleanique-custom' ); ?></label>
            <input id="article-sidebar-search" type="search" name="artikel_cari" value="<?php echo isset( $_GET['artikel_cari'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_GET['artikel_cari'] ) ) ) : ''; ?>" placeholder="<?php esc_attr_e( 'Ketik kata kunci', 'depocleanique-custom' ); ?>">
            <button type="submit" aria-label="<?php esc_attr_e( 'Cari artikel', 'depocleanique-custom' ); ?>">
                <?php echo dc_icon( 'search' ); ?>
            </button>
        </form>
    </section>

    <?php if ( $latest_posts->have_posts() ) : ?>
        <section class="article-sidebar-panel">
            <h2><?php esc_html_e( 'Artikel terbaru', 'depocleanique-custom' ); ?></h2>
            <div class="article-latest-list">
                <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                    <a class="article-latest-item" href="<?php the_permalink(); ?>">
                        <span><?php the_title(); ?></span>
                        <small><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></small>
                    </a>
                <?php endwhile; ?>
            </div>
        </section>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    $categories = get_categories( [ 'hide_empty' => true, 'number' => 8 ] );
    if ( ! empty( $categories ) ) :
        ?>
        <section class="article-sidebar-panel">
            <h2><?php esc_html_e( 'Kategori', 'depocleanique-custom' ); ?></h2>
            <div class="article-tax-list">
                <?php foreach ( $categories as $category ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $category ) ); ?>">
                        <span><?php echo esc_html( $category->name ); ?></span>
                        <small><?php echo esc_html( number_format_i18n( $category->count ) ); ?></small>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $tags = get_tags( [ 'hide_empty' => true, 'number' => 12 ] );
    if ( ! empty( $tags ) ) :
        ?>
        <section class="article-sidebar-panel">
            <h2><?php esc_html_e( 'Tag populer', 'depocleanique-custom' ); ?></h2>
            <div class="article-tag-cloud">
                <?php foreach ( $tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="article-sidebar-panel article-sidebar-cta">
        <h2><?php esc_html_e( 'Butuh rekomendasi produk?', 'depocleanique-custom' ); ?></h2>
        <p><?php esc_html_e( 'Tim Depo Cleanique siap membantu memilih produk homecare, laundry, dan peluang kemitraan yang sesuai kebutuhan.', 'depocleanique-custom' ); ?></p>
        <a href="<?php echo esc_url( dc_get_wa_url( 'contact' ) ); ?>" target="_blank" rel="noopener noreferrer">
            <?php echo dc_icon( 'whatsapp' ); ?>
            <?php esc_html_e( 'Konsultasi via WhatsApp', 'depocleanique-custom' ); ?>
        </a>
    </section>
</aside>
