<?php
/**
 * Section: Partnership Flow
 * Alur cara bergabung menjadi mitra Depo Cleanique — 4 langkah.
 * Anchor: id="kemitraan"
 */

// TODO: Placeholder — ganti dengan konten final.

$steps = [
    [
        'num'   => '01',
        'title' => 'Hubungi Kami',
        'desc'  => 'Kirim pesan WhatsApp atau hubungi kami. Tim kami siap menjawab pertanyaan Anda.',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>',
    ],
    [
        'num'   => '02',
        'title' => 'Konsultasi & Pilih Paket',
        'desc'  => 'Diskusikan kebutuhan Anda bersama tim kami dan pilih paket kemitraan yang paling sesuai.',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>',
    ],
    [
        'num'   => '03',
        'title' => 'Proses & Setup',
        'desc'  => 'Lakukan pembayaran, terima produk dan perlengkapan, ikuti training orientasi mitra.',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>',
    ],
    [
        'num'   => '04',
        'title' => 'Mulai & Berkembang',
        'desc'  => 'Buka usaha, mulai berjualan, dan nikmati keuntungan bersama support penuh dari tim kami.',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>',
    ],
];
?>

<section id="kemitraan" class="bg-teal-900 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-14">
            <span class="inline-block bg-teal-800 text-teal-300 text-xs font-semibold px-3 py-1.5 rounded-full mb-4 tracking-wide">
                Alur Kemitraan
            </span>
            <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">Cara Bergabung Sangat Mudah</h2>
            <p class="text-teal-300 max-w-xl mx-auto text-sm leading-relaxed">
                Hanya 4 langkah sederhana untuk memulai usaha depo sabun curah bersama Depo Cleanique.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <?php foreach ( $steps as $i => $step ) : ?>
            <div class="relative bg-teal-800/50 border border-teal-700/50 rounded-2xl p-6 text-center">
                <!-- Connector line (desktop) -->
                <?php if ( $i < 3 ) : ?>
                    <div class="dc-step-connector" aria-hidden="true"></div>
                <?php endif; ?>

                <div class="w-12 h-12 bg-teal-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <?php echo $step['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </svg>
                </div>
                <span class="inline-block text-teal-400 text-xs font-bold mb-2 tracking-widest"><?php echo esc_html( $step['num'] ); ?></span>
                <h3 class="font-bold text-white mb-2 text-sm"><?php echo esc_html( $step['title'] ); ?></h3>
                <p class="text-teal-300 text-xs leading-relaxed"><?php echo esc_html( $step['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <a href="<?php echo esc_url( dc_get_wa_url( 'partnership' ) ); ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="inline-flex items-center gap-2.5 bg-white hover:bg-gray-50 text-teal-700 px-7 py-3.5 rounded-xl font-bold text-sm transition-colors shadow-lg"
               aria-label="<?php esc_attr_e( 'Daftar menjadi mitra via WhatsApp', 'depocleanique-custom' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Daftar Sebagai Mitra Sekarang
            </a>
        </div>

    </div>
</section>
