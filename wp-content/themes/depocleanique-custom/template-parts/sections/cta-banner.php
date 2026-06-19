<?php
/**
 * Section: CTA Banner (garansi).
 * Memakai komponen CTA seragam (template-parts/sections/cta).
 * Dipanggil di front-page dan otomatis di footer untuk halaman lain.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_template_part(
    'template-parts/sections/cta',
    null,
    [
        'id'              => 'cta',
        'badge'           => __( 'Jaminan Kemitraan', 'depocleanique-custom' ),
        'title'           => __( 'Garansi Balik Modal 12 Bulan', 'depocleanique-custom' ),
        'copy'            => __( 'Kami menjamin modal usaha depo Anda kembali dalam <strong>12 bulan</strong>, atau sisa stok dan peralatan kami beli kembali sepenuhnya.', 'depocleanique-custom' ),
        'button_label'    => __( 'Konsultasi Kemitraan Depo', 'depocleanique-custom' ),
        'button_url'      => home_url( '/kontak/' ),
        'button_external' => false,
        'button_icon'     => 'arrow_forward',
    ]
);
