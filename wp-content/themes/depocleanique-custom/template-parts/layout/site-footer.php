<?php
/**
 * Template Part: Site Footer
 * Footer global yang tampil di semua halaman.
 */

$year       = date( 'Y' );
?>

<footer class="bg-gray-900 text-gray-400">

    <!-- ── Main content ──────────────────────────────── -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-14 lg:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Kolom 1: Brand & Deskripsi -->
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                   class="inline-flex items-center gap-2 mb-4"
                   aria-label="<?php esc_attr_e( 'Depo Cleanique — Kembali ke beranda', 'depocleanique-custom' ); ?>">
                    <div class="w-8 h-8 bg-teal-500 rounded-lg flex items-center justify-center flex-shrink-0" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-lg text-white">
                        <span class="text-teal-400">Depo</span>Cleanique
                    </span>
                </a>
                <p class="text-sm leading-relaxed mb-5">
                    Solusi produk kebersihan rumah tangga berkualitas premium. Bergabunglah dengan jaringan kemitraan kami dan bangun usaha yang menguntungkan.
                </p>
                <!-- Social media links -->
                <div class="flex items-center gap-2.5" aria-label="Media sosial">
                    <a href="<?php echo esc_url( dc_get_social_url( 'instagram' ) ); ?>"
                       class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-pink-600 flex items-center justify-center transition-colors"
                       aria-label="<?php esc_attr_e( 'Instagram Depo Cleanique', 'depocleanique-custom' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url( dc_get_wa_url() ); ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-green-600 flex items-center justify-center transition-colors"
                       aria-label="<?php esc_attr_e( 'WhatsApp Depo Cleanique', 'depocleanique-custom' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url( dc_get_social_url( 'facebook' ) ); ?>"
                       class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-blue-700 flex items-center justify-center transition-colors"
                       aria-label="<?php esc_attr_e( 'Facebook Depo Cleanique', 'depocleanique-custom' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi -->
            <div>
                <h4 class="text-white font-semibold text-sm mb-5 uppercase tracking-wider">Navigasi</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">Beranda</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#produk' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">Produk</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#paket' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">Paket Kemitraan</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#kemitraan' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">Alur Kemitraan</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">FAQ</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>" class="text-sm hover:text-teal-400 transition-colors">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak -->
            <div>
                <h4 class="text-white font-semibold text-sm mb-5 uppercase tracking-wider">Kontak</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-teal-400 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <div>
                            <a href="<?php echo esc_url( dc_get_wa_url() ); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="text-sm hover:text-teal-400 transition-colors"><?php echo esc_html( dc_get_wa_label() ); ?></a>
                            <p class="text-xs text-gray-500 mt-0.5"><?php echo esc_html( dc_get_business_hours() ); ?></p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-teal-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                        <a href="<?php echo esc_url( 'mailto:' . dc_get_email() ); ?>" class="text-sm hover:text-teal-400 transition-colors">
                            <?php echo esc_html( dc_get_email() ); ?>
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-teal-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm"><?php echo esc_html( dc_get_business_hours() ); ?></p>
                            <p class="text-xs text-gray-500 mt-0.5"><?php echo esc_html( dc_get_business_hours() ); ?></p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Kolom 4: Alamat -->
            <div>
                <h4 class="text-white font-semibold text-sm mb-5 uppercase tracking-wider">Lokasi</h4>
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5 text-teal-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                    <address class="not-italic text-sm leading-relaxed">
                        <?php echo dc_get_address_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — already escaped in helper ?>
                    </address>
                </div>
            </div>

        </div><!-- end grid -->
    </div><!-- end main content -->

    <!-- ── Copyright bar ──────────────────────────────── -->
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-xs text-gray-500">
                &copy; <?php echo esc_html( $year ); ?> Depo Cleanique. All rights reserved.
            </p>
            <p class="text-xs text-gray-600">
                Produk Kebersihan Rumah Tangga Premium
            </p>
        </div>
    </div>

</footer>
