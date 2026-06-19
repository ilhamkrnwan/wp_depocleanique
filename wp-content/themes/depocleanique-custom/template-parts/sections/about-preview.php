<?php
/**
 * Section: About Preview
 * Diport dari _landing-source.html (id="tentang-kami").
 * Gambar lokal: assets/images/depocleanique-3.avif.
 * Tombol menuju halaman Tentang Kami: home_url('/tentang-kami/').
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$dc_img = get_template_directory_uri() . '/assets/images';
?>

<section class="py-24 bg-surface-container-low" id="tentang-kami">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="relative" data-animate="fade-right">
                <div class="aspect-[4/5] rounded-xl overflow-hidden shadow-2xl">
                    <img alt="<?php esc_attr_e( 'Depo Cleanique HQ', 'depocleanique-custom' ); ?>"
                         class="w-full h-full object-cover"
                         src="<?php echo esc_url( $dc_img . '/depocleanique-3.avif' ); ?>" />
                </div>
                <div class="absolute -bottom-8 -right-8 bg-secondary text-white p-8 rounded-xl shadow-xl hidden lg:block">
                    <p class="text-5xl font-black mb-1">12+</p>
                    <p class="text-sm font-bold uppercase tracking-widest opacity-80"><?php esc_html_e( 'Tahun Inovasi', 'depocleanique-custom' ); ?></p>
                </div>
            </div>
            <div class="space-y-8" data-animate="fade-left">
                <div class="space-y-4">
                    <span class="text-primary font-bold tracking-widest uppercase text-sm"><?php esc_html_e( 'Tentang Depo Cleanique', 'depocleanique-custom' ); ?></span>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">
                        <?php esc_html_e( 'Suplai Sabun Curah Berkualitas untuk Usaha & Kemitraan Depo', 'depocleanique-custom' ); ?>
                    </h2>
                    <p class="text-on-surface-variant text-lg leading-relaxed">
                        <?php esc_html_e( 'Depo Cleanique (di bawah naungan PT Indotech Berkah Abadi) didirikan di Yogyakarta pada tahun 2011 untuk membantu pelaku usaha menekan biaya operasional. Kami menyediakan sabun curah premium tanpa kemasan mahal untuk laundry, restoran, dan instansi.', 'depocleanique-custom' ); ?>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <h4 class="text-2xl font-bold text-secondary">1JT+</h4>
                        <p class="text-sm text-on-surface-variant"><?php esc_html_e( 'Produk Terjual Nasional', 'depocleanique-custom' ); ?></p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-2xl font-bold text-secondary">Kemenkes</h4>
                        <p class="text-sm text-on-surface-variant"><?php esc_html_e( 'Izin Resmi & Sertifikasi Halal', 'depocleanique-custom' ); ?></p>
                    </div>
                </div>
                <div class="p-6 bg-white rounded-xl border border-outline-variant/30">
                    <p class="text-on-surface-variant italic">
                        <?php esc_html_e( '"Di industri B2B, efisiensi adalah segalanya. Kami membantu Anda memangkas pengeluaran kemasan plastik sekali pakai sehingga keuntungan bersih usaha Anda bisa meningkat hingga dua kali lipat."', 'depocleanique-custom' ); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>"
                   class="inline-block bg-on-secondary-fixed text-white px-8 py-3 rounded-full font-bold hover:bg-secondary transition-all">
                    <?php esc_html_e( 'Pelajari Selengkapnya', 'depocleanique-custom' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
