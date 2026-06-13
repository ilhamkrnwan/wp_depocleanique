<?php
/**
 * Template Part: Site Header
 * Navigasi utama (pill nav) — tampil di semua halaman.
 * Desain mengikuti _landing-source.html dengan palet brand biru + aksen hijau.
 *
 * Link aman WordPress + helper dc_get_*() untuk WhatsApp.
 * JS mobile menu ada di assets/js/main.js (ID dipertahankan agar kompatibel).
 *
 * Ubah nomor WA: Appearance → Customize → Depo Cleanique → WhatsApp & Kontak
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Anchor homepage yang aman: di front page cukup #id (smooth-scroll via main.js),
 * di halaman lain pakai URL absolut ke homepage + hash.
 */
$dc_anchor = static function ( $id ) {
    return is_front_page() ? '#' . $id : esc_url( home_url( '/#' . $id ) );
};

/* ── Katalog: WooCommerce shop bila ada, fallback ke page /katalog/ ── */
$dc_catalog_url = function_exists( 'wc_get_page_permalink' )
    ? wc_get_page_permalink( 'shop' )
    : home_url( '/katalog/' );

if ( empty( $dc_catalog_url ) ) {
    $dc_catalog_url = home_url( '/katalog/' );
}

$dc_catalog_active = is_page( 'katalog' );

if ( function_exists( 'is_shop' ) ) {
    $dc_catalog_active = $dc_catalog_active
        || is_shop()
        || is_product_category()
        || is_product_tag()
        || is_product()
        || ( is_search() && 'product' === get_query_var( 'post_type' ) );
}

/* ── Artikel/Blog: aktif untuk arsip & single post ── */
$dc_blog_active = ( is_home() && ! is_front_page() )
    || is_category()
    || is_tag()
    || is_author()
    || is_date()
    || is_singular( 'post' )
    || ( is_search() && 'product' !== get_query_var( 'post_type' ) );

$dc_partnership_active = is_post_type_archive( 'partnership' )
    || is_singular( 'partnership' )
    || is_tax( 'partnership_type' )
    || is_page( [ 'kemitraan', 'mitra' ] );

// Daftar link navigasi — label => href, active berdasarkan URL/konteks WP saat ini.
$dc_nav_links = [
    [ 'label' => __( 'Beranda', 'depocleanique-custom' ),      'href' => esc_url( home_url( '/' ) ),              'active' => ( is_front_page() && ! $dc_blog_active && ! $dc_catalog_active && ! $dc_partnership_active ) ],
    [ 'label' => __( 'Tentang Kami', 'depocleanique-custom' ), 'href' => esc_url( home_url( '/tentang-kami/' ) ), 'active' => is_page( 'tentang-kami' ) ],
    [ 'label' => __( 'Katalog', 'depocleanique-custom' ),      'href' => esc_url( $dc_catalog_url ),              'active' => (bool) $dc_catalog_active ],
    [ 'label' => __( 'Artikel', 'depocleanique-custom' ),      'href' => esc_url( home_url( '/artikel/' ) ),      'active' => (bool) $dc_blog_active ],
    [ 'label' => __( 'Kemitraan', 'depocleanique-custom' ),    'href' => esc_url( home_url( '/kemitraan/' ) ),    'active' => (bool) $dc_partnership_active ],
    [ 'label' => __( 'Kontak', 'depocleanique-custom' ),       'href' => esc_url( home_url( '/kontak/' ) ),       'active' => is_page( 'kontak' ) ],
];

// Logo: custom logo WP → file webp di assets (jika ada) → wordmark teks.
$dc_logo_path = get_template_directory() . '/assets/images/depocleanique.webp';
$dc_logo_uri  = get_template_directory_uri() . '/assets/images/depocleanique.webp';
?>

<?php
/* Snippet logo reusable (header utama + drawer). */
$dc_logo_markup = static function () use ( $dc_logo_path, $dc_logo_uri ) {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } elseif ( file_exists( $dc_logo_path ) ) {
        printf(
            '<img src="%s" alt="%s">',
            esc_url( $dc_logo_uri ),
            esc_attr( get_bloginfo( 'name' ) )
        );
    } else {
        echo '<span class="site-logo-wordmark font-extrabold text-lg leading-none tracking-tight">'
            . '<span style="color:var(--color-primary);">Depo</span><span style="color:var(--color-navy);">Cleanique</span>'
            . '</span>';
    }
};
?>
<header id="site-header" class="site-header z-50">
    <div class="site-header-inner nav-pill flex items-center justify-between">

        <!-- ① Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
           class="site-logo flex items-center no-underline flex-shrink-0"
           aria-label="<?php esc_attr_e( 'Depo Cleanique — Kembali ke beranda', 'depocleanique-custom' ); ?>">
            <?php $dc_logo_markup(); ?>
        </a>

        <!-- ② Nav links — pill group (desktop ≥1024px) -->
        <nav class="site-nav items-center gap-0.5 rounded-full px-1.5 py-1"
             style="background:var(--color-surface-soft);"
             aria-label="<?php esc_attr_e( 'Navigasi utama', 'depocleanique-custom' ); ?>">
            <?php foreach ( $dc_nav_links as $link ) : ?>
                <a class="nav-link<?php echo $link['active'] ? ' active' : ''; ?>"
                   href="<?php echo $link['href']; // already escaped ?>"
                   <?php echo $link['active'] ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html( $link['label'] ); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <!-- ③ CTA (desktop ≥1024px) -->
        <div class="header-actions items-center">
            <a href="<?php echo esc_url( dc_get_wa_url( 'header' ) ); ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="nav-cta nav-cta-solid"
               title="<?php esc_attr_e( 'Konsultasi Gratis', 'depocleanique-custom' ); ?>"
               aria-label="<?php esc_attr_e( 'Konsultasi gratis via WhatsApp', 'depocleanique-custom' ); ?>">
                <span class="material-symbols-outlined nav-cta-icon" aria-hidden="true">forum</span>
                <span class="nav-cta-label"><?php esc_html_e( 'Konsultasi Gratis', 'depocleanique-custom' ); ?></span>
                <span class="material-symbols-outlined nav-cta-arrow" aria-hidden="true">arrow_forward</span>
            </a>
        </div>

        <!-- ④ Mobile hamburger (<1024px) -->
        <button id="mobile-menu-toggle"
                type="button"
                class="mobile-menu-toggle site-menu-toggle p-2 rounded-xl"
                style="background:var(--color-surface-soft); border:1px solid var(--color-border);"
                aria-label="<?php esc_attr_e( 'Buka menu navigasi', 'depocleanique-custom' ); ?>"
                aria-expanded="false"
                aria-controls="mobile-menu">
            <span id="icon-hamburger" class="material-symbols-outlined align-middle" style="font-size:22px;color:var(--color-navy);">menu</span>
            <span id="icon-close" class="material-symbols-outlined align-middle hidden" style="font-size:22px;color:var(--color-navy);">close</span>
        </button>
    </div>

    <!-- ── Backdrop overlay (klik untuk menutup) ─────────── -->
    <div class="mobile-menu-backdrop" data-mobile-menu-close aria-hidden="true"></div>

    <!-- ── Mobile Menu Drawer (satu card vertikal) ───────── -->
    <aside id="mobile-menu"
           class="mobile-menu-drawer"
           aria-hidden="true"
           aria-label="<?php esc_attr_e( 'Menu navigasi mobile', 'depocleanique-custom' ); ?>">

        <!-- Header drawer: logo kiri, tombol X kanan -->
        <div class="mobile-menu-drawer-header">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="site-logo mobile-drawer-logo flex items-center no-underline"
               aria-label="<?php esc_attr_e( 'Depo Cleanique — Kembali ke beranda', 'depocleanique-custom' ); ?>">
                <?php $dc_logo_markup(); ?>
            </a>
            <button type="button"
                    class="mobile-menu-close"
                    data-mobile-menu-close
                    aria-label="<?php esc_attr_e( 'Tutup menu navigasi', 'depocleanique-custom' ); ?>">
                <span class="material-symbols-outlined" aria-hidden="true">close</span>
            </button>
        </div>

        <!-- List menu satu kolom penuh -->
        <nav class="mobile-menu-nav" aria-label="<?php esc_attr_e( 'Navigasi utama', 'depocleanique-custom' ); ?>">
            <?php foreach ( $dc_nav_links as $link ) : ?>
                <a class="mobile-menu-link<?php echo $link['active'] ? ' is-active' : ''; ?>"
                   href="<?php echo $link['href']; // already escaped ?>"
                   <?php echo $link['active'] ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html( $link['label'] ); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <!-- CTA full width di bawah -->
        <a href="<?php echo esc_url( dc_get_wa_url( 'header' ) ); ?>"
           target="_blank"
           rel="noopener noreferrer"
           class="mobile-menu-cta"
           aria-label="<?php esc_attr_e( 'Konsultasi gratis via WhatsApp', 'depocleanique-custom' ); ?>">
            <span class="material-symbols-outlined" style="font-size:20px;" aria-hidden="true">forum</span>
            <?php esc_html_e( 'Konsultasi Gratis', 'depocleanique-custom' ); ?>
        </a>
    </aside>
</header>

<?php if ( ! is_front_page() ) : ?>
    <!-- Spacer untuk pill nav fixed (halaman non-homepage). Hero homepage punya padding sendiri. -->
    <div class="h-24" aria-hidden="true"></div>
<?php endif; ?>
