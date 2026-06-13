<?php
/**
 * Partner CPT, taxonomy, meta, and admin helpers.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function dc_register_partnership_content() {
    register_post_type(
        'partnership',
        [
            'labels'       => [
                'name'               => __( 'Kemitraan', 'depocleanique-custom' ),
                'singular_name'      => __( 'Mitra Terdaftar', 'depocleanique-custom' ),
                'menu_name'          => __( 'Kemitraan', 'depocleanique-custom' ),
                'add_new_item'       => __( 'Tambah Mitra', 'depocleanique-custom' ),
                'edit_item'          => __( 'Edit Mitra', 'depocleanique-custom' ),
                'new_item'           => __( 'Mitra Baru', 'depocleanique-custom' ),
                'view_item'          => __( 'Lihat Mitra', 'depocleanique-custom' ),
                'search_items'       => __( 'Cari Mitra', 'depocleanique-custom' ),
                'not_found'          => __( 'Belum ada mitra terdaftar.', 'depocleanique-custom' ),
                'not_found_in_trash' => __( 'Tidak ada mitra di sampah.', 'depocleanique-custom' ),
            ],
            'public'       => true,
            'has_archive'  => true,
            'rewrite'      => [ 'slug' => 'kemitraan' ],
            'show_in_rest' => true,
            'menu_icon'    => 'dashicons-groups',
            'menu_position'=> 26,
            'supports'     => [ 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'revisions' ],
        ]
    );

    register_taxonomy(
        'partnership_type',
        [ 'partnership' ],
        [
            'labels'       => [
                'name'          => __( 'Jenis Kemitraan', 'depocleanique-custom' ),
                'singular_name' => __( 'Jenis Kemitraan', 'depocleanique-custom' ),
                'menu_name'     => __( 'Jenis Kemitraan', 'depocleanique-custom' ),
                'search_items'  => __( 'Cari Jenis Kemitraan', 'depocleanique-custom' ),
                'all_items'     => __( 'Semua Jenis Kemitraan', 'depocleanique-custom' ),
                'edit_item'     => __( 'Edit Jenis Kemitraan', 'depocleanique-custom' ),
                'add_new_item'  => __( 'Tambah Jenis Kemitraan', 'depocleanique-custom' ),
            ],
            'hierarchical' => true,
            'public'       => true,
            'show_in_rest' => true,
            'rewrite'      => [ 'slug' => 'jenis-kemitraan' ],
        ]
    );
}
add_action( 'init', 'dc_register_partnership_content' );

function dc_partnership_activate() {
    dc_register_partnership_content();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'dc_partnership_activate' );

function dc_seed_partnership_terms() {
    $terms = [ 'Depo', 'Reseller', 'Distributor', 'Laundry', 'Retail', 'UMKM' ];

    foreach ( $terms as $term ) {
        if ( ! term_exists( $term, 'partnership_type' ) ) {
            wp_insert_term( $term, 'partnership_type' );
        }
    }
}
add_action( 'init', 'dc_seed_partnership_terms', 20 );

function dc_get_partnership_meta( $post_id, $key, $default = '' ) {
    $value = get_post_meta( $post_id, $key, true );

    return '' === $value ? $default : $value;
}

function dc_parse_lines( $text ) {
    $lines = preg_split( '/\r\n|\r|\n/', (string) $text );
    $items = [];

    foreach ( $lines as $line ) {
        $line = trim( wp_strip_all_tags( $line ) );
        if ( '' !== $line ) {
            $items[] = $line;
        }
    }

    return $items;
}

function dc_parse_key_value_lines( $text ) {
    $items = [];

    foreach ( dc_parse_lines( $text ) as $line ) {
        $parts = array_map( 'trim', explode( '|', $line, 2 ) );
        if ( 2 === count( $parts ) && '' !== $parts[0] && '' !== $parts[1] ) {
            $items[] = [
                'label' => $parts[0],
                'value' => $parts[1],
            ];
        }
    }

    return $items;
}

function dc_get_partnership_whatsapp_url( $post_id ) {
    $custom_url = dc_get_partnership_meta( $post_id, '_partnership_whatsapp_url' );

    if ( $custom_url ) {
        return $custom_url;
    }

    return dc_get_wa_url( 'partnership', sprintf( 'Halo Depo Cleanique! Saya ingin konsultasi program kemitraan %s.', get_the_title( $post_id ) ) );
}

function dc_is_partnership_featured( $post_id ) {
    return '1' === (string) get_post_meta( $post_id, '_partnership_featured', true );
}

function dc_get_partnership_summary( $post_id ) {
    $summary = dc_get_partnership_meta( $post_id, '_partnership_summary' );

    if ( $summary ) {
        return $summary;
    }

    return has_excerpt( $post_id ) ? get_the_excerpt( $post_id ) : wp_trim_words( get_post_field( 'post_content', $post_id ), 24 );
}

function dc_get_partnership_location( $post_id ) {
    return dc_get_partnership_meta( $post_id, '_partnership_location' );
}

function dc_get_partnership_types_label( $post_id ) {
    $terms = get_the_terms( $post_id, 'partnership_type' );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return '';
    }

    return implode( ', ', wp_list_pluck( $terms, 'name' ) );
}

function dc_partnership_meta_fields() {
    return [
        '_partnership_location'     => [ 'label' => __( 'Kota / Area Mitra', 'depocleanique-custom' ), 'type' => 'text', 'placeholder' => __( 'Sleman, Yogyakarta', 'depocleanique-custom' ) ],
        '_partnership_address'      => [ 'label' => __( 'Alamat Mitra', 'depocleanique-custom' ), 'type' => 'textarea', 'placeholder' => __( 'Alamat lengkap outlet atau area operasional mitra.', 'depocleanique-custom' ) ],
        '_partnership_owner'        => [ 'label' => __( 'Nama Penanggung Jawab', 'depocleanique-custom' ), 'type' => 'text', 'placeholder' => __( 'Nama owner / PIC', 'depocleanique-custom' ) ],
        '_partnership_phone'        => [ 'label' => __( 'Nomor Kontak Mitra', 'depocleanique-custom' ), 'type' => 'text', 'placeholder' => __( '08xx-xxxx-xxxx', 'depocleanique-custom' ) ],
        '_partnership_whatsapp_url' => [ 'label' => __( 'WhatsApp Mitra / CTA URL', 'depocleanique-custom' ), 'type' => 'url', 'placeholder' => dc_get_wa_url( 'partnership' ) ],
        '_partnership_badge'        => [ 'label' => __( 'Label Badge', 'depocleanique-custom' ), 'type' => 'text', 'placeholder' => __( 'Mitra Aktif', 'depocleanique-custom' ) ],
        '_partnership_since'        => [ 'label' => __( 'Bergabung Sejak', 'depocleanique-custom' ), 'type' => 'text', 'placeholder' => __( '2026', 'depocleanique-custom' ) ],
        '_partnership_summary'      => [ 'label' => __( 'Ringkasan Mitra', 'depocleanique-custom' ), 'type' => 'textarea', 'placeholder' => __( 'Profil singkat mitra untuk card dan detail.', 'depocleanique-custom' ) ],
        '_partnership_services'     => [ 'label' => __( 'Produk / Layanan Mitra', 'depocleanique-custom' ), 'type' => 'textarea' ],
        '_partnership_facilities'   => [ 'label' => __( 'Fasilitas / Keunggulan Mitra', 'depocleanique-custom' ), 'type' => 'textarea' ],
        '_partnership_highlights'   => [ 'label' => __( 'Highlight Mitra', 'depocleanique-custom' ), 'type' => 'textarea', 'placeholder' => "Area|Sleman\nStatus|Aktif\nKategori|Retail & Laundry" ],
    ];
}

function dc_add_partnership_meta_box() {
    add_meta_box(
        'dc_partnership_info',
        __( 'Informasi Mitra', 'depocleanique-custom' ),
        'dc_render_partnership_meta_box',
        'partnership',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'dc_add_partnership_meta_box' );

function dc_render_partnership_meta_box( $post ) {
    wp_nonce_field( 'dc_save_partnership_meta', 'dc_partnership_meta_nonce' );
    ?>
    <p class="description"><?php esc_html_e( 'Gunakan judul sebagai nama mitra/outlet. Untuk field list, tulis satu item per baris. Untuk highlight, gunakan format Label|Value.', 'depocleanique-custom' ); ?></p>
    <p>
        <label>
            <input type="checkbox" name="_partnership_featured" value="1" <?php checked( dc_is_partnership_featured( $post->ID ) ); ?>>
            <?php esc_html_e( 'Tandai sebagai mitra unggulan', 'depocleanique-custom' ); ?>
        </label>
    </p>
    <div class="dc-partnership-admin-grid">
        <?php foreach ( dc_partnership_meta_fields() as $key => $field ) : ?>
            <?php $value = dc_get_partnership_meta( $post->ID, $key ); ?>
            <p class="dc-partnership-admin-field">
                <label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $field['label'] ); ?></strong></label>
                <?php if ( 'textarea' === $field['type'] ) : ?>
                    <textarea id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" rows="4" style="width:100%;" placeholder="<?php echo esc_attr( $field['placeholder'] ?? '' ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
                <?php else : ?>
                    <input id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" type="<?php echo esc_attr( $field['type'] ); ?>" value="<?php echo esc_attr( $value ); ?>" style="width:100%;" placeholder="<?php echo esc_attr( $field['placeholder'] ?? '' ); ?>">
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
    </div>
    <?php
}

function dc_save_partnership_meta( $post_id ) {
    if ( ! isset( $_POST['dc_partnership_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dc_partnership_meta_nonce'] ) ), 'dc_save_partnership_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    foreach ( dc_partnership_meta_fields() as $key => $field ) {
        $raw = isset( $_POST[ $key ] ) ? wp_unslash( $_POST[ $key ] ) : '';
        $value = 'url' === $field['type'] ? esc_url_raw( $raw ) : sanitize_textarea_field( $raw );
        update_post_meta( $post_id, $key, $value );
    }

    update_post_meta( $post_id, '_partnership_featured', isset( $_POST['_partnership_featured'] ) ? '1' : '0' );
}
add_action( 'save_post_partnership', 'dc_save_partnership_meta' );

function dc_partnership_admin_columns( $columns ) {
    return [
        'cb'                     => $columns['cb'],
        'thumbnail'              => __( 'Thumbnail', 'depocleanique-custom' ),
        'title'                  => __( 'Judul', 'depocleanique-custom' ),
        'partnership_location'   => __( 'Kota/Area', 'depocleanique-custom' ),
        'partnership_type'       => __( 'Jenis Kemitraan', 'depocleanique-custom' ),
        'partnership_badge'      => __( 'Badge', 'depocleanique-custom' ),
        'partnership_featured'   => __( 'Featured', 'depocleanique-custom' ),
        'menu_order'             => __( 'Urutan', 'depocleanique-custom' ),
        'date'                   => $columns['date'],
    ];
}
add_filter( 'manage_partnership_posts_columns', 'dc_partnership_admin_columns' );

function dc_render_partnership_admin_column( $column, $post_id ) {
    if ( 'thumbnail' === $column ) {
        echo has_post_thumbnail( $post_id ) ? get_the_post_thumbnail( $post_id, [ 56, 56 ] ) : '&mdash;';
    } elseif ( 'partnership_location' === $column ) {
        echo esc_html( dc_get_partnership_meta( $post_id, '_partnership_location', '-' ) );
    } elseif ( 'partnership_type' === $column ) {
        echo esc_html( dc_get_partnership_types_label( $post_id ) ?: '-' );
    } elseif ( 'partnership_badge' === $column ) {
        echo esc_html( dc_get_partnership_meta( $post_id, '_partnership_badge', '-' ) );
    } elseif ( 'partnership_featured' === $column ) {
        echo dc_is_partnership_featured( $post_id ) ? esc_html__( 'Ya', 'depocleanique-custom' ) : esc_html__( 'Tidak', 'depocleanique-custom' );
    } elseif ( 'menu_order' === $column ) {
        echo esc_html( get_post_field( 'menu_order', $post_id ) );
    }
}
add_action( 'manage_partnership_posts_custom_column', 'dc_render_partnership_admin_column', 10, 2 );

function dc_partnership_sortable_columns( $columns ) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-partnership_sortable_columns', 'dc_partnership_sortable_columns' );

function dc_partnership_archive_query( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( $query->is_post_type_archive( 'partnership' ) || $query->is_tax( 'partnership_type' ) ) {
        $query->set( 'posts_per_page', 12 );
        $query->set(
            'meta_query',
            [
                'relation'        => 'OR',
                'featured_exists' => [
                    'key'     => '_partnership_featured',
                    'compare' => 'EXISTS',
                ],
                'featured_missing' => [
                    'key'     => '_partnership_featured',
                    'compare' => 'NOT EXISTS',
                ],
            ]
        );
        $query->set(
            'orderby',
            [
                'featured_exists' => 'DESC',
                'menu_order'      => 'ASC',
                'date'            => 'DESC',
            ]
        );
    }
}
add_action( 'pre_get_posts', 'dc_partnership_archive_query' );
