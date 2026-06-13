<?php
/**
 * Empty state for article loops.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="article-empty" aria-labelledby="article-empty-title">
    <span class="article-empty-icon"><?php echo dc_icon( 'search' ); ?></span>
    <h2 id="article-empty-title"><?php esc_html_e( 'Belum ada artikel', 'depocleanique-custom' ); ?></h2>
    <p><?php esc_html_e( 'Artikel dan panduan Depo Cleanique akan segera tersedia.', 'depocleanique-custom' ); ?></p>
    <a class="article-button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php esc_html_e( 'Kembali ke Beranda', 'depocleanique-custom' ); ?>
    </a>
</section>
