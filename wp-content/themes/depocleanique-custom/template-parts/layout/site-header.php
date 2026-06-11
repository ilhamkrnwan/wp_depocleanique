<?php
/**
 * Template Part: Site Header
 * Navigasi utama yang tampil di semua halaman.
 * Dipanggil dari get_template_part('template-parts/layout/site-header').
 */

// URL WA dari Customizer. Ubah di: Appearance → Customize → Depo Cleanique → WhatsApp & Kontak
?>

<header id="site-header" class="fixed top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">

            <!-- ── Logo ──────────────────────────────── -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="flex items-center gap-2 flex-shrink-0"
               aria-label="<?php esc_attr_e( 'Depo Cleanique — Kembali ke beranda', 'depocleanique-custom' ); ?>">
                <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center flex-shrink-0" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <span class="font-bold text-lg leading-none tracking-tight">
                    <span class="text-teal-600">Depo</span><span class="text-gray-900">Cleanique</span>
                </span>
            </a>

            <!-- ── Desktop Navigation ─────────────────── -->
            <nav class="hidden lg:flex items-center gap-0.5" aria-label="Navigasi utama">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'Beranda', 'depocleanique-custom' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'Tentang Kami', 'depocleanique-custom' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#produk' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'Produk', 'depocleanique-custom' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#paket' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'Paket', 'depocleanique-custom' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#kemitraan' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'Kemitraan', 'depocleanique-custom' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'FAQ', 'depocleanique-custom' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                    <?php esc_html_e( 'Kontak', 'depocleanique-custom' ); ?>
                </a>
            </nav>

            <!-- ── CTA + Hamburger ────────────────────── -->
            <div class="flex items-center gap-2">
                <a href="<?php echo esc_url( dc_get_wa_url( 'header' ) ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="hidden lg:flex items-center gap-2 bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors"
                   aria-label="<?php esc_attr_e( 'Konsultasi gratis via WhatsApp', 'depocleanique-custom' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <?php esc_html_e( 'Konsultasi Gratis', 'depocleanique-custom' ); ?>
                    </a>

                    <button id="mobile-menu-toggle"
                        type="button"
                        class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                        aria-label="<?php esc_attr_e( 'Buka menu navigasi', 'depocleanique-custom' ); ?>"
                        aria-expanded="false"
                        aria-controls="mobile-menu">
                    <svg id="icon-hamburger" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div><!-- end flex row -->
    </div><!-- end container -->

    <!-- ── Mobile Menu Drawer ──────────────────────────── -->
    <div id="mobile-menu"
         class="hidden lg:hidden border-t border-gray-100 bg-white shadow-lg"
         role="navigation"
         aria-label="<?php esc_attr_e( 'Menu navigasi mobile', 'depocleanique-custom' ); ?>">
        <div class="max-w-7xl mx-auto px-4 py-3 space-y-0.5">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'Beranda', 'depocleanique-custom' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'Tentang Kami', 'depocleanique-custom' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/#produk' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'Produk', 'depocleanique-custom' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/#paket' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'Paket', 'depocleanique-custom' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/#kemitraan' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'Kemitraan', 'depocleanique-custom' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'FAQ', 'depocleanique-custom' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"
               class="block px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors">
                <?php esc_html_e( 'Kontak', 'depocleanique-custom' ); ?>
            </a>
            <div class="pt-3 pb-1 border-t border-gray-100">
                <a href="<?php echo esc_url( dc_get_wa_url( 'header' ) ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-colors w-full"
                   aria-label="<?php esc_attr_e( 'Konsultasi gratis via WhatsApp', 'depocleanique-custom' ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    <?php esc_html_e( 'Konsultasi Gratis via WhatsApp', 'depocleanique-custom' ); ?>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer untuk fixed header -->
<div class="h-16" aria-hidden="true"></div>
