<?php
/**
 * Section: Hero
 * Bagian utama landing page — headline, CTA, visual.
 */

// TODO: Teks placeholder — ganti dengan konten final saat migrasi landing page.
?>

<section id="hero" class="relative bg-gradient-to-br from-teal-50 via-white to-cyan-50 py-20 lg:py-28 overflow-hidden">

    <!-- Background decoration -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-teal-100 rounded-full opacity-30 blur-3xl"></div>
        <div class="absolute bottom-0 -left-24 w-72 h-72 bg-cyan-100 rounded-full opacity-40 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Left: Text content -->
            <div>
                <span class="dc-section-label">
                    🧼 Produk Kebersihan Premium
                </span>
                <h1 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-bold text-gray-900 leading-tight mb-5">
                    Solusi Bersih<br>
                    <span class="text-teal-600">Rumah Tangga</span><br>
                    Anda
                </h1>
                <p class="text-lg text-gray-600 leading-relaxed mb-8 max-w-lg">
                    Depo Cleanique menghadirkan produk sabun curah dan homecare berkualitas tinggi dengan harga terjangkau. Mulai usaha kemitraan yang menguntungkan bersama kami.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( home_url( '/#paket' ) ); ?>"
                       class="bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white px-6 py-3.5 rounded-xl font-semibold text-sm transition-colors">
                        Lihat Paket Kemitraan
                    </a>
                    <a href="<?php echo esc_url( dc_get_wa_url( 'hero' ) ); ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="border-2 border-gray-300 hover:border-teal-400 hover:text-teal-600 text-gray-700 px-6 py-3.5 rounded-xl font-semibold text-sm transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Konsultasi Gratis
                    </a>
                </div>

                <!-- Trust indicators -->
                <div class="flex flex-wrap items-center gap-5 mt-8 pt-8 border-t border-gray-200">
                    <div class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-teal-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600">Produk Bersertifikat</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-teal-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600">Support Penuh</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-teal-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600">Modal Terjangkau</span>
                    </div>
                </div>
            </div>

            <!-- Right: Visual placeholder -->
            <div class="relative hidden lg:block">
                <div class="w-full aspect-square max-w-md mx-auto bg-gradient-to-br from-teal-100 to-cyan-50 rounded-3xl flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <p class="text-teal-700 font-semibold text-sm">Foto Produk</p>
                        <p class="text-teal-500 text-xs mt-1">Akan diganti saat migrasi</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
