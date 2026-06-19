<?php
/**
 * Section: Contact Preview
 * Layout dan copy utama dari _landing-source.html.
 */

$contact_cards = [
    [
        'title'      => 'Alamat HQ',
        'content'    => dc_get_address_html(),
        'icon'       => 'location_on',
        'icon_color' => '#1E5FA8',
        'icon_bg'    => 'rgba(30,95,168,0.1)',
        'is_html'    => true,
    ],
    [
        'title'      => 'WhatsApp Bisnis',
        'content'    => esc_html( dc_get_wa_label() ),
        'icon'       => 'call',
        'icon_color' => '#1E5FA8',
        'icon_bg'    => 'rgba(30,95,168,0.1)',
    ],
    [
        'title'      => 'Email',
        'content'    => sprintf(
            '<a href="%s" class="dc-contact-inline-link">%s</a>',
            esc_url( 'mailto:' . dc_get_email() ),
            esc_html( dc_get_email() )
        ),
        'icon'       => 'mail',
        'icon_color' => '#1E5FA8',
        'icon_bg'    => 'rgba(30,95,168,0.1)',
        'is_html'    => true,
    ],
    [
        'title'      => 'Jam Operasional',
        'content'    => esc_html( dc_get_business_hours() ),
        'icon'       => 'schedule',
        'icon_color' => '#1E5FA8',
        'icon_bg'    => 'rgba(30,95,168,0.1)',
    ],
];
?>

<section class="py-24" id="kontak" style="background:#f2f4f6;">
    <div class="container mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="grid md:grid-cols-2 gap-16 items-start">
            <div class="space-y-8" data-animate="fade-right">
                <div class="space-y-3">
                    <p style="font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:#1E5FA8;">
                        Lokasi &amp; Kontak
                    </p>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">
                        Hubungi HQ Kami
                    </h2>
                    <p class="text-on-surface-variant">
                        Konsultasikan rencana bisnis Anda dengan tim ahli kami secara gratis.
                    </p>
                </div>

                <div class="space-y-4">
                    <?php foreach ( $contact_cards as $card ) : ?>
                        <div class="dc-contact-card">
                            <div class="dc-contact-icon" style="background:<?php echo esc_attr( $card['icon_bg'] ); ?>;" aria-hidden="true">
                                <span class="material-symbols-outlined" style="font-size:20px;color:<?php echo esc_attr( $card['icon_color'] ); ?>;font-variation-settings:'FILL' 1;">
                                    <?php echo esc_html( $card['icon'] ); ?>
                                </span>
                            </div>
                            <div>
                                <p class="dc-contact-card-title"><?php echo esc_html( $card['title'] ); ?></p>
                                <div class="dc-contact-card-text">
                                    <?php
                                    if ( ! empty( $card['is_html'] ) ) {
                                        echo $card['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped when built.
                                    } else {
                                        echo esc_html( $card['content'] );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a
                        href="<?php echo esc_url( dc_get_wa_url( 'contact' ) ); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="dc-contact-wa justify-center"
                        aria-label="<?php esc_attr_e( 'Hubungi kami di WhatsApp', 'depocleanique-custom' ); ?>"
                    >
                        <span class="material-symbols-outlined" style="font-size:20px;" aria-hidden="true">chat</span>
                        Hubungi Kami di WhatsApp
                    </a>
                    <a
                        href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"
                        class="hero-cta-ghost justify-center"
                        aria-label="<?php esc_attr_e( 'Buka halaman kontak lengkap', 'depocleanique-custom' ); ?>"
                    >
                        Halaman Kontak
                    </a>
                </div>
            </div>

            <div class="dc-contact-map aspect-video md:aspect-square" data-animate="fade-left">
                <iframe
                    src="https://maps.google.com/maps?q=<?php echo urlencode( dc_get_address() ); ?>&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                    title="<?php esc_attr_e( 'Lokasi HQ Depo Cleanique', 'depocleanique-custom' ); ?>"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </div>
</section>
