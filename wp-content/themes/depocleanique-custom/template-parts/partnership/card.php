<?php
/**
 * Partnership program card.
 *
 * Redesain mobile-first: gambar dijadikan fokus utama (full-bleed, chip meta
 * di-overlay), body ringkas, dan baris aksi adaptif — di layar sempit tombol
 * WhatsApp menyusut jadi icon-only square sementara tombol "Detail" tetap
 * berlabel. Lihat blok ".dc-partner-card" di assets/css/main.css.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id    = get_the_ID();
$badge      = dc_get_partnership_meta( $post_id, '_partnership_badge' );
$location   = dc_get_partnership_location( $post_id );
$summary    = dc_get_partnership_summary( $post_id );
$services   = array_slice( dc_parse_lines( dc_get_partnership_meta( $post_id, '_partnership_services' ) ), 0, 3 );
$type_label = dc_get_partnership_types_label( $post_id );
$permalink  = get_permalink( $post_id );
$wa_url     = dc_get_partnership_whatsapp_url( $post_id );
$title      = get_the_title( $post_id );
?>

<article <?php post_class( 'dc-partner-card group' ); ?> data-animate="scale-in">

    <!-- ① Media — fokus utama card -->
    <a class="dc-partner-card-media" href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php echo esc_attr( $title ); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] ); ?>
        <?php else : ?>
            <span class="dc-partner-card-media-fallback" aria-hidden="true"><?php echo dc_icon( 'store' ); ?></span>
        <?php endif; ?>

        <?php if ( $type_label ) : ?>
            <span class="dc-partner-card-type"><?php echo esc_html( $type_label ); ?></span>
        <?php endif; ?>

        <?php if ( $badge ) : ?>
            <span class="dc-partner-card-badge"><?php echo esc_html( $badge ); ?></span>
        <?php endif; ?>

        <?php if ( $location ) : ?>
            <span class="dc-partner-card-location">
                <?php echo dc_icon( 'map-pin' ); ?>
                <span><?php echo esc_html( $location ); ?></span>
            </span>
        <?php endif; ?>
    </a>

    <!-- ② Body -->
    <div class="dc-partner-card-body">
        <h4 class="dc-partner-card-title">
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
        </h4>

        <?php if ( $summary ) : ?>
            <p class="dc-partner-card-summary"><?php echo esc_html( $summary ); ?></p>
        <?php endif; ?>

        <?php if ( $services ) : ?>
            <ul class="dc-partner-card-services">
                <?php foreach ( $services as $service ) : ?>
                    <li>
                        <?php echo dc_icon( 'check-circle' ); ?>
                        <span><?php echo esc_html( $service ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <!-- ③ Aksi — adaptif (WhatsApp jadi icon-only di layar sempit) -->
    <div class="dc-partner-card-actions">
        <a class="dc-partner-card-btn dc-partner-card-btn-primary" href="<?php echo esc_url( $permalink ); ?>">
            <span class="dc-partner-card-btn-label"><?php esc_html_e( 'Detail', 'depocleanique-custom' ); ?></span>
            <?php echo dc_icon( 'arrow-right' ); ?>
        </a>
        <a class="dc-partner-card-btn dc-partner-card-btn-wa"
           href="<?php echo esc_url( $wa_url ); ?>"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="<?php esc_attr_e( 'Konsultasi via WhatsApp', 'depocleanique-custom' ); ?>"
           title="<?php esc_attr_e( 'Konsultasi via WhatsApp', 'depocleanique-custom' ); ?>">
            <?php echo dc_icon( 'message-circle' ); ?>
            <span class="dc-partner-card-btn-label"><?php esc_html_e( 'Konsultasi', 'depocleanique-custom' ); ?></span>
        </a>
    </div>
</article>
