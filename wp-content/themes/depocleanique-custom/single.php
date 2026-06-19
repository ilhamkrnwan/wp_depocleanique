<?php
/**
 * Native single post template for articles.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content" class="article-single">
    <?php
    while ( have_posts() ) :
        the_post();

        $raw_content      = apply_filters( 'the_content', get_the_content() );
        $article_content  = dc_article_prepare_content( $raw_content );
        $toc              = dc_article_toc( $article_content );
        $modified_visible = get_the_modified_time( 'U' ) > get_the_time( 'U' );
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'article-single-post' ); ?>>
            <header class="article-single-header">
                <div class="article-container">
                    <nav class="article-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'depocleanique-custom' ); ?>">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Beranda', 'depocleanique-custom' ); ?></a>
                        <span aria-hidden="true">/</span>
                        <a href="<?php echo esc_url( home_url( '/artikel/' ) ); ?>"><?php esc_html_e( 'Artikel', 'depocleanique-custom' ); ?></a>
                        <span aria-hidden="true">/</span>
                        <span><?php the_title(); ?></span>
                    </nav>

                    <div class="article-single-title-wrap" data-animate="fade-up">
                        <?php echo dc_article_category_badge(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php if ( has_excerpt() ) : ?>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                        <?php endif; ?>

                        <div class="article-meta article-single-meta">
                            <span><?php echo dc_icon( 'calendar' ); ?><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></span>
                            <span><?php echo dc_icon( 'user' ); ?><?php echo esc_html( get_the_author() ); ?></span>
                            <span><?php echo dc_icon( 'clock' ); ?><?php echo esc_html( dc_article_reading_time() ); ?></span>
                            <?php if ( $modified_visible ) : ?>
                                <span><?php echo dc_icon( 'calendar' ); ?><?php echo esc_html( sprintf( __( 'Diperbarui %s', 'depocleanique-custom' ), get_the_modified_date( 'j M Y' ) ) ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <figure class="article-single-media" data-animate="scale-in" data-animate-delay="1">
                        <?php echo dc_article_thumbnail( get_the_ID(), 'full' ); ?>
                    </figure>
                </div>
            </header>

            <div class="article-container article-single-layout">
                <div class="article-single-main" data-animate="fade-up">
                    <div class="article-content">
                        <?php echo $article_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>

                    <footer class="article-footer">
                        <?php if ( has_tag() ) : ?>
                            <div class="article-tags">
                                <span><?php echo dc_icon( 'tag' ); ?><?php esc_html_e( 'Tags', 'depocleanique-custom' ); ?></span>
                                <?php the_tags( '', '', '' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        $share_url   = rawurlencode( get_permalink() );
                        $share_title = rawurlencode( get_the_title() );
                        ?>
                        <nav class="article-share" aria-label="<?php esc_attr_e( 'Bagikan artikel', 'depocleanique-custom' ); ?>">
                            <span><?php echo dc_icon( 'share' ); ?><?php esc_html_e( 'Bagikan', 'depocleanique-custom' ); ?></span>
                            <a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . $share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Bagikan ke Facebook', 'depocleanique-custom' ); ?>"><?php echo dc_icon( 'facebook' ); ?></a>
                            <a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?url=' . $share_url . '&text=' . $share_title ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Bagikan ke X', 'depocleanique-custom' ); ?>"><?php echo dc_icon( 'x' ); ?></a>
                            <a href="<?php echo esc_url( 'https://wa.me/?text=' . $share_title . '%20' . $share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Bagikan via WhatsApp', 'depocleanique-custom' ); ?>"><?php echo dc_icon( 'whatsapp' ); ?></a>
                            <a href="<?php echo esc_url( 'mailto:?subject=' . $share_title . '&body=' . $share_url ); ?>" aria-label="<?php esc_attr_e( 'Bagikan via email', 'depocleanique-custom' ); ?>"><?php echo dc_icon( 'mail' ); ?></a>
                        </nav>

                        <section class="article-author-box">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?>
                            <div>
                                <span><?php esc_html_e( 'Ditulis oleh', 'depocleanique-custom' ); ?></span>
                                <h2><?php echo esc_html( get_the_author() ); ?></h2>
                                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                    <p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                                <?php endif; ?>
                            </div>
                        </section>

                        <nav class="article-post-nav" aria-label="<?php esc_attr_e( 'Navigasi artikel', 'depocleanique-custom' ); ?>">
                            <div><?php previous_post_link( '%link', dc_icon( 'arrow-left' ) . '<span>%title</span>' ); ?></div>
                            <div><?php next_post_link( '%link', '<span>%title</span>' . dc_icon( 'arrow-right' ) ); ?></div>
                        </nav>

                        <a class="article-back-link" href="<?php echo esc_url( home_url( '/artikel/' ) ); ?>">
                            <?php echo dc_icon( 'arrow-left' ); ?>
                            <?php esc_html_e( 'Kembali ke Artikel', 'depocleanique-custom' ); ?>
                        </a>
                    </footer>

                    <?php get_template_part( 'template-parts/article/related-posts' ); ?>

                    <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </div>

                <div class="article-single-sidebar">
                    <?php echo $toc; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?php get_template_part( 'template-parts/article/sidebar' ); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
