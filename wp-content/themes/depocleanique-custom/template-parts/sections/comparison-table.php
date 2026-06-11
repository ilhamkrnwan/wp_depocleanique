<?php
/**
 * Section: Comparison Table
 * Perbandingan Depo Cleanique vs kompetitor / produk konvensional.
 */

$rows = [
    [ 'label' => 'Kualitas Produk',        'us' => true,  'us_note' => 'Premium, bersertifikat',          'them' => false, 'them_note' => 'Standar pasar'       ],
    [ 'label' => 'Harga Grosir Langsung',  'us' => true,  'us_note' => 'Langsung dari produsen',          'them' => false, 'them_note' => 'Melalui distributor' ],
    [ 'label' => 'Support & Mentoring',    'us' => true,  'us_note' => 'Tim dedicated 6 hari/minggu',     'them' => false, 'them_note' => 'Tidak ada'           ],
    [ 'label' => 'Materi Marketing',       'us' => true,  'us_note' => 'Foto, banner, caption siap pakai','them' => false, 'them_note' => 'Buat sendiri'        ],
    [ 'label' => 'Training Produk',        'us' => true,  'us_note' => 'Video & on-site (Premium)',       'them' => false, 'them_note' => 'Tidak ada'           ],
    [ 'label' => 'Garansi Restok',         'us' => true,  'us_note' => 'Stok selalu tersedia',            'them' => false, 'them_note' => 'Tidak dijamin'       ],
    [ 'label' => 'Komunitas Mitra',        'us' => true,  'us_note' => 'Grup & forum aktif',              'them' => false, 'them_note' => 'Tidak ada'           ],
];
?>

<section id="perbandingan" class="bg-gray-50 py-16 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-12">
            <span class="dc-section-label">Perbandingan</span>
            <h2 class="dc-section-title mb-3">Kami vs. Lainnya</h2>
            <p class="dc-section-subtitle mx-auto">
                Lihat sendiri apa yang membuat kemitraan Depo Cleanique berbeda dan lebih menguntungkan.
            </p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <!-- Table header -->
            <div class="grid grid-cols-3 bg-gray-900 text-white text-sm font-semibold">
                <div class="px-5 py-4">Fitur</div>
                <div class="px-5 py-4 text-center border-l border-gray-700">
                    <span class="text-teal-400">Depo Cleanique</span>
                </div>
                <div class="px-5 py-4 text-center border-l border-gray-700 text-gray-400">Lainnya</div>
            </div>

            <!-- Table rows -->
            <?php foreach ( $rows as $i => $row ) : ?>
            <div class="grid grid-cols-3 <?php echo $i % 2 === 0 ? 'bg-white' : 'bg-gray-50'; ?> border-t border-gray-100">
                <div class="px-5 py-4 text-sm font-medium text-gray-700"><?php echo esc_html( $row['label'] ); ?></div>
                <div class="px-5 py-4 text-center border-l border-gray-100">
                    <div class="flex flex-col items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-teal-500" viewBox="0 0 20 20" fill="currentColor" aria-label="Ya" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-xs text-gray-500 hidden sm:block"><?php echo esc_html( $row['us_note'] ); ?></span>
                    </div>
                </div>
                <div class="px-5 py-4 text-center border-l border-gray-100">
                    <div class="flex flex-col items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-label="Tidak" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-xs text-gray-400 hidden sm:block"><?php echo esc_html( $row['them_note'] ); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
