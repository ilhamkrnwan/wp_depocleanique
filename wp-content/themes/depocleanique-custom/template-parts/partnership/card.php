<?php
/**
 * Partnership program card.
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
?>

<article <?php post_class( 'partnership-card' ); ?>>
    <a class="partnership-card-media" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Lihat detail %s', 'depocleanique-custom' ), get_the_title() ) ); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large', [ 'class' => 'partnership-card-image', 'loading' => 'lazy' ] ); ?>
        <?php else : ?>
                <span class="partnership-card-fallback"><?php echo dc_icon( 'store', 'dc-icon-xl' ); ?></span>
        <?php endif; ?>
    </a>

    <div class="partnership-card-body">
        <div class="partnership-card-tags">
            <?php if ( $badge ) : ?>
                <span class="partnership-badge"><?php echo esc_html( $badge ); ?></span>
            <?php endif; ?>
            <?php if ( $type_label ) : ?>
                <span class="partnership-type"><?php echo esc_html( $type_label ); ?></span>
            <?php endif; ?>
        </div>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <?php if ( $summary ) : ?>
            <p><?php echo esc_html( $summary ); ?></p>
        <?php endif; ?>

        <?php if ( $location ) : ?>
            <div class="partnership-meta">
                <?php echo dc_icon( 'map-pin' ); ?>
                <span><?php echo esc_html( $location ); ?></span>
            </div>
        <?php endif; ?>

        <?php if ( $services ) : ?>
            <ul class="partnership-card-benefits">
                <?php foreach ( $services as $service ) : ?>
                    <li><?php echo dc_icon( 'check-circle' ); ?><?php echo esc_html( $service ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="partnership-card-actions">
            <a class="partnership-button partnership-button-primary" href="<?php the_permalink(); ?>">
                <?php esc_html_e( 'Lihat Mitra', 'depocleanique-custom' ); ?>
                <?php echo dc_icon( 'arrow-right' ); ?>
            </a>
            <a class="partnership-button partnership-button-ghost" href="<?php echo esc_url( dc_get_partnership_whatsapp_url( $post_id ) ); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo dc_icon( 'message-circle' ); ?>
                <?php esc_html_e( 'Konsultasi', 'depocleanique-custom' ); ?>
            </a>
        </div>
    </div>
</article>
