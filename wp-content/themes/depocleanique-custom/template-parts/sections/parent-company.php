<?php
/**
 * Section: PT Indotech Berkah Abadi — profil perusahaan induk.
 * Ditampilkan di halaman Tentang Kami (/tentang-kami/).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="py-24 bg-surface" id="profil-perusahaan" aria-labelledby="parent-company-heading">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-4" data-animate="fade-up">
            <span class="inline-flex items-center gap-2 text-primary font-bold tracking-widest uppercase text-sm">
                <span class="material-symbols-outlined text-base" aria-hidden="true">corporate_fare</span>
                <?php esc_html_e( 'Perusahaan Induk', 'depocleanique-custom' ); ?>
            </span>
            <h2 id="parent-company-heading" class="font-headline-lg text-headline-lg text-on-surface">
                PT Indotech Berkah Abadi
            </h2>
            <p class="text-on-surface-variant text-lg leading-relaxed">
                <?php esc_html_e( 'Perusahaan teknologi konsumer berbasis di Yogyakarta yang berfokus pada inovasi produk pembersih ramah lingkungan dan ekosistem kemitraan berkelanjutan.', 'depocleanique-custom' ); ?>
            </p>
        </div>

        <!-- Stats row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16" data-animate="fade-up" data-animate-delay="1">
            <div class="text-center p-6 bg-surface-container-low rounded-xl">
                <p class="text-4xl font-black text-secondary mb-1">2011</p>
                <p class="text-sm text-on-surface-variant uppercase tracking-wide font-medium">
                    <?php esc_html_e( 'Tahun Berdiri', 'depocleanique-custom' ); ?>
                </p>
            </div>
            <div class="text-center p-6 bg-surface-container-low rounded-xl">
                <p class="text-4xl font-black text-secondary mb-1">12+</p>
                <p class="text-sm text-on-surface-variant uppercase tracking-wide font-medium">
                    <?php esc_html_e( 'Tahun Inovasi', 'depocleanique-custom' ); ?>
                </p>
            </div>
            <div class="text-center p-6 bg-surface-container-low rounded-xl">
                <p class="text-4xl font-black text-secondary mb-1">1JT+</p>
                <p class="text-sm text-on-surface-variant uppercase tracking-wide font-medium">
                    <?php esc_html_e( 'Produk Terjual', 'depocleanique-custom' ); ?>
                </p>
            </div>
            <div class="text-center p-6 bg-surface-container-low rounded-xl">
                <p class="text-4xl font-black text-secondary mb-1">DIY</p>
                <p class="text-sm text-on-surface-variant uppercase tracking-wide font-medium">
                    <?php esc_html_e( 'Yogyakarta', 'depocleanique-custom' ); ?>
                </p>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="grid md:grid-cols-2 gap-8 mb-16" data-animate="fade-up" data-animate-delay="2">
            <div class="p-8 bg-primary/5 border border-primary/20 rounded-2xl space-y-4">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">visibility</span>
                    <h3 class="text-lg font-bold text-on-surface">
                        <?php esc_html_e( 'Visi', 'depocleanique-custom' ); ?>
                    </h3>
                </div>
                <p class="text-on-surface-variant leading-relaxed">
                    <?php esc_html_e( 'Menjadi perusahaan teknologi konsumer terdepan di Indonesia yang menghadirkan solusi produk pembersih terjangkau, halal, dan ramah lingkungan melalui ekosistem bisnis berbasis kemitraan.', 'depocleanique-custom' ); ?>
                </p>
            </div>
            <div class="p-8 bg-secondary/5 border border-secondary/20 rounded-2xl space-y-4">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-secondary text-2xl" aria-hidden="true">track_changes</span>
                    <h3 class="text-lg font-bold text-on-surface">
                        <?php esc_html_e( 'Misi', 'depocleanique-custom' ); ?>
                    </h3>
                </div>
                <p class="text-on-surface-variant leading-relaxed">
                    <?php esc_html_e( 'Membangun ekosistem usaha yang inklusif dengan mendukung mitra UMKM melalui produk bersertifikat, sistem manajemen berbasis teknologi AI, dan pendampingan bisnis berkelanjutan.', 'depocleanique-custom' ); ?>
                </p>
            </div>
        </div>

        <!-- Legalitas & Sertifikasi -->
        <div class="mb-16" data-animate="fade-up" data-animate-delay="3">
            <h3 class="text-center text-base font-bold uppercase tracking-widest text-on-surface-variant mb-8">
                <?php esc_html_e( 'Legalitas & Sertifikasi', 'depocleanique-custom' ); ?>
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                $certifications = [
                    [
                        'icon'  => 'health_and_safety',
                        'label' => __( 'Izin Kemenkes', 'depocleanique-custom' ),
                        'desc'  => __( 'Produk terdaftar & aman', 'depocleanique-custom' ),
                    ],
                    [
                        'icon'  => 'verified',
                        'label' => __( 'Sertifikat Halal', 'depocleanique-custom' ),
                        'desc'  => __( 'MUI bersertifikat resmi', 'depocleanique-custom' ),
                    ],
                    [
                        'icon'  => 'apartment',
                        'label' => __( 'Badan Hukum Resmi', 'depocleanique-custom' ),
                        'desc'  => __( 'PT terdaftar Kemenkumham', 'depocleanique-custom' ),
                    ],
                    [
                        'icon'  => 'eco',
                        'label' => __( 'Ramah Lingkungan', 'depocleanique-custom' ),
                        'desc'  => __( 'Formula biodegradable', 'depocleanique-custom' ),
                    ],
                ];
                foreach ( $certifications as $cert ) :
                ?>
                <div class="flex items-start gap-4 p-5 bg-surface-container-low rounded-xl">
                    <span class="material-symbols-outlined text-primary mt-0.5 shrink-0" aria-hidden="true">
                        <?php echo esc_html( $cert['icon'] ); ?>
                    </span>
                    <div>
                        <p class="font-semibold text-on-surface text-sm"><?php echo esc_html( $cert['label'] ); ?></p>
                        <p class="text-xs text-on-surface-variant mt-0.5"><?php echo esc_html( $cert['desc'] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Brand Unggulan -->
        <div data-animate="fade-up" data-animate-delay="4">
            <div class="text-center mb-8 space-y-2">
                <h3 class="text-base font-bold uppercase tracking-widest text-on-surface-variant">
                    <?php esc_html_e( 'Brand Unggulan', 'depocleanique-custom' ); ?>
                </h3>
                <p class="text-sm text-on-surface-variant">
                    <?php esc_html_e( 'Ekosistem produk & layanan di bawah naungan PT Indotech Berkah Abadi', 'depocleanique-custom' ); ?>
                </p>
            </div>

            <?php
            $dc_brands = [
                [
                    'name'    => 'Depo Cleanique',
                    'url'     => home_url( '/' ),
                    'icon'    => 'water_drop',
                    'tag'     => __( 'Brand Ini', 'depocleanique-custom' ),
                    'desc'    => __( 'Refill station berbasis AI — solusi produk harian terjangkau dengan model kemitraan bagi UMKM.', 'depocleanique-custom' ),
                    'pills'   => [ 'Refill Station', 'AI Marketing', 'Kemitraan' ],
                    'current' => true,
                ],
                [
                    'name'    => 'Cleanique Mart',
                    'url'     => 'https://cleaniquemart.com/',
                    'icon'    => 'storefront',
                    'tag'     => __( 'Ritel', 'depocleanique-custom' ),
                    'desc'    => __( 'Platform ritel produk kebersihan rumah tangga berkualitas dengan jaringan distribusi nasional.', 'depocleanique-custom' ),
                    'pills'   => [ 'Ritel', 'Homecare', 'Distribusi' ],
                    'current' => false,
                ],
                [
                    'name'    => 'Cleanique Lab',
                    'url'     => 'https://cleaniquelab.com/',
                    'icon'    => 'science',
                    'tag'     => __( 'R&D', 'depocleanique-custom' ),
                    'desc'    => __( 'Pusat riset dan pengembangan formula produk pembersih halal, biodegradable, dan inovatif.', 'depocleanique-custom' ),
                    'pills'   => [ 'R&D', 'Formula', 'Halal' ],
                    'current' => false,
                ],
                [
                    'name'    => 'Cleanique Academy',
                    'url'     => 'https://cleaniqueacademy.com/',
                    'icon'    => 'school',
                    'tag'     => __( 'Edukasi', 'depocleanique-custom' ),
                    'desc'    => __( 'Platform pelatihan dan sertifikasi kewirausahaan untuk mitra dan pelaku UMKM Indonesia.', 'depocleanique-custom' ),
                    'pills'   => [ 'Pelatihan', 'Sertifikasi', 'UMKM' ],
                    'current' => false,
                ],
                [
                    'name'    => 'Prokopi',
                    'url'     => 'https://prokopi.id/',
                    'icon'    => 'coffee',
                    'tag'     => __( 'F&B', 'depocleanique-custom' ),
                    'desc'    => __( 'Brand kopi premium lokal Indonesia dengan model bisnis waralaba yang terjangkau untuk pengusaha muda.', 'depocleanique-custom' ),
                    'pills'   => [ 'Kopi', 'Waralaba', 'F&B' ],
                    'current' => false,
                ],
                [
                    'name'    => 'Malabeez',
                    'url'     => 'https://malabeez.co.id/',
                    'icon'    => 'spa',
                    'tag'     => __( 'Beauty', 'depocleanique-custom' ),
                    'desc'    => __( 'Brand perawatan diri dan kecantikan berbahan alami dengan standar halal dan ramah lingkungan.', 'depocleanique-custom' ),
                    'pills'   => [ 'Beauty', 'Natural', 'Halal' ],
                    'current' => false,
                ],
            ];
            ?>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ( $dc_brands as $brand ) :
                    $is_external = ! $brand['current'];
                    $card_class  = $brand['current']
                        ? 'bg-gradient-to-br from-primary to-secondary text-white shadow-2xl ring-2 ring-primary/30'
                        : 'bg-surface-container-low text-on-surface hover:shadow-lg transition-shadow';
                ?>
                <a href="<?php echo esc_url( $brand['url'] ); ?>"
                   class="relative block rounded-2xl p-6 no-underline group <?php echo esc_attr( $card_class ); ?>"
                   <?php if ( $is_external ) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>

                    <?php if ( $brand['current'] ) : ?>
                        <div class="absolute top-0 right-0 w-28 h-28 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none" aria-hidden="true"></div>
                    <?php endif; ?>

                    <div class="relative space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-2xl <?php echo $brand['current'] ? '' : 'text-primary'; ?>" aria-hidden="true">
                                    <?php echo esc_html( $brand['icon'] ); ?>
                                </span>
                                <p class="font-black text-base leading-none"><?php echo esc_html( $brand['name'] ); ?></p>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full <?php echo $brand['current'] ? 'bg-white/20 text-white' : 'bg-primary/10 text-primary'; ?>">
                                <?php echo esc_html( $brand['tag'] ); ?>
                            </span>
                        </div>

                        <p class="text-sm leading-relaxed <?php echo $brand['current'] ? 'text-white/85' : 'text-on-surface-variant'; ?>">
                            <?php echo esc_html( $brand['desc'] ); ?>
                        </p>

                        <div class="flex flex-wrap gap-1.5 pt-1">
                            <?php foreach ( $brand['pills'] as $pill ) : ?>
                            <span class="text-xs px-2.5 py-0.5 rounded-full <?php echo $brand['current'] ? 'bg-white/20 text-white' : 'bg-surface-container text-on-surface-variant'; ?>">
                                <?php echo esc_html( $pill ); ?>
                            </span>
                            <?php endforeach; ?>
                        </div>

                        <?php if ( $is_external ) : ?>
                        <div class="flex items-center gap-1 text-primary text-xs font-semibold group-hover:gap-2 transition-all">
                            <span><?php echo esc_html( wp_parse_url( $brand['url'], PHP_URL_HOST ) ); ?></span>
                            <span class="material-symbols-outlined text-sm" aria-hidden="true">open_in_new</span>
                        </div>
                        <?php endif; ?>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <!-- Link ke website PT -->
            <div class="text-center mt-10">
                <a href="https://indotech.id/"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-outline-variant text-on-surface-variant hover:text-primary hover:border-primary transition-colors text-sm font-semibold no-underline"
                   target="_blank" rel="noopener noreferrer">
                    <span class="material-symbols-outlined text-base" aria-hidden="true">corporate_fare</span>
                    <?php esc_html_e( 'Kunjungi Website PT Indotech Berkah Abadi', 'depocleanique-custom' ); ?>
                    <span class="material-symbols-outlined text-sm" aria-hidden="true">open_in_new</span>
                </a>
            </div>
        </div>

    </div>
</section>
