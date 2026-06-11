<?php
/**
 * Section: Contact Preview
 * Pratinjau kontak — link ke halaman kontak penuh.
 */

// Data kontak dari helpers — diambil dari Customizer.
?>

<section id="kontak" class="bg-gray-50 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="text-center mb-12">
            <span class="dc-section-label">Hubungi Kami</span>
            <h2 class="dc-section-title mb-3">Ada Pertanyaan?</h2>
            <p class="dc-section-subtitle mx-auto">
                Kami siap membantu. Hubungi kami melalui salah satu kanal di bawah ini.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 max-w-3xl mx-auto">

            <!-- WhatsApp -->
            <a href="<?php echo esc_url( dc_get_wa_url( 'contact' ) ); ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="group bg-white border border-gray-100 hover:border-green-300 hover:shadow-md rounded-2xl p-6 text-center transition-all"
               aria-label="Hubungi via WhatsApp">
                <div class="w-12 h-12 bg-green-100 group-hover:bg-green-200 rounded-xl flex items-center justify-center mx-auto mb-3 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-sm mb-1">WhatsApp</h3>
                <p class="text-xs text-gray-500">+62 812-3456-7890</p>
                <p class="text-xs text-gray-400 mt-0.5">Aktif 08.00–21.00</p>
            </a>

            <!-- Email -->
            <a href="<?php echo esc_url( 'mailto:' . dc_get_email() ); ?>"
               class="group bg-white border border-gray-100 hover:border-teal-300 hover:shadow-md rounded-2xl p-6 text-center transition-all"
               aria-label="Kirim email">
                <div class="w-12 h-12 bg-teal-50 group-hover:bg-teal-100 rounded-xl flex items-center justify-center mx-auto mb-3 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-sm mb-1">Email</h3>
                <p class="text-xs text-gray-500"><?php echo esc_html( dc_get_email() ); ?></p>
                <p class="text-xs text-gray-400 mt-0.5">Balas dalam 1×24 jam</p>
            </a>

            <!-- Halaman Kontak -->
            <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"
               class="group bg-white border border-gray-100 hover:border-teal-300 hover:shadow-md rounded-2xl p-6 text-center transition-all sm:col-span-2 lg:col-span-1"
               aria-label="Kunjungi halaman kontak lengkap">
                <div class="w-12 h-12 bg-gray-100 group-hover:bg-teal-50 rounded-xl flex items-center justify-center mx-auto mb-3 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 group-hover:text-teal-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-sm mb-1">Lokasi & Info Lengkap</h3>
                <p class="text-xs text-gray-500">Lihat alamat, peta,</p>
                <p class="text-xs text-teal-500 mt-0.5 font-medium">dan halaman kontak →</p>
            </a>

        </div>

    </div>
</section>
