<?php
/**
 * Komponen CTA seragam (satu theme) — dipakai di semua halaman.
 *
 * Desain: kartu navy ringkas → badge + judul + deskripsi + 1 tombol pill.
 * Self-contained (section + container), jadi panggil langsung tanpa wrapper.
 *
 * Argumen (via get_template_part( ..., null, [ ... ] )):
 * - id              string  ID anchor section.
 * - badge           string  Teks badge kecil di atas judul (boleh kosong).
 * - title           string  Judul utama CTA.
 * - copy            string  Deskripsi (boleh mengandung <strong>).
 * - button_label    string  Label tombol.
 * - button_url      string  URL tombol.
 * - button_external bool    true → buka tab baru (mis. WhatsApp).
 * - button_icon     string  Nama Material Symbol untuk ikon tombol.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$args = wp_parse_args(
    $args ?? [],
    [
        'id'              => 'cta',
        'badge'           => __( 'Depo Cleanique', 'depocleanique-custom' ),
        'title'           => '',
        'copy'            => '',
        'button_label'    => __( 'Hubungi Kami', 'depocleanique-custom' ),
        'button_url'      => dc_get_wa_url( 'cta' ),
        'button_external' => true,
        'button_icon'     => 'arrow_forward',
    ]
);
?>

<section id="<?php echo esc_attr( $args['id'] ); ?>" class="dc-cta-section">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="dc-cta-card" data-animate="scale-in">
            <div class="dc-cta-content">
                <?php if ( '' !== trim( (string) $args['badge'] ) ) : ?>
                    <div class="dc-cta-badge">
                        <span class="dc-cta-badge-dot" aria-hidden="true"></span>
                        <span><?php echo esc_html( $args['badge'] ); ?></span>
                    </div>
                <?php endif; ?>

                <h2 class="dc-cta-title"><?php echo esc_html( $args['title'] ); ?></h2>

                <?php if ( '' !== trim( (string) $args['copy'] ) ) : ?>
                    <p class="dc-cta-copy"><?php echo wp_kses_post( $args['copy'] ); ?></p>
                <?php endif; ?>
            </div>

            <div class="dc-cta-action">
                <a
                    class="dc-cta-link"
                    href="<?php echo esc_url( $args['button_url'] ); ?>"
                    <?php echo $args['button_external'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
                >
                    <span><?php echo esc_html( $args['button_label'] ); ?></span>
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html( $args['button_icon'] ); ?></span>
                </a>
            </div>
        </div>
    </div>
</section>
