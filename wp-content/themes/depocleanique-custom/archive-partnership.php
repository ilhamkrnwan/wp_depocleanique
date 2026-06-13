<?php
/**
 * Partnership archive landing page.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );

$trust_items = [
    [ 'icon' => 'store', 'title' => __( 'Data mitra terdaftar', 'depocleanique-custom' ) ],
    [ 'icon' => 'map-pin', 'title' => __( 'Informasi area mitra', 'depocleanique-custom' ) ],
    [ 'icon' => 'package', 'title' => __( 'Produk dan layanan mitra', 'depocleanique-custom' ) ],
    [ 'icon' => 'shield', 'title' => __( 'Profil mudah dikelola', 'depocleanique-custom' ) ],
];

$audiences = [
    [ 'icon' => 'users', 'title' => __( 'Calon pelanggan', 'depocleanique-custom' ) ],
    [ 'icon' => 'store', 'title' => __( 'Mitra retail', 'depocleanique-custom' ) ],
    [ 'icon' => 'package', 'title' => __( 'Mitra laundry', 'depocleanique-custom' ) ],
    [ 'icon' => 'handshake', 'title' => __( 'Distributor/reseller', 'depocleanique-custom' ) ],
    [ 'icon' => 'shield', 'title' => __( 'Tim internal brand', 'depocleanique-custom' ) ],
];

$steps = [ 'Mitra didaftarkan dari dashboard', 'Lengkapi kategori dan area', 'Isi kontak dan profil singkat', 'Tambahkan foto outlet atau mitra', 'Publikasikan ke halaman kemitraan' ];
$requirements = [ 'Nama mitra atau outlet jelas', 'Area operasional terisi', 'Jenis kemitraan dipilih', 'Kontak atau WhatsApp valid', 'Foto dan ringkasan diperbarui berkala' ];
$faqs = [
    [ 'q' => 'Apa isi halaman kemitraan?', 'a' => 'Halaman ini menampilkan daftar mitra Depo Cleanique yang sudah terdaftar dan dipublikasikan dari dashboard.' ],
    [ 'q' => 'Apakah setiap mitra punya halaman detail?', 'a' => 'Ya. Setiap mitra memiliki halaman detail berisi profil, area, kategori, kontak, dan produk atau layanan.' ],
    [ 'q' => 'Apakah bisa menampilkan jenis mitra tertentu?', 'a' => 'Bisa. Jenis kemitraan seperti Retail, Laundry, Reseller, atau Distributor dapat dikelola melalui taxonomy.' ],
    [ 'q' => 'Bagaimana cara menambahkan mitra?', 'a' => 'Admin dapat membuka menu Kemitraan, tambah mitra baru, isi informasi, pilih jenis kemitraan, lalu publish.' ],
    [ 'q' => 'Apakah data kontak wajib publik?', 'a' => 'Kontak bisa diisi sesuai kebutuhan. Jika WhatsApp mitra kosong, tombol akan memakai WhatsApp global Depo Cleanique.' ],
];
?>

<main id="main-content" class="partnership-archive">
    <section class="partnership-hero" aria-labelledby="partnership-archive-title">
        <div class="partnership-container partnership-hero-inner">
            <div class="partnership-hero-copy">
                <span class="partnership-eyebrow"><?php esc_html_e( 'Kemitraan Depo Cleanique', 'depocleanique-custom' ); ?></span>
                <h1 id="partnership-archive-title"><?php esc_html_e( 'Daftar mitra resmi Depo Cleanique', 'depocleanique-custom' ); ?></h1>
                <p><?php esc_html_e( 'Temukan informasi mitra Depo Cleanique yang sudah terdaftar, mulai dari area operasional, jenis kemitraan, profil singkat, hingga produk dan layanan yang tersedia.', 'depocleanique-custom' ); ?></p>
                <div class="partnership-hero-actions">
                    <a class="partnership-button partnership-button-primary" href="<?php echo esc_url( dc_get_wa_url( 'partnership' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php echo dc_icon( 'message-circle' ); ?><?php esc_html_e( 'Hubungi Kami', 'depocleanique-custom' ); ?></a>
                    <a class="partnership-button partnership-button-ghost" href="#daftar-mitra"><?php esc_html_e( 'Lihat Mitra', 'depocleanique-custom' ); ?><?php echo dc_icon( 'arrow-right' ); ?></a>
                </div>
            </div>
            <div class="partnership-hero-card" aria-label="<?php esc_attr_e( 'Keunggulan kemitraan', 'depocleanique-custom' ); ?>">
                <?php foreach ( [ 'Profil mitra terdaftar', 'Area operasional', 'Jenis kemitraan', 'Kontak dan layanan' ] as $item ) : ?>
                    <div><?php echo dc_icon( 'check-circle' ); ?><span><?php echo esc_html( $item ); ?></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="partnership-trust">
        <div class="partnership-container partnership-trust-grid">
            <?php foreach ( $trust_items as $item ) : ?>
                <div class="partnership-trust-item"><?php echo dc_icon( $item['icon'] ); ?><span><?php echo esc_html( $item['title'] ); ?></span></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="daftar-mitra" class="partnership-programs" aria-labelledby="partnership-programs-title">
        <div class="partnership-container">
            <div class="partnership-section-heading">
                <span><?php esc_html_e( 'Daftar Mitra', 'depocleanique-custom' ); ?></span>
                <h2 id="partnership-programs-title"><?php esc_html_e( 'Semua mitra yang sudah terdaftar', 'depocleanique-custom' ); ?></h2>
            </div>
            <?php if ( have_posts() ) : ?>
                <div class="partnership-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/partnership/card' );
                    endwhile;
                    ?>
                </div>
            <?php else : ?>
                <?php get_template_part( 'template-parts/partnership/empty' ); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="partnership-section">
        <div class="partnership-container">
            <div class="partnership-section-heading">
                <span><?php esc_html_e( 'Direktori Mitra', 'depocleanique-custom' ); ?></span>
                <h2><?php esc_html_e( 'Informasi mitra yang mudah ditemukan', 'depocleanique-custom' ); ?></h2>
            </div>
            <div class="partnership-audience-grid">
                <?php foreach ( $audiences as $item ) : ?>
                    <div class="partnership-mini-card"><?php echo dc_icon( $item['icon'] ); ?><span><?php echo esc_html( $item['title'] ); ?></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="partnership-section partnership-steps" aria-labelledby="partnership-steps-title">
        <div class="partnership-container">
            <div class="partnership-section-heading">
                <span><?php esc_html_e( 'Alur Data', 'depocleanique-custom' ); ?></span>
                <h2 id="partnership-steps-title"><?php esc_html_e( 'Cara data mitra tampil di website', 'depocleanique-custom' ); ?></h2>
            </div>
            <div class="partnership-step-grid">
                <?php foreach ( $steps as $index => $step ) : ?>
                    <div class="partnership-step-card"><span><?php echo esc_html( $index + 1 ); ?></span><h3><?php echo esc_html( $step ); ?></h3></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="partnership-section">
        <div class="partnership-container partnership-two-column">
            <div>
                <div class="partnership-section-heading">
                    <span><?php esc_html_e( 'Kelengkapan Data', 'depocleanique-custom' ); ?></span>
                    <h2><?php esc_html_e( 'Informasi penting untuk setiap mitra', 'depocleanique-custom' ); ?></h2>
                </div>
                <ul class="partnership-check-list">
                    <?php foreach ( $requirements as $item ) : ?>
                        <li><?php echo dc_icon( 'check-circle' ); ?><?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="partnership-faq">
                <div class="partnership-section-heading">
                    <span><?php esc_html_e( 'FAQ Mitra', 'depocleanique-custom' ); ?></span>
                    <h2><?php esc_html_e( 'Pertanyaan seputar direktori mitra', 'depocleanique-custom' ); ?></h2>
                </div>
                <?php foreach ( $faqs as $faq ) : ?>
                    <details>
                        <summary><?php echo esc_html( $faq['q'] ); ?></summary>
                        <p><?php echo esc_html( $faq['a'] ); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="partnership-container">
        <?php get_template_part( 'template-parts/partnership/cta' ); ?>
    </div>
</main>

<?php get_footer(); ?>
