<?php
/**
 * Native post archive template for category, tag, author, and date archives.
 */

if (
    function_exists( 'is_post_type_archive' )
    && (
        is_post_type_archive( 'product' )
        || is_tax( 'product_cat' )
        || is_tax( 'product_tag' )
    )
) {
    $woocommerce_archive = locate_template( 'woocommerce/archive-product.php' );

    if ( $woocommerce_archive ) {
        include $woocommerce_archive;
        return;
    }
}

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content" class="article-archive article-taxonomy-archive">
    <section class="article-hero article-archive-hero" aria-labelledby="article-archive-title">
        <div class="article-container article-hero-inner">
            <div class="article-hero-copy">
                <span class="article-eyebrow"><?php esc_html_e( 'Artikel', 'depocleanique-custom' ); ?></span>
                <h1 id="article-archive-title"><?php echo esc_html( dc_get_archive_title() ); ?></h1>
                <div class="article-hero-description">
                    <?php echo wp_kses_post( wpautop( dc_get_archive_description() ) ); ?>
                </div>
            </div>

            <form class="article-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="screen-reader-text" for="article-archive-search"><?php esc_html_e( 'Cari artikel', 'depocleanique-custom' ); ?></label>
                <span aria-hidden="true"><?php echo dc_icon( 'search' ); ?></span>
                <input id="article-archive-search" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Cari artikel Depo Cleanique', 'depocleanique-custom' ); ?>">
                <input type="hidden" name="post_type" value="post">
                <button type="submit"><?php esc_html_e( 'Cari', 'depocleanique-custom' ); ?></button>
            </form>
        </div>
    </section>

    <section class="article-main-section article-list-section">
        <div class="article-container article-layout">
            <div class="article-loop">
                <?php if ( have_posts() ) : ?>
                    <div class="article-grid">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content/content', 'article-card' );
                        endwhile;
                        ?>
                    </div>

                    <?php
                    $pagination = paginate_links(
                        [
                            'type'      => 'list',
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( 'Sebelumnya', 'depocleanique-custom' ),
                            'next_text' => esc_html__( 'Berikutnya', 'depocleanique-custom' ),
                        ]
                    );

                    if ( $pagination ) :
                        ?>
                        <nav class="article-pagination" aria-label="<?php esc_attr_e( 'Navigasi halaman artikel', 'depocleanique-custom' ); ?>">
                            <?php echo wp_kses_post( $pagination ); ?>
                        </nav>
                    <?php endif; ?>
                <?php else : ?>
                    <?php get_template_part( 'template-parts/content/content', 'empty' ); ?>
                <?php endif; ?>
            </div>

            <?php get_template_part( 'template-parts/article/sidebar' ); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
