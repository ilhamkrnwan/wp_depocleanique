<?php
/**
 * Empty state for partnership archive.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="partnership-empty">
    <div class="partnership-empty-icon"><?php echo dc_icon( 'store', 'dc-icon-xl' ); ?></div>
    <h2><?php esc_html_e( 'Data mitra sedang disiapkan.', 'depocleanique-custom' ); ?></h2>
    <p><?php esc_html_e( 'Daftar mitra terdaftar akan tampil di sini setelah data mitra dipublikasikan dari dashboard.', 'depocleanique-custom' ); ?></p>
    <a class="partnership-button partnership-button-primary" href="<?php echo esc_url( dc_get_wa_url( 'partnership' ) ); ?>" target="_blank" rel="noopener noreferrer">
        <?php echo dc_icon( 'message-circle' ); ?>
        <?php esc_html_e( 'Hubungi Depo Cleanique', 'depocleanique-custom' ); ?>
    </a>
</div>
