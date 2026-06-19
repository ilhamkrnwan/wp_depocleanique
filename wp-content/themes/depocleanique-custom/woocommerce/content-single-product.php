<?php
/**
 * Custom single product content.
 *
 * @package Depocleanique_Custom
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product = wc_get_product( get_the_ID() );

if ( ! $product ) {
    return;
}

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    return;
}

$product_name      = $product->get_name();
$whatsapp_message  = sprintf(
    /* translators: %s: product name */
    __( 'Halo Depo Cleanique! Saya tertarik dengan produk %s. Bisa dibantu informasinya?', 'depocleanique-custom' ),
    $product_name
);
$whatsapp_url      = function_exists( 'dc_get_wa_url' ) ? dc_get_wa_url( 'product', $whatsapp_message ) : home_url( '/kontak/' );
$category_list     = wc_get_product_category_list( $product->get_id(), ', ' );
?>

<section class="dc-single-product-hero">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
        <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
            <div class="dc-wc-breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </div>
        <?php endif; ?>

        <article id="product-<?php the_ID(); ?>" <?php wc_product_class( 'dc-single-product-layout', $product ); ?>>
            <div class="dc-single-gallery">
                <?php woocommerce_show_product_images(); ?>
            </div>

            <div class="dc-single-summary">
                <?php if ( $product->is_on_sale() ) : ?>
                    <span class="dc-single-sale-badge"><?php esc_html_e( 'Promo', 'depocleanique-custom' ); ?></span>
                <?php endif; ?>

                <h1 class="product_title entry-title dc-single-title">
                    <?php echo esc_html( $product_name ); ?>
                </h1>

                <div class="dc-single-price is-empty-price">
                    <?php esc_html_e( 'Hubungi untuk harga', 'depocleanique-custom' ); ?>
                </div>

                <?php if ( $product->get_short_description() ) : ?>
                    <div class="dc-single-excerpt">
                        <?php woocommerce_template_single_excerpt(); ?>
                    </div>
                <?php endif; ?>

                <a class="dc-single-whatsapp" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo dc_icon( 'whatsapp', 'dc-icon-sm' ); ?>
                    <span><?php esc_html_e( 'Tanya via WhatsApp', 'depocleanique-custom' ); ?></span>
                </a>

                <ul class="dc-single-benefits">
                    <li><?php echo dc_icon( 'shield', 'dc-icon-sm' ); ?><span><?php esc_html_e( 'Produk berizin Kemenkes & Halal MUI', 'depocleanique-custom' ); ?></span></li>
                    <li><?php echo dc_icon( 'message-circle', 'dc-icon-sm' ); ?><span><?php esc_html_e( 'Konsultasi gratis sebelum membeli', 'depocleanique-custom' ); ?></span></li>
                    <li><?php echo dc_icon( 'store', 'dc-icon-sm' ); ?><span><?php esc_html_e( 'Cocok untuk rumah tangga & usaha', 'depocleanique-custom' ); ?></span></li>
                </ul>

                <?php if ( $category_list ) : ?>
                    <div class="dc-single-meta">
                        <span><?php esc_html_e( 'Kategori', 'depocleanique-custom' ); ?></span>
                        <div><?php echo wp_kses_post( $category_list ); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    </div>
</section>

<section class="dc-single-detail-section">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="dc-single-detail-panel">
            <?php woocommerce_output_product_data_tabs(); ?>
        </div>
    </div>
</section>

<section class="dc-single-related-section">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
        <?php woocommerce_output_related_products(); ?>
    </div>
</section>

<?php do_action( 'woocommerce_after_single_product' ); ?>
