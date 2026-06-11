<?php
/**
 * Template Name: Kontak
 * Template: page-kontak
 *
 * Halaman Kontak.
 *
 * Cara pakai:
 *   1. Buat halaman baru di Pages → Add New
 *   2. Judul: "Hubungi Kami" (atau bebas)
 *   3. Slug: kontak
 *   4. Isi konten (deskripsi, ajakan, shortcode form) melalui editor WordPress
 *
 * Struktur halaman:
 *   - Hero     : judul dari the_title(), excerpt sebagai subtitle (opsional)
 *   - Kiri     : the_content() — diedit dari WordPress editor
 *               (cocok untuk deskripsi atau shortcode form plugin seperti WPForms / CF7)
 *   - Kanan    : Info kontak dinamis dari Customizer (WA, email, alamat, jam)
 *   - CTA      : tombol WhatsApp dari Customizer
 *
 * Catatan:
 *   - Info kontak (WA, email, alamat) diatur di Appearance → Customize → Depo Cleanique.
 *   - Untuk form aktif: install WPForms atau Contact Form 7, lalu paste shortcode di editor.
 *   - Jika perlu field terstruktur tambahan, gunakan ACF di tahap berikutnya.
 */

get_header();
get_template_part( 'template-parts/layout/site-header' );
?>

<main id="main-content">

    <!-- ── Hero ─────────────────────────────────────────
         Judul: dari Page Title di WordPress editor.
         Subtitle: dari Excerpt (opsional).
    ──────────────────────────────────────────────────── -->
    <section class="bg-gradient-to-br from-teal-50 to-white py-14 lg:py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
            <span class="dc-section-label">Kontak</span>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                <?php the_title(); ?>
            </h1>
            <?php if ( has_excerpt() ) : ?>
                <p class="text-lg text-gray-600 leading-relaxed max-w-xl mx-auto">
                    <?php the_excerpt(); ?>
                </p>
            <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
    </section>

    <!-- ── Konten + Info Kontak ──────────────────────── -->
    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-5 gap-12">

                <!-- Kiri: konten dari WordPress editor ──────────
                     Masuk ke Pages > "Kontak" > Edit untuk mengubah.
                     Bisa berisi teks biasa, Gutenberg blocks,
                     atau shortcode form seperti [wpforms id="xxx"].
                ─────────────────────────────────────────────── -->
                <div class="lg:col-span-3">
                    <?php
                    // Re-loop karena sudah di-loop di hero section
                    rewind_posts();
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    ?>
                    <div class="dc-page-content">
                        <?php the_content(); ?>
                    </div>
                    <?php endwhile; endif; ?>
                </div>

                <!-- Kanan: info kontak dari Customizer ──────────
                     Ubah di: Appearance → Customize → Depo Cleanique → WhatsApp & Kontak
                ─────────────────────────────────────────────── -->
                <div class="lg:col-span-2 space-y-5">

                    <h2 class="text-lg font-bold text-gray-900 mb-6">
                        <?php esc_html_e( 'Informasi Kontak', 'depocleanique-custom' ); ?>
                    </h2>

                    <!-- WhatsApp -->
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php esc_html_e( 'WhatsApp', 'depocleanique-custom' ); ?></p>
                            <a href="<?php echo esc_url( dc_get_wa_url( 'contact' ) ); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="text-green-600 hover:text-green-700 font-medium text-sm transition-colors">
                                <?php echo esc_html( dc_get_wa_label() ); ?>
                            </a>
                            <p class="text-xs text-gray-400 mt-0.5"><?php echo esc_html( dc_get_business_hours() ); ?></p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-teal-50 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php esc_html_e( 'Email', 'depocleanique-custom' ); ?></p>
                            <a href="<?php echo esc_url( 'mailto:' . dc_get_email() ); ?>"
                               class="text-teal-600 hover:text-teal-700 font-medium text-sm transition-colors">
                                <?php echo esc_html( dc_get_email() ); ?>
                            </a>
                            <p class="text-xs text-gray-400 mt-0.5"><?php esc_html_e( 'Dibalas dalam 1×24 jam kerja', 'depocleanique-custom' ); ?></p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-teal-50 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php esc_html_e( 'Jam Operasional', 'depocleanique-custom' ); ?></p>
                            <p class="text-sm text-gray-700"><?php echo esc_html( dc_get_business_hours() ); ?></p>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-teal-50 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php esc_html_e( 'Alamat', 'depocleanique-custom' ); ?></p>
                            <address class="not-italic text-sm text-gray-700 leading-relaxed">
                                <?php echo dc_get_address_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — already escaped in helper ?>
                            </address>
                        </div>
                    </div>

                    <!-- CTA WA -->
                    <div class="pt-4">
                        <a href="<?php echo esc_url( dc_get_wa_url( 'contact' ) ); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flex items-center justify-center gap-2.5 bg-teal-600 hover:bg-teal-700 text-white w-full px-5 py-3.5 rounded-xl font-semibold text-sm transition-colors"
                           aria-label="<?php esc_attr_e( 'Konsultasi langsung via WhatsApp', 'depocleanique-custom' ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            <?php esc_html_e( 'Konsultasi via WhatsApp', 'depocleanique-custom' ); ?>
                        </a>
                    </div>

                </div><!-- end kanan -->
            </div><!-- end grid -->
        </div>
    </section>

</main>

<?php get_footer(); ?>
