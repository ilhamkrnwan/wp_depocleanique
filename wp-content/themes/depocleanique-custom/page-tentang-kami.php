<?php
/**
 * Template Name: Tentang Kami
 * Template: page-tentang-kami
 *
 * Halaman Tentang Kami.
 *
 * Cara pakai:
 *   1. Buat halaman baru di Pages → Add New
 *   2. Isi judul dan konten halaman melalui editor WordPress
 *   3. Slug halaman: tentang-kami (WordPress akan otomatis pakai template ini)
 *
 * Struktur halaman:
 *   - Hero        : judul dari the_title(), subtitle dari excerpt (opsional)
 *   - Konten      : the_content() — diedit dari Gutenberg / Classic Editor
 *   - CTA         : tombol WhatsApp dari Customizer (Appearance → Customize)
 *
 * Catatan:
 *   - Nomor WA, email, dan alamat diatur di Appearance → Customize → Depo Cleanique.
 *   - Jika perlu field terstruktur (visi, misi, nilai), tambahkan ACF di tahap berikutnya.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- ── Hero ─────────────────────────────────────────
         Judul: diambil dari Page Title di WordPress editor.
         Subtitle: diambil dari Excerpt (Pages > Edit > Excerpt).
         Jika tidak ada excerpt, subtitle tidak tampil.
    ──────────────────────────────────────────────────── -->
    <section class="bg-gradient-to-br from-teal-50 to-white py-16 lg:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
            <span class="dc-section-label">Tentang Kami</span>
            <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-5 leading-tight">
                <?php the_title(); ?>
            </h1>
            <?php if ( has_excerpt() ) : ?>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    <?php the_excerpt(); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- ── Konten Utama ──────────────────────────────────
         Seluruh isi dari sini dikelola melalui WordPress editor.
         Masuk ke Pages > "Tentang Kami" > Edit untuk mengubah konten.
         Bisa menggunakan Gutenberg blocks atau Classic Editor.
    ──────────────────────────────────────────────────── -->
    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">
            <div class="dc-page-content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php endwhile; endif; ?>

    <!-- ── CTA ───────────────────────────────────────────
         Tombol WA menggunakan nomor dari Customizer.
         Ubah di: Appearance → Customize → Depo Cleanique → WhatsApp & Kontak
    ──────────────────────────────────────────────────── -->
    <section class="bg-teal-600 py-14">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-4">
                Bergabunglah Bersama Kami
            </h2>
            <p class="text-teal-100 mb-7 leading-relaxed">
                Jadilah bagian dari keluarga besar Depo Cleanique dan mulai perjalanan bisnis Anda.
            </p>
            <a href="<?php echo esc_url( dc_get_wa_url( 'about' ) ); ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="inline-flex items-center gap-2.5 bg-white hover:bg-gray-50 text-teal-700 px-7 py-3.5 rounded-xl font-bold text-sm transition-colors shadow-lg"
               aria-label="<?php esc_attr_e( 'Konsultasi kemitraan via WhatsApp', 'depocleanique-custom' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <?php esc_html_e( 'Mulai Konsultasi Gratis', 'depocleanique-custom' ); ?>
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
