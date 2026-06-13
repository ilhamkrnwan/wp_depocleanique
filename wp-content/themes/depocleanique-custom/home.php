<?php
/**
 * Posts index for the native WordPress blog.
 * Set a Page named "Artikel" as Settings > Reading > Posts page.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );

$paged          = max( 1, (int) get_query_var( 'paged' ) );
$article_search = isset( $_GET['artikel_cari'] ) ? sanitize_text_field( wp_unslash( $_GET['artikel_cari'] ) ) : '';
$article_query  = $wp_query;

if ( '' !== $article_search ) {
    $article_query = new WP_Query(
        [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => (int) get_option( 'posts_per_page' ),
            'paged'          => $paged,
            's'              => $article_search,
        ]
    );
}

$categories = get_categories( [ 'hide_empty' => true, 'number' => 8 ] );
$show_featured = 1 === $paged && '' === $article_search && $article_query->have_posts();
?>

<main id="main-content" class="article-archive">
    <section class="article-hero" aria-labelledby="article-hero-title">
        <div class="article-container article-hero-inner">
            <div class="article-hero-copy">
                <span class="article-eyebrow"><?php esc_html_e( 'Artikel', 'depocleanique-custom' ); ?></span>
                <h1 id="article-hero-title"><?php esc_html_e( 'Artikel & Panduan Depo Cleanique', 'depocleanique-custom' ); ?></h1>
                <p><?php esc_html_e( 'Temukan panduan, tips, dan insight seputar produk homecare, laundry, kebersihan rumah, dan peluang usaha bersama Depo Cleanique.', 'depocleanique-custom' ); ?></p>
            </div>

            <form class="article-search" role="search" method="get" action="<?php echo esc_url( home_url( '/artikel/' ) ); ?>">
                <label class="screen-reader-text" for="article-search-input"><?php esc_html_e( 'Cari artikel', 'depocleanique-custom' ); ?></label>
                <span aria-hidden="true"><?php echo dc_icon( 'search' ); ?></span>
                <input id="article-search-input" type="search" name="artikel_cari" value="<?php echo esc_attr( $article_search ); ?>" placeholder="<?php esc_attr_e( 'Cari tips laundry, homecare, atau kemitraan', 'depocleanique-custom' ); ?>">
                <button type="submit"><?php esc_html_e( 'Cari', 'depocleanique-custom' ); ?></button>
            </form>

            <?php if ( ! empty( $categories ) ) : ?>
                <nav class="article-category-pills" aria-label="<?php esc_attr_e( 'Kategori artikel', 'depocleanique-custom' ); ?>">
                    <?php foreach ( $categories as $category ) : ?>
                        <a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>
        </div>
    </section>

    <section class="article-main-section">
        <div class="article-container article-layout">
            <div class="article-loop">
                <?php if ( $article_query->have_posts() ) : ?>
                    <?php if ( $show_featured ) : ?>
                        <?php $article_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'article-featured-card' ); ?>>
                            <a class="article-featured-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Baca artikel: %s', 'depocleanique-custom' ), get_the_title() ) ); ?>">
                                <?php echo dc_article_thumbnail( get_the_ID(), 'large' ); ?>
                            </a>
                            <div class="article-featured-body">
                                <span class="article-featured-label"><?php esc_html_e( 'Artikel terbaru', 'depocleanique-custom' ); ?></span>
                                <?php echo dc_article_category_badge(); ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
                                <div class="article-meta">
                                    <span><?php echo dc_icon( 'calendar' ); ?><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></span>
                                    <span><?php echo dc_icon( 'clock' ); ?><?php echo esc_html( dc_article_reading_time() ); ?></span>
                                    <span><?php echo dc_icon( 'user' ); ?><?php echo esc_html( get_the_author() ); ?></span>
                                </div>
                                <a class="article-button" href="<?php the_permalink(); ?>">
                                    <?php esc_html_e( 'Baca Artikel', 'depocleanique-custom' ); ?>
                                    <?php echo dc_icon( 'arrow-right' ); ?>
                                </a>
                            </div>
                        </article>
                    <?php endif; ?>

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
                            'prev_text' => esc_html__( 'Sebelumnya', 'depocleanique-custom' ),
                            'next_text' => esc_html__( 'Berikutnya', 'depocleanique-custom' ),
                            'add_args'  => '' !== $article_search ? [ 'artikel_cari' => $article_search ] : [],
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

<?php
if ( '' !== $article_search ) {
    wp_reset_postdata();
}

get_footer();
