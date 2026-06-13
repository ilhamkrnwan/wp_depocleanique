<?php
/**
 * Search results template.
 */

$search_post_type = get_query_var( 'post_type' );
$search_post_type = is_array( $search_post_type ) ? reset( $search_post_type ) : $search_post_type;

if ( 'product' === $search_post_type ) {
    $woocommerce_archive = locate_template( 'woocommerce/archive-product.php' );

    if ( $woocommerce_archive ) {
        include $woocommerce_archive;
        return;
    }
}

get_header();
get_template_part( 'template-parts/layout/site-header' );

$paged         = max( 1, (int) get_query_var( 'paged' ) );
$search_query  = get_search_query();
$article_query = new WP_Query(
    [
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => (int) get_option( 'posts_per_page' ),
        'paged'               => $paged,
        's'                   => $search_query,
        'ignore_sticky_posts' => true,
    ]
);
?>

<main id="main-content" class="article-archive article-search-results">
    <section class="article-hero article-archive-hero" aria-labelledby="article-search-title">
        <div class="article-container article-hero-inner">
            <div class="article-hero-copy">
                <span class="article-eyebrow"><?php esc_html_e( 'Artikel', 'depocleanique-custom' ); ?></span>
                <h1 id="article-search-title">
                    <?php
                    printf(
                        /* translators: %s: search keyword */
                        esc_html__( 'Hasil pencarian untuk: %s', 'depocleanique-custom' ),
                        esc_html( $search_query )
                    );
                    ?>
                </h1>
                <p><?php esc_html_e( 'Telusuri artikel dan panduan Depo Cleanique berdasarkan kata kunci yang kamu cari.', 'depocleanique-custom' ); ?></p>
            </div>

            <form class="article-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="screen-reader-text" for="article-search-results-input"><?php esc_html_e( 'Cari artikel', 'depocleanique-custom' ); ?></label>
                <span aria-hidden="true"><?php echo dc_icon( 'search' ); ?></span>
                <input id="article-search-results-input" type="search" name="s" value="<?php echo esc_attr( $search_query ); ?>" placeholder="<?php esc_attr_e( 'Cari tips laundry, homecare, atau kemitraan', 'depocleanique-custom' ); ?>">
                <input type="hidden" name="post_type" value="post">
                <button type="submit"><?php esc_html_e( 'Cari', 'depocleanique-custom' ); ?></button>
            </form>
        </div>
    </section>

    <section class="article-main-section article-list-section">
        <div class="article-container article-layout">
            <div class="article-loop">
                <?php if ( $article_query->have_posts() ) : ?>
                    <div class="article-grid">
                        <?php
                        while ( $article_query->have_posts() ) :
                            $article_query->the_post();
                            get_template_part( 'template-parts/content/content', 'article-card' );
                        endwhile;
                        ?>
                    </div>

                    <?php
                    $pagination = paginate_links(
                        [
                            'total'     => $article_query->max_num_pages,
                            'current'   => $paged,
                            'type'      => 'list',
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( 'Sebelumnya', 'depocleanique-custom' ),
                            'next_text' => esc_html__( 'Berikutnya', 'depocleanique-custom' ),
                            'add_args'  => [
                                's'         => $search_query,
                                'post_type' => 'post',
                            ],
                        ]
                    );

                    if ( $pagination ) :
                        ?>
                        <nav class="article-pagination" aria-label="<?php esc_attr_e( 'Navigasi halaman hasil pencarian', 'depocleanique-custom' ); ?>">
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

<?php
wp_reset_postdata();
get_footer();
