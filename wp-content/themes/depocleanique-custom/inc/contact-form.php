<?php
/**
 * Contact form — penyimpanan pesan + notifikasi admin (tanpa plugin).
 *
 * Alur:
 * 1. Form di halaman Kontak POST ke admin-post.php (action: dc_contact).
 * 2. Handler memvalidasi nonce + honeypot, lalu menyimpan pesan sebagai
 *    CPT "dc_message" dan mengirim email ke admin.
 * 3. Redirect kembali ke halaman Kontak dengan status (?dc_status=...).
 *
 * Pesan masuk tampil di dashboard: menu "Pesan Masuk" dengan badge jumlah
 * pesan yang belum dibaca (mirip indikator komentar tertunda).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ─── Custom Post Type: Pesan Masuk ──────────────────── */

function dc_register_message_cpt() {
    register_post_type(
        'dc_message',
        [
            'labels'             => [
                'name'               => __( 'Pesan Masuk', 'depocleanique-custom' ),
                'singular_name'      => __( 'Pesan', 'depocleanique-custom' ),
                'menu_name'          => __( 'Pesan Masuk', 'depocleanique-custom' ),
                'all_items'          => __( 'Semua Pesan', 'depocleanique-custom' ),
                'edit_item'          => __( 'Lihat Pesan', 'depocleanique-custom' ),
                'view_item'          => __( 'Lihat Pesan', 'depocleanique-custom' ),
                'search_items'       => __( 'Cari Pesan', 'depocleanique-custom' ),
                'not_found'          => __( 'Belum ada pesan masuk.', 'depocleanique-custom' ),
                'not_found_in_trash' => __( 'Tidak ada pesan di sampah.', 'depocleanique-custom' ),
            ],
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => false,
            'publicly_queryable' => false,
            'exclude_from_search'=> true,
            'has_archive'        => false,
            'rewrite'            => false,
            'menu_icon'          => 'dashicons-email-alt',
            'menu_position'      => 25,
            'supports'           => [ 'title', 'editor' ],
            'capability_type'    => 'post',
            'map_meta_cap'       => true,
            // Pesan dibuat lewat form publik, bukan dari dashboard.
            'capabilities'       => [
                'create_posts' => 'do_not_allow',
            ],
        ]
    );
}
add_action( 'init', 'dc_register_message_cpt' );


/* ─── Pemrosesan submission ──────────────────────────── */

/**
 * Redirect kembali ke halaman Kontak dengan status tertentu.
 *
 * @param string $status sent | invalid | error
 */
function dc_contact_redirect( $status ) {
    $url = wp_get_referer();

    if ( ! $url ) {
        $url = home_url( '/kontak/' );
    }

    $url = remove_query_arg( 'dc_status', $url );
    $url = add_query_arg( 'dc_status', $status, $url );

    wp_safe_redirect( $url . '#kontak-form' );
    exit;
}

function dc_handle_contact_submission() {
    // 1. Nonce (anti-CSRF).
    if (
        ! isset( $_POST['dc_contact_nonce'] )
        || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dc_contact_nonce'] ) ), 'dc_contact_submit' )
    ) {
        dc_contact_redirect( 'error' );
    }

    // 2. Honeypot — bila terisi, kemungkinan bot. Pura-pura sukses.
    if ( ! empty( $_POST['dc_website'] ) ) {
        dc_contact_redirect( 'sent' );
    }

    // 3. Ambil & sanitasi input.
    $name    = isset( $_POST['dc_name'] ) ? sanitize_text_field( wp_unslash( $_POST['dc_name'] ) ) : '';
    $email   = isset( $_POST['dc_email'] ) ? sanitize_email( wp_unslash( $_POST['dc_email'] ) ) : '';
    $phone   = isset( $_POST['dc_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['dc_phone'] ) ) : '';
    $message = isset( $_POST['dc_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['dc_message'] ) ) : '';

    // 4. Validasi minimal.
    if ( '' === $name || '' === $message || ! is_email( $email ) ) {
        dc_contact_redirect( 'invalid' );
    }

    // 5. Simpan sebagai pesan.
    $post_id = wp_insert_post(
        [
            'post_type'   => 'dc_message',
            'post_status' => 'publish',
            'post_title'  => $name . ' — ' . wp_trim_words( $message, 8, '…' ),
            'post_content'=> $message,
        ],
        true
    );

    if ( is_wp_error( $post_id ) || ! $post_id ) {
        dc_contact_redirect( 'error' );
    }

    update_post_meta( $post_id, '_dc_msg_name', $name );
    update_post_meta( $post_id, '_dc_msg_email', $email );
    update_post_meta( $post_id, '_dc_msg_phone', $phone );
    update_post_meta( $post_id, '_dc_msg_read', '0' );

    // 6. Notifikasi email ke admin.
    $admin_email = get_option( 'admin_email' );
    $subject     = sprintf(
        /* translators: 1: nama pengirim, 2: nama situs */
        __( 'Pesan baru dari %1$s — %2$s', 'depocleanique-custom' ),
        $name,
        get_bloginfo( 'name' )
    );
    $body_lines = [
        __( 'Anda menerima pesan baru dari formulir kontak website.', 'depocleanique-custom' ),
        '',
        __( 'Nama   : ', 'depocleanique-custom' ) . $name,
        __( 'Email  : ', 'depocleanique-custom' ) . $email,
        __( 'Telepon: ', 'depocleanique-custom' ) . ( $phone ? $phone : '-' ),
        '',
        __( 'Pesan:', 'depocleanique-custom' ),
        $message,
        '',
        __( 'Buka di dashboard: ', 'depocleanique-custom' ) . get_edit_post_link( $post_id, '' ),
    ];
    $headers = [ 'Content-Type: text/plain; charset=UTF-8' ];
    $headers[] = sprintf( 'Reply-To: %s <%s>', $name, $email );

    wp_mail( $admin_email, $subject, implode( "\n", $body_lines ), $headers );

    dc_contact_redirect( 'sent' );
}
add_action( 'admin_post_nopriv_dc_contact', 'dc_handle_contact_submission' );
add_action( 'admin_post_dc_contact', 'dc_handle_contact_submission' );


/* ─── Render form (dipakai di page-kontak.php) ───────── */

function dc_contact_form_render() {
    $status = isset( $_GET['dc_status'] ) ? sanitize_key( wp_unslash( $_GET['dc_status'] ) ) : '';
    ?>
    <div class="dc-contact-form-card" id="kontak-form">
        <h2 class="dc-contact-form-title"><?php esc_html_e( 'Kirim Pesan', 'depocleanique-custom' ); ?></h2>
        <p class="dc-contact-form-intro"><?php esc_html_e( 'Tinggalkan pesan Anda, tim kami akan segera menghubungi balik.', 'depocleanique-custom' ); ?></p>

        <?php if ( 'sent' === $status ) : ?>
            <div class="dc-form-alert dc-form-alert-success" role="status">
                <span class="material-symbols-outlined" aria-hidden="true">check_circle</span>
                <span><?php esc_html_e( 'Terima kasih! Pesan Anda sudah terkirim dan akan kami balas secepatnya.', 'depocleanique-custom' ); ?></span>
            </div>
        <?php elseif ( 'invalid' === $status ) : ?>
            <div class="dc-form-alert dc-form-alert-error" role="alert">
                <span class="material-symbols-outlined" aria-hidden="true">error</span>
                <span><?php esc_html_e( 'Mohon lengkapi nama, email yang valid, dan pesan Anda.', 'depocleanique-custom' ); ?></span>
            </div>
        <?php elseif ( '' !== $status ) : ?>
            <div class="dc-form-alert dc-form-alert-error" role="alert">
                <span class="material-symbols-outlined" aria-hidden="true">error</span>
                <span><?php esc_html_e( 'Maaf, pesan gagal dikirim. Silakan coba lagi atau hubungi kami via WhatsApp.', 'depocleanique-custom' ); ?></span>
            </div>
        <?php endif; ?>

        <form class="dc-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="dc_contact">
            <?php wp_nonce_field( 'dc_contact_submit', 'dc_contact_nonce' ); ?>

            <?php /* Honeypot — disembunyikan via CSS, hanya diisi bot. */ ?>
            <div class="dc-form-hp" aria-hidden="true">
                <label><?php esc_html_e( 'Website', 'depocleanique-custom' ); ?>
                    <input type="text" name="dc_website" tabindex="-1" autocomplete="off">
                </label>
            </div>

            <div class="dc-form-grid">
                <div class="dc-form-row">
                    <label for="dc-name"><?php esc_html_e( 'Nama lengkap', 'depocleanique-custom' ); ?> <span aria-hidden="true">*</span></label>
                    <input id="dc-name" type="text" name="dc_name" required maxlength="120" placeholder="<?php esc_attr_e( 'Nama Anda', 'depocleanique-custom' ); ?>">
                </div>
                <div class="dc-form-row">
                    <label for="dc-phone"><?php esc_html_e( 'Nomor WhatsApp', 'depocleanique-custom' ); ?></label>
                    <input id="dc-phone" type="text" name="dc_phone" maxlength="40" placeholder="08xx-xxxx-xxxx">
                </div>
            </div>

            <div class="dc-form-row">
                <label for="dc-email"><?php esc_html_e( 'Email', 'depocleanique-custom' ); ?> <span aria-hidden="true">*</span></label>
                <input id="dc-email" type="email" name="dc_email" required maxlength="160" placeholder="email@domain.com">
            </div>

            <div class="dc-form-row">
                <label for="dc-message"><?php esc_html_e( 'Pesan', 'depocleanique-custom' ); ?> <span aria-hidden="true">*</span></label>
                <textarea id="dc-message" name="dc_message" rows="5" required maxlength="3000" placeholder="<?php esc_attr_e( 'Tulis kebutuhan atau pertanyaan Anda…', 'depocleanique-custom' ); ?>"></textarea>
            </div>

            <button type="submit" class="dc-contact-form-submit">
                <span><?php esc_html_e( 'Kirim Pesan', 'depocleanique-custom' ); ?></span>
                <span class="material-symbols-outlined" aria-hidden="true">send</span>
            </button>
        </form>
    </div>
    <?php
}


/* ─── Admin: kolom daftar, tandai dibaca, badge menu ─── */

function dc_message_admin_columns( $columns ) {
    return [
        'cb'         => $columns['cb'],
        'title'      => __( 'Pengirim', 'depocleanique-custom' ),
        'dc_email'   => __( 'Email', 'depocleanique-custom' ),
        'dc_phone'   => __( 'WhatsApp', 'depocleanique-custom' ),
        'dc_status'  => __( 'Status', 'depocleanique-custom' ),
        'date'       => __( 'Diterima', 'depocleanique-custom' ),
    ];
}
add_filter( 'manage_dc_message_posts_columns', 'dc_message_admin_columns' );

function dc_message_admin_column_content( $column, $post_id ) {
    if ( 'dc_email' === $column ) {
        $email = get_post_meta( $post_id, '_dc_msg_email', true );
        echo $email ? '<a href="' . esc_url( 'mailto:' . $email ) . '">' . esc_html( $email ) . '</a>' : '&mdash;';
    } elseif ( 'dc_phone' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_dc_msg_phone', true ) ?: '—' );
    } elseif ( 'dc_status' === $column ) {
        $read = '1' === (string) get_post_meta( $post_id, '_dc_msg_read', true );
        if ( $read ) {
            echo '<span style="color:#646970;">' . esc_html__( 'Dibaca', 'depocleanique-custom' ) . '</span>';
        } else {
            echo '<strong style="color:#0b7edb;">' . esc_html__( '● Baru', 'depocleanique-custom' ) . '</strong>';
        }
    }
}
add_action( 'manage_dc_message_posts_custom_column', 'dc_message_admin_column_content', 10, 2 );

/**
 * Tandai pesan sebagai dibaca saat dibuka di dashboard.
 */
function dc_message_mark_read() {
    if ( ! isset( $_GET['post'] ) ) {
        return;
    }

    $post_id = absint( $_GET['post'] );

    if ( $post_id && 'dc_message' === get_post_type( $post_id ) && current_user_can( 'edit_post', $post_id ) ) {
        update_post_meta( $post_id, '_dc_msg_read', '1' );
    }
}
add_action( 'load-post.php', 'dc_message_mark_read' );

/**
 * Hitung jumlah pesan yang belum dibaca.
 */
function dc_count_unread_messages() {
    $ids = get_posts(
        [
            'post_type'      => 'dc_message',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'no_found_rows'  => true,
            'meta_query'     => [
                [
                    'key'   => '_dc_msg_read',
                    'value' => '0',
                ],
            ],
        ]
    );

    return count( $ids );
}

/**
 * Badge jumlah pesan baru di samping menu "Pesan Masuk".
 */
function dc_message_menu_badge() {
    global $menu;

    $unread = dc_count_unread_messages();

    if ( ! $unread ) {
        return;
    }

    foreach ( $menu as $key => $item ) {
        if ( isset( $item[2] ) && 'edit.php?post_type=dc_message' === $item[2] ) {
            $menu[ $key ][0] .= sprintf(
                ' <span class="awaiting-mod"><span class="pending-count">%d</span></span>',
                $unread
            );
            break;
        }
    }
}
add_action( 'admin_menu', 'dc_message_menu_badge', 999 );
