<?php
/**
 * Partnership CTA — memakai komponen CTA seragam (template-parts/sections/cta).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id = get_the_ID();
$wa_url  = is_singular( 'partnership' ) ? dc_get_partnership_whatsapp_url( $post_id ) : dc_get_wa_url( 'partnership' );

get_template_part(
    'template-parts/sections/cta',
    null,
    [
        'id'              => 'partnership-cta',
        'badge'           => __( 'Kemitraan Depo Cleanique', 'depocleanique-custom' ),
        'title'           => __( 'Ingin terdaftar sebagai mitra Depo Cleanique?', 'depocleanique-custom' ),
        'copy'            => __( 'Hubungi tim kami untuk membahas peluang kerja sama, area operasional, dan kebutuhan produk.', 'depocleanique-custom' ),
        'button_label'    => __( 'Hubungi WhatsApp', 'depocleanique-custom' ),
        'button_url'      => $wa_url,
        'button_external' => true,
        'button_icon'     => 'chat',
    ]
);
