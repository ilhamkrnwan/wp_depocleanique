<?php
/**
 * Single partnership program template.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content" class="partnership-single">
    <?php
    while ( have_posts() ) :
        the_post();

        $post_id    = get_the_ID();
        $badge      = dc_get_partnership_meta( $post_id, '_partnership_badge' );
        $type_label = dc_get_partnership_types_label( $post_id );
        $summary    = dc_get_partnership_summary( $post_id );
        $location   = dc_get_partnership_location( $post_id );
        $address    = dc_get_partnership_meta( $post_id, '_partnership_address' );
        $owner      = dc_get_partnership_meta( $post_id, '_partnership_owner' );
        $phone      = dc_get_partnership_meta( $post_id, '_partnership_phone' );
        $since      = dc_get_partnership_meta( $post_id, '_partnership_since' );
        $highlights = dc_parse_key_value_lines( dc_get_partnership_meta( $post_id, '_partnership_highlights' ) );
        $content    = apply_filters( 'the_content', get_the_content() );

        if ( empty( $highlights ) ) {
            $highlights = [
                [ 'label' => __( 'Area', 'depocleanique-custom' ), 'value' => $location ?: __( 'Belum diisi', 'depocleanique-custom' ) ],
                [ 'label' => __( 'Jenis', 'depocleanique-custom' ), 'value' => $type_label ?: __( 'Mitra', 'depocleanique-custom' ) ],
                [ 'label' => __( 'Status', 'depocleanique-custom' ), 'value' => $badge ?: __( 'Terdaftar', 'depocleanique-custom' ) ],
                [ 'label' => __( 'Sejak', 'depocleanique-custom' ), 'value' => $since ?: __( 'Aktif', 'depocleanique-custom' ) ],
            ];
        }

        $sections = [
            '_partnership_services'   => [ 'title' => __( 'Produk / Layanan Mitra', 'depocleanique-custom' ), 'icon' => 'package' ],
            '_partnership_facilities' => [ 'title' => __( 'Fasilitas / Keunggulan Mitra', 'depocleanique-custom' ), 'icon' => 'star' ],
        ];
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'partnership-detail' ); ?>>
            <header class="partnership-detail-hero">
                <div class="partnership-container">
                    <nav class="partnership-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'depocleanique-custom' ); ?>">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Beranda', 'depocleanique-custom' ); ?></a>
                        <span aria-hidden="true">/</span>
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'partnership' ) ); ?>"><?php esc_html_e( 'Kemitraan', 'depocleanique-custom' ); ?></a>
                        <span aria-hidden="true">/</span>
                        <span><?php the_title(); ?></span>
                    </nav>

                    <div class="partnership-detail-hero-grid">
                        <div>
                            <span class="partnership-eyebrow"><?php echo esc_html( $badge ?: $type_label ?: __( 'Mitra Terdaftar', 'depocleanique-custom' ) ); ?></span>
                            <h1><?php the_title(); ?></h1>
                            <?php if ( $summary ) : ?>
                                <p><?php echo esc_html( $summary ); ?></p>
                            <?php endif; ?>
                            <div class="partnership-detail-meta">
                                <?php if ( $location ) : ?>
                                    <span><?php echo dc_icon( 'map-pin' ); ?><?php echo esc_html( $location ); ?></span>
                                <?php endif; ?>
                                <?php if ( $type_label ) : ?>
                                    <span><?php echo dc_icon( 'store' ); ?><?php echo esc_html( $type_label ); ?></span>
                                <?php endif; ?>
                            </div>
                            <a class="partnership-button partnership-button-primary" href="<?php echo esc_url( dc_get_partnership_whatsapp_url( $post_id ) ); ?>" target="_blank" rel="noopener noreferrer">
                                <?php echo dc_icon( 'message-circle' ); ?>
                                <?php esc_html_e( 'Hubungi Mitra', 'depocleanique-custom' ); ?>
                            </a>
                        </div>
                        <figure class="partnership-detail-media">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'full', [ 'class' => 'partnership-detail-image' ] ); ?>
                            <?php else : ?>
                                <span><?php echo dc_icon( 'store', 'dc-icon-xl' ); ?></span>
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            </header>

            <div class="partnership-container">
                <div class="partnership-highlight-grid">
                    <?php foreach ( $highlights as $item ) : ?>
                        <div class="partnership-highlight-card">
                            <span><?php echo esc_html( $item['label'] ); ?></span>
                            <strong><?php echo esc_html( $item['value'] ); ?></strong>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="partnership-container partnership-single-layout">
                <div class="partnership-single-main">
                    <?php if ( trim( wp_strip_all_tags( $content ) ) ) : ?>
                        <section class="partnership-content">
                            <?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </section>
                    <?php endif; ?>

                    <?php if ( $address || $owner || $phone || $since ) : ?>
                        <section class="partnership-info-section">
                            <h2><?php echo dc_icon( 'map-pin' ); ?><?php esc_html_e( 'Detail Informasi Mitra', 'depocleanique-custom' ); ?></h2>
                            <ul class="partnership-check-list">
                                <?php if ( $address ) : ?>
                                    <li><?php echo dc_icon( 'map-pin' ); ?><?php echo nl2br( esc_html( $address ) ); ?></li>
                                <?php endif; ?>
                                <?php if ( $owner ) : ?>
                                    <li><?php echo dc_icon( 'user' ); ?><?php echo esc_html( sprintf( __( 'Penanggung jawab: %s', 'depocleanique-custom' ), $owner ) ); ?></li>
                                <?php endif; ?>
                                <?php if ( $phone ) : ?>
                                    <li><?php echo dc_icon( 'phone' ); ?><?php echo esc_html( sprintf( __( 'Kontak: %s', 'depocleanique-custom' ), $phone ) ); ?></li>
                                <?php endif; ?>
                                <?php if ( $since ) : ?>
                                    <li><?php echo dc_icon( 'calendar' ); ?><?php echo esc_html( sprintf( __( 'Bergabung sejak: %s', 'depocleanique-custom' ), $since ) ); ?></li>
                                <?php endif; ?>
                            </ul>
                        </section>
                    <?php endif; ?>

                    <?php foreach ( $sections as $meta_key => $section ) : ?>
                        <?php $items = dc_parse_lines( dc_get_partnership_meta( $post_id, $meta_key ) ); ?>
                        <?php if ( $items ) : ?>
                            <section class="partnership-info-section">
                                <h2><?php echo dc_icon( $section['icon'] ); ?><?php echo esc_html( $section['title'] ); ?></h2>
                                <ul class="partnership-check-list">
                                    <?php foreach ( $items as $item ) : ?>
                                        <li><?php echo dc_icon( 'check-circle' ); ?><?php echo esc_html( $item ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php get_template_part( 'template-parts/partnership/related' ); ?>
                    <?php get_template_part( 'template-parts/partnership/cta' ); ?>
                </div>

                <?php get_template_part( 'template-parts/partnership/sidebar' ); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
