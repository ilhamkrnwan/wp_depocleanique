<?php
/**
 * Custom product card for WooCommerce loops.
 * Memakai sistem .dc-product-card (lihat assets/css/woocommerce.css) agar
 * seragam dengan kartu kemitraan: image-forward, kategori, harga, stok, CTA.
 *
 * @package Depocleanique_Custom
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

$product_id   = $product->get_id();
$product_link = get_permalink( $product_id );

$short_description = wp_trim_words( wp_strip_all_tags( $product->get_short_description() ), 16, '…' );
if ( ! $short_description ) {
    $short_description = wp_trim_words( wp_strip_all_tags( $product->get_description() ), 16, '…' );
}

$cats          = get_the_terms( $product_id, 'product_cat' );
$category      = ( ! is_wp_error( $cats ) && ! empty( $cats ) ) ? $cats[0] : null;
$category_link = $category ? get_term_link( $category ) : '';
if ( is_wp_error( $category_link ) ) {
    $category_link = '';
}

$badge = '';
if ( $product->is_featured() ) {
    $badge = __( 'Best Seller', 'depocleanique-custom' );
} elseif ( $product->is_on_sale() ) {
    $badge = __( 'Promo', 'depocleanique-custom' );
}

// Fallback icon berdasarkan kata kunci judul (tanpa gambar produk).
$title_lower = strtolower( $product->get_name() );
$icon        = 'water_drop';
if ( strpos( $title_lower, 'piring' ) !== false || strpos( $title_lower, 'dishwash' ) !== false ) {
    $icon = 'sanitizer';
} elseif ( strpos( $title_lower, 'pewangi' ) !== false || strpos( $title_lower, 'parfum' ) !== false || strpos( $title_lower, 'softener' ) !== false ) {
    $icon = 'eco';
} elseif ( strpos( $title_lower, 'lantai' ) !== false || strpos( $title_lower, 'floor' ) !== false ) {
    $icon = 'clean_hands';
}
?>

<li <?php wc_product_class( 'dc-product-card', $product ); ?>>
    <a class="dc-product-card-media" href="<?php echo esc_url( $product_link ); ?>" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
        <?php if ( has_post_thumbnail( $product_id ) ) : ?>
            <?php echo get_the_post_thumbnail( $product_id, 'medium', [ 'class' => 'dc-product-card-image', 'loading' => 'lazy' ] ); ?>
        <?php else : ?>
            <span class="dc-product-card-fallback" aria-hidden="true">
                <span class="material-symbols-outlined"><?php echo esc_html( $icon ); ?></span>
            </span>
        <?php endif; ?>

        <?php if ( $badge ) : ?>
            <span class="dc-product-sale-badge"><?php echo esc_html( $badge ); ?></span>
        <?php endif; ?>
    </a>

    <div class="dc-product-card-body">
        <?php if ( $category && $category_link ) : ?>
            <a class="dc-product-card-category" href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( $category->name ); ?></a>
        <?php endif; ?>

        <h3 class="dc-product-card-title">
            <a href="<?php echo esc_url( $product_link ); ?>"><?php echo esc_html( $product->get_name() ); ?></a>
        </h3>

        <?php if ( $short_description ) : ?>
            <p class="dc-product-card-description"><?php echo esc_html( $short_description ); ?></p>
        <?php endif; ?>

        <div class="dc-product-card-meta">
            <div class="dc-product-card-meta-row">
                <span class="dc-product-card-price is-empty-price"><?php esc_html_e( 'Hubungi untuk harga', 'depocleanique-custom' ); ?></span>
            </div>

            <a class="dc-product-card-link" href="<?php echo esc_url( $product_link ); ?>">
                <?php esc_html_e( 'Lihat Detail', 'depocleanique-custom' ); ?>
                <?php echo dc_icon( 'arrow-right', 'dc-icon-sm' ); ?>
            </a>
        </div>
    </div>
</li>
