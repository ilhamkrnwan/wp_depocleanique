<?php
/**
 * Section: FAQ
 * Pertanyaan yang sering ditanyakan — accordion interaktif.
 * Anchor: id="faq"
 * JS accordion dihandle oleh assets/js/main.js (.dc-faq-trigger / .dc-faq-panel)
 */

$faqs = [
    [
        'q' => 'Berapa modal minimum untuk memulai kemitraan Depo Cleanique?',
        'a' => 'Modal minimum dimulai dari Rp 2.500.000 untuk Paket Starter. Dengan modal tersebut Anda sudah mendapatkan 5 jenis produk pilihan, kemasan siap jual, dan materi marketing digital. Modal ini sudah termasuk semua yang dibutuhkan untuk langsung berjualan.',
    ],
    [
        'q' => 'Apakah produk Depo Cleanique sudah terdaftar di BPOM?',
        'a' => 'Ya, semua produk Depo Cleanique telah terdaftar resmi di BPOM (Badan Pengawas Obat dan Makanan) dan memiliki sertifikasi halal. Anda dapat menjual dengan tenang karena produk kami aman untuk seluruh anggota keluarga.',
    ],
    [
        'q' => 'Apakah ada target penjualan yang harus dipenuhi?',
        'a' => 'Tidak ada target penjualan yang diwajibkan. Kami percaya bahwa setiap mitra memiliki ritme bisnis masing-masing. Yang penting Anda menjalankan usaha dengan konsisten dan kami siap mendukung Anda sepanjang perjalanan.',
    ],
    [
        'q' => 'Bagaimana sistem pengiriman restok produk?',
        'a' => 'Anda dapat melakukan pemesanan restok kapan saja melalui WhatsApp. Pengiriman dilakukan dalam 1–3 hari kerja untuk area Jawa, dan 3–7 hari kerja untuk luar Jawa. Stok kami selalu tersedia untuk memastikan usaha Anda tidak terganggu.',
    ],
    [
        'q' => 'Apakah ada wilayah eksklusif untuk setiap mitra?',
        'a' => 'Untuk paket Premium, tersedia opsi wilayah eksklusif dalam radius tertentu berdasarkan kesepakatan. Untuk paket Starter dan Reguler, tidak ada batasan wilayah — Anda bebas berjualan di mana saja.',
    ],
    [
        'q' => 'Bagaimana jika saya tidak memiliki pengalaman bisnis sebelumnya?',
        'a' => 'Tidak masalah sama sekali! Justru banyak mitra sukses kami yang baru pertama kali berbisnis. Kami menyediakan training lengkap, materi marketing siap pakai, dan pendampingan dari tim kami. Anda tidak sendirian dalam perjalanan ini.',
    ],
    [
        'q' => 'Apakah saya bisa menjual secara online?',
        'a' => 'Tentu saja! Banyak mitra kami yang sukses berjualan melalui media sosial, marketplace (Tokopedia, Shopee), dan WhatsApp Business. Kami bahkan menyediakan konten marketing digital yang bisa langsung Anda gunakan untuk berjualan online.',
    ],
];
?>

<section id="faq" class="bg-white py-16 lg:py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-12">
            <span class="dc-section-label">FAQ</span>
            <h2 class="dc-section-title mb-3">Pertanyaan Umum</h2>
            <p class="dc-section-subtitle mx-auto">
                Belum menemukan jawaban yang Anda cari? <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="text-teal-600 hover:underline font-medium">Tanya langsung via WhatsApp</a>.
            </p>
        </div>

        <div class="divide-y divide-gray-100 border border-gray-100 rounded-2xl overflow-hidden">
            <?php foreach ( $faqs as $i => $faq ) : ?>
            <div class="dc-faq-item bg-white">
                <button type="button"
                        class="dc-faq-trigger w-full flex items-start justify-between gap-4 px-6 py-5 text-left text-sm font-semibold text-gray-900 hover:text-teal-600 hover:bg-teal-50 transition-colors"
                        aria-expanded="false"
                        aria-controls="faq-panel-<?php echo esc_attr( $i ); ?>">
                    <span><?php echo esc_html( $faq['q'] ); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="dc-faq-icon w-5 h-5 text-gray-400 mt-0.5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="dc-faq-panel"
                     id="faq-panel-<?php echo esc_attr( $i ); ?>"
                     role="region">
                    <p class="px-6 pb-5 text-sm text-gray-600 leading-relaxed">
                        <?php echo esc_html( $faq['a'] ); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
