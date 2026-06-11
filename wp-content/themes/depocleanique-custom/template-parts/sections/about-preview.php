<?php
/**
 * Section: About Preview
 * Pengenalan singkat Depo Cleanique — link ke halaman Tentang Kami.
 */
?>

<section id="tentang" class="bg-gray-50 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Visual placeholder kiri -->
            <div class="relative">
                <div class="bg-gradient-to-br from-teal-600 to-teal-400 rounded-3xl p-10 text-white text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                        </svg>
                    </div>
                    <p class="font-bold text-xl mb-2">Depo Cleanique</p>
                    <p class="text-teal-100 text-sm leading-relaxed">
                        Berdiri sejak 2019, kami hadir sebagai solusi<br>kebersihan rumah tangga yang terpercaya.
                    </p>
                </div>
                <!-- Decoration card -->
                <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl shadow-lg p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-teal-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-900">Terdaftar Resmi</p>
                        <p class="text-xs text-gray-400">Legalitas Terjamin</p>
                    </div>
                </div>
            </div>

            <!-- Konten kanan -->
            <div>
                <span class="dc-section-label">Tentang Kami</span>
                <h2 class="dc-section-title mb-4">
                    Kami Hadir untuk<br>
                    <span class="text-teal-600">Solusi Kebersihan</span> Anda
                </h2>
                <p class="dc-section-subtitle mb-6">
                    Depo Cleanique adalah usaha depo sabun curah dan produk homecare yang menawarkan produk berkualitas premium dengan harga yang bersaing. Kami membuka peluang kemitraan untuk siapapun yang ingin membangun usaha mandiri.
                </p>
                <ul class="space-y-3 mb-8">
                    <?php
                    $points = [
                        'Produk BPOM-registered, aman untuk keluarga',
                        'Harga grosir langsung dari produsen',
                        'Sistem kemitraan transparan dan menguntungkan',
                        'Dukungan penuh — training, materi marketing, dan konsultasi',
                    ];
                    foreach ( $points as $point ) :
                    ?>
                    <li class="flex items-start gap-3">
                        <div class="w-5 h-5 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-teal-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-sm text-gray-700"><?php echo esc_html( $point ); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>"
                   class="inline-flex items-center gap-2 text-teal-600 hover:text-teal-700 font-semibold text-sm transition-colors">
                    Pelajari lebih lanjut
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>
