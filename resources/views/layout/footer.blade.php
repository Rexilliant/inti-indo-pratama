{{-- Footer Premium --}}
<footer
    class="w-full bg-gradient-to-br from-[#022C22] via-[#059669] to-[#022C22] text-white pt-20 pb-10 border-t-2 border-[#10B981]">
    <div class="mx-auto max-w-screen-xl px-6 lg:px-8">

        {{-- Menggunakan Grid 5 Kolom di Layar Besar (Kolom Brand memakan 2 space) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8 mb-16">

            {{-- Kolom 1: Logo & Brand (Lebih Lebar - col-span-2) --}}
            <div class="lg:col-span-2 flex flex-col gap-6 lg:pr-8">
                <img src="{{ asset('assets_img/logo.png') }}" alt="Logo PT Grace Indo Pratama" class="w-40 drop-shadow-xl">

                <div>
                    <h3 class="text-xl font-bold tracking-wide text-white">PT Grace Indo Pratama</h3>
                    <p class="text-sm text-green-100/80 mt-3 leading-relaxed max-w-md">
                        Berkomitmen untuk menjadi mitra terpercaya dalam mendukung sektor pertanian modern dan teknologi
                        agrikultur di Indonesia.
                    </p>
                </div>

                <div class="flex items-start gap-3 text-sm text-green-100/80 mt-2">
                    {{-- Icon Map Pin --}}
                    <svg class="w-5 h-5 shrink-0 text-green-400 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="leading-relaxed">
                        Jl. Pembangunan, Kec. Sunggal,<br>
                        Kab. Deli Serdang, Sumatera Utara<br>
                        Kode Pos: 20351
                    </p>
                </div>
            </div>

            {{-- Kolom 2: Produk --}}
            <div class="flex flex-col gap-5">
                <h4 class="font-semibold text-green-400 uppercase tracking-wider text-sm">Produk</h4>
                <ul class="flex flex-col gap-3 text-sm text-green-100/80 font-medium">
                    <li>
                        <a href="#"
                            class="inline-flex items-center hover:text-white hover:translate-x-1 transition-all duration-300">
                            BHOS Teknologi
                        </a>
                    </li>
                    {{-- Tambahkan list produk lain di sini jika ada --}}
                </ul>
            </div>

            {{-- Kolom 3: Informasi --}}
            <div class="flex flex-col gap-5">
                <h4 class="font-semibold text-green-400 uppercase tracking-wider text-sm">Perusahaan</h4>
                <ul class="flex flex-col gap-3 text-sm text-green-100/80 font-medium">
                    <li>
                        <a href="{{ route('about_us.index') ?? '#' }}"
                            class="inline-flex items-center hover:text-white hover:translate-x-1 transition-all duration-300">Tentang
                            Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') ?? '#' }}"
                            class="inline-flex items-center hover:text-white hover:translate-x-1 transition-all duration-300">Berita
                            & Update</a>
                    </li>
                    <li>
                        <a href="{{ route('faqs.index') ?? '#' }}"
                            class="inline-flex items-center hover:text-white hover:translate-x-1 transition-all duration-300">FAQ
                            Pusat Bantuan</a>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Kontak --}}
            <div class="flex flex-col gap-5">
                <h4 class="font-semibold text-green-400 uppercase tracking-wider text-sm">Hubungi Kami</h4>
                <ul class="flex flex-col gap-4 text-sm text-green-100/80">
                    {{-- Telepon --}}
                    <li>
                        <a href="tel:+6282200000000"
                            class="flex items-center gap-3 hover:text-white transition-colors group">
                            <div class="p-2 bg-white/10 rounded-lg group-hover:bg-green-500 transition-colors">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <span>(+62) 822-xxxx-xxxx</span>
                        </a>
                    </li>
                    {{-- Email --}}
                    <li>
                        <a href="mailto:info@bhosteknologi.com"
                            class="flex items-center gap-3 hover:text-white transition-colors group">
                            <div class="p-2 bg-white/10 rounded-lg group-hover:bg-green-500 transition-colors">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <span>info@bhosteknologi.com</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Garis Pembatas & Bottom Bar --}}
        <div class="border-t border-green-800/60 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-green-200/70 text-center md:text-left">
                &copy; {{ date('Y') }} PT Grace Indo Pratama. All rights reserved.
            </p>

            {{-- Legal Links --}}
            <div class="flex items-center gap-6 text-sm text-green-200/70">
                <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
            </div>
        </div>

    </div>
</footer>
