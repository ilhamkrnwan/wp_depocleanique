<?php
/**
 * Section: Ulasan Pembeli
 * Menampilkan screenshot ulasan marketplace sebagai social proof produk.
 * Gambar: assets/images/review-*.webp
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$dc_img = get_template_directory_uri() . '/assets/images';

$dc_reviews = [
    [
        'img'      => $dc_img . '/review-essenz.webp',
        'alt'      => __( 'Ulasan produk Essenz di marketplace', 'depocleanique-custom' ),
        'brand'    => 'Essenz',
        'platform' => __( 'Tokopedia', 'depocleanique-custom' ),
        'rating'   => 5,
        'quote'    => __( 'Bagus, Tahan Lama, Praktis dan mudah dibuat', 'depocleanique-custom' ),
    ],
    [
        'img'      => $dc_img . '/review-oclean.webp',
        'alt'      => __( 'Ulasan produk Oclean di marketplace', 'depocleanique-custom' ),
        'brand'    => 'Oclean',
        'platform' => __( 'Shopee', 'depocleanique-custom' ),
        'rating'   => 5,
        'quote'    => __( 'Produk berkualitas, pengiriman cepat, recommended!', 'depocleanique-custom' ),
    ],
    [
        'img'      => $dc_img . '/review-determat.webp',
        'alt'      => __( 'Ulasan produk Determat di marketplace', 'depocleanique-custom' ),
        'brand'    => 'Determat',
        'platform' => __( 'Shopee', 'depocleanique-custom' ),
        'rating'   => 5,
        'quote'    => __( 'Deterjen super bersih, wangi tahan lama, harga terjangkau', 'depocleanique-custom' ),
    ],
    [
        'img'      => $dc_img . '/review-athari.webp',
        'alt'      => __( 'Ulasan produk Athari di marketplace', 'depocleanique-custom' ),
        'brand'    => 'Athari',
        'platform' => __( 'Tokopedia', 'depocleanique-custom' ),
        'rating'   => 5,
        'quote'    => __( 'Sudah pakai berulang kali, hasilnya selalu memuaskan', 'depocleanique-custom' ),
    ],
];
?>

<section class="py-24 bg-surface-container-low" id="ulasan-pembeli" aria-labelledby="reviews-heading">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">

        <!-- Header -->
        <div class="text-center max-w-xl mx-auto mb-16 space-y-4" data-animate="fade-up">
            <span class="text-primary font-bold tracking-widest uppercase text-sm">
                <?php esc_html_e( 'Ulasan Nyata Pembeli', 'depocleanique-custom' ); ?>
            </span>
            <h2 id="reviews-heading" class="font-headline-lg text-headline-lg text-on-surface">
                <?php esc_html_e( 'Ribuan Pelanggan Puas,', 'depocleanique-custom' ); ?><br>
                <?php esc_html_e( 'Bukan Sekadar Klaim', 'depocleanique-custom' ); ?>
            </h2>
            <p class="text-on-surface-variant text-base leading-relaxed">
                <?php esc_html_e( 'Testimoni asli dari pembeli di marketplace — tanpa rekayasa, tanpa filter.', 'depocleanique-custom' ); ?>
            </p>
        </div>

        <!-- Review cards grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-stagger>
            <?php foreach ( $dc_reviews as $index => $review ) : ?>
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 flex flex-col"
                 data-animate="fade-up"
                 data-animate-delay="<?php echo esc_attr( $index ); ?>">

                <!-- Screenshot image -->
                <div class="relative overflow-hidden bg-surface-container-lowest">
                    <img
                        src="<?php echo esc_url( $review['img'] ); ?>"
                        alt="<?php echo esc_attr( $review['alt'] ); ?>"
                        class="w-full object-cover object-top transition-transform duration-500 hover:scale-105"
                        loading="lazy"
                        decoding="async"
                    />
                    <!-- Platform badge -->
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center gap-1 bg-white/90 backdrop-blur-sm text-on-surface text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                            <span class="material-symbols-outlined text-sm text-primary" aria-hidden="true">storefront</span>
                            <?php echo esc_html( $review['platform'] ); ?>
                        </span>
                    </div>
                </div>

                <!-- Card footer -->
                <div class="p-4 space-y-2 flex-1 flex flex-col justify-between">
                    <p class="text-sm text-on-surface-variant leading-relaxed italic">
                        &ldquo;<?php echo esc_html( $review['quote'] ); ?>&rdquo;
                    </p>
                    <div class="flex items-center justify-between pt-1">
                        <span class="text-xs font-bold text-on-surface"><?php echo esc_html( $review['brand'] ); ?></span>
                        <div class="flex items-center gap-0.5" aria-label="<?php echo esc_attr( sprintf( '%d dari 5 bintang', $review['rating'] ) ); ?>">
                            <?php for ( $i = 0; $i < $review['rating']; $i++ ) : ?>
                                <span class="material-symbols-outlined text-sm text-amber-400" style="font-variation-settings:'FILL' 1" aria-hidden="true">star</span>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Aggregate trust bar -->
        <div class="mt-12 flex flex-wrap justify-center items-center gap-8 text-center" data-animate="fade-up">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-amber-400 text-2xl" style="font-variation-settings:'FILL' 1" aria-hidden="true">star</span>
                <div class="text-left">
                    <p class="font-black text-lg text-on-surface leading-none">4.9 / 5</p>
                    <p class="text-xs text-on-surface-variant"><?php esc_html_e( 'Rating rata-rata', 'depocleanique-custom' ); ?></p>
                </div>
            </div>
            <div class="w-px h-10 bg-outline-variant hidden sm:block" aria-hidden="true"></div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">reviews</span>
                <div class="text-left">
                    <p class="font-black text-lg text-on-surface leading-none">10.000+</p>
                    <p class="text-xs text-on-surface-variant"><?php esc_html_e( 'Ulasan terverifikasi', 'depocleanique-custom' ); ?></p>
                </div>
            </div>
            <div class="w-px h-10 bg-outline-variant hidden sm:block" aria-hidden="true"></div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">thumb_up</span>
                <div class="text-left">
                    <p class="font-black text-lg text-on-surface leading-none">98%</p>
                    <p class="text-xs text-on-surface-variant"><?php esc_html_e( 'Pembeli puas', 'depocleanique-custom' ); ?></p>
                </div>
            </div>
        </div>

    </div>
</section>
