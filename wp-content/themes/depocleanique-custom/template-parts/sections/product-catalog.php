<?php
/**
 * Section: Product Catalog
 * Daftar produk sabun curah dan homecare.
 * Anchor: id="produk"
 */

$products = [
    [ 'name' => 'Sabun Cuci Piring',    'desc' => 'Formula anti-bakteri, bersih sempurna tanpa sisa lemak.',          'color' => 'bg-blue-50',   'text' => 'text-blue-600',   'badge' => 'Terlaris'  ],
    [ 'name' => 'Deterjen Bubuk',       'desc' => 'Untuk cucian putih cemerlang, harum tahan lama sepanjang hari.',    'color' => 'bg-teal-50',   'text' => 'text-teal-600',   'badge' => null        ],
    [ 'name' => 'Pembersih Lantai',     'desc' => 'Membunuh 99.9% kuman, wangi segar, aman untuk anak-anak.',         'color' => 'bg-green-50',  'text' => 'text-green-600',  'badge' => null        ],
    [ 'name' => 'Cairan Pel',           'desc' => 'Formula khusus untuk berbagai jenis lantai, tidak meninggalkan residu.', 'color' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'badge' => null ],
    [ 'name' => 'Sabun Mandi Cair',     'desc' => 'Moisturizing formula, lembut di kulit, aroma premium.',             'color' => 'bg-purple-50', 'text' => 'text-purple-600', 'badge' => 'Baru'      ],
    [ 'name' => 'Cairan Cuci Baju',     'desc' => 'Liquid detergent konsentrat, efisien dan pakaian tetap awet.',      'color' => 'bg-cyan-50',   'text' => 'text-cyan-600',   'badge' => null        ],
];
?>

<section id="produk" class="bg-gray-50 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-12">
            <span class="dc-section-label">Produk Kami</span>
            <h2 class="dc-section-title mb-3">Katalog Produk Pilihan</h2>
            <p class="dc-section-subtitle mx-auto">
                Produk sabun curah dan homecare berkualitas tinggi, harga terjangkau, tersedia dalam berbagai ukuran kemasan.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ( $products as $product ) : ?>
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                <!-- Product image placeholder -->
                <div class="<?php echo esc_attr( $product['color'] ); ?> h-40 flex items-center justify-center relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 <?php echo esc_attr( $product['text'] ); ?> opacity-40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1 1 .03 2.798-1.414 2.798H4.213c-1.444 0-2.414-1.798-1.414-2.798L4 15.298"/>
                    </svg>
                    <?php if ( $product['badge'] ) : ?>
                        <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                            <?php echo esc_html( $product['badge'] ); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <!-- Product info -->
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 mb-1.5"><?php echo esc_html( $product['name'] ); ?></h3>
                    <p class="text-sm text-gray-500 leading-relaxed"><?php echo esc_html( $product['desc'] ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10">
            <p class="text-sm text-gray-500 mb-4">Dan masih banyak produk lainnya tersedia.</p>
            <a href="<?php echo esc_url( home_url( '/#paket' ) ); ?>"
               class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-semibold text-sm transition-colors">
                Lihat Paket Kemitraan
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

    </div>
</section>
