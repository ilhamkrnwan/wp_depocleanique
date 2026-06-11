<?php
/**
 * Section: Pricing
 * Paket kemitraan — Starter, Reguler, Premium.
 * Anchor: id="paket"
 */

// TODO: Harga dan detail paket — ganti dengan data final atau field ACF di tahap berikutnya.

$packages = [
    [
        'name'     => 'Starter',
        'price'    => 'Rp 2.500.000',
        'period'   => 'Modal awal',
        'featured' => false,
        'desc'     => 'Cocok untuk pemula yang baru memulai usaha depo sabun curah.',
        'features' => [
            '5 jenis produk pilihan',
            'Kemasan 5 liter × 10 pcs',
            'Materi marketing digital',
            'Support WA 1 bulan',
            'Sertifikat mitra',
        ],
        'exclude'  => [
            'Rak display produk',
            'Training on-site',
        ],
    ],
    [
        'name'     => 'Reguler',
        'price'    => 'Rp 5.000.000',
        'period'   => 'Modal awal',
        'featured' => true,
        'desc'     => 'Paket paling populer — stok lengkap, support penuh, siap langsung jalan.',
        'features' => [
            '10 jenis produk lengkap',
            'Kemasan 5 & 10 liter',
            'Rak display produk',
            'Materi marketing digital',
            'Support WA 3 bulan',
            'Training via video call',
            'Sertifikat mitra',
        ],
        'exclude'  => [
            'Training on-site',
        ],
    ],
    [
        'name'     => 'Premium',
        'price'    => 'Rp 10.000.000',
        'period'   => 'Modal awal',
        'featured' => false,
        'desc'     => 'Paket lengkap terbaik dengan training langsung dan dukungan jangka panjang.',
        'features' => [
            'Semua produk (15+ jenis)',
            'Kemasan 5, 10 & 20 liter',
            'Rak display + spanduk',
            'Materi marketing digital',
            'Support WA 6 bulan',
            'Training on-site',
            'Sertifikat mitra premium',
            'Prioritas restok',
        ],
        'exclude'  => [],
    ],
];
?>

<section id="paket" class="bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-12">
            <span class="dc-section-label">Paket Kemitraan</span>
            <h2 class="dc-section-title mb-3">Pilih Paket yang Tepat</h2>
            <p class="dc-section-subtitle mx-auto">
                Modal terjangkau, hasil optimal. Semua paket sudah termasuk produk, materi marketing, dan dukungan dari tim kami.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 items-start">
            <?php foreach ( $packages as $pkg ) : ?>
            <div class="rounded-2xl border <?php echo $pkg['featured'] ? 'dc-pricing-featured' : 'border-gray-200'; ?> p-7 bg-white flex flex-col">
                <?php if ( $pkg['featured'] ) : ?>
                    <div class="dc-pricing-badge">PALING POPULER</div>
                <?php endif; ?>

                <div class="mb-6">
                    <h3 class="font-bold text-lg text-gray-900 mb-1"><?php echo esc_html( $pkg['name'] ); ?></h3>
                    <p class="text-sm text-gray-500 mb-4"><?php echo esc_html( $pkg['desc'] ); ?></p>
                    <div class="flex items-end gap-1">
                        <span class="text-2xl font-bold text-gray-900"><?php echo esc_html( $pkg['price'] ); ?></span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1"><?php echo esc_html( $pkg['period'] ); ?></p>
                </div>

                <ul class="space-y-2.5 mb-6 flex-1">
                    <?php foreach ( $pkg['features'] as $feature ) : ?>
                    <li class="flex items-center gap-2.5 text-sm text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-teal-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo esc_html( $feature ); ?>
                    </li>
                    <?php endforeach; ?>
                    <?php foreach ( $pkg['exclude'] as $exc ) : ?>
                    <li class="flex items-center gap-2.5 text-sm text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo esc_html( $exc ); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <a href="<?php echo esc_url( dc_get_wa_url( 'pricing' ) ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="block text-center px-5 py-3 rounded-xl font-semibold text-sm transition-colors <?php echo $pkg['featured'] ? 'bg-teal-600 hover:bg-teal-700 text-white' : 'border-2 border-teal-600 text-teal-600 hover:bg-teal-50'; ?>"
                   aria-label="<?php echo esc_attr( 'Daftar paket ' . $pkg['name'] . ' via WhatsApp' ); ?>">
                    Mulai dengan Paket Ini
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <p class="text-center text-sm text-gray-400 mt-8">
            Belum yakin? <a href="<?php echo esc_url( dc_get_wa_url( 'pricing' ) ); ?>" target="_blank" rel="noopener noreferrer" class="text-teal-600 hover:underline font-medium">Konsultasi gratis</a> terlebih dahulu, tanpa paksaan.
        </p>

    </div>
</section>
