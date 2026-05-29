@extends('layout.master')

@section('content')
    {{-- Tambahkan style ini di file CSS utamamu atau letakkan di dalam block @push('styles') --}}
    <style>
        /* Menyembunyikan scrollbar tapi tetap bisa di-scroll dengan jari */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    {{-- hero banner (mobile + ipad aman) --}}
    <div class="relative flex min-h-[500px] w-full items-center bg-gray-900 bg-cover bg-center bg-no-repeat md:min-h-[600px]"
        style="background-image: url('https://images.unsplash.com/photo-1592982537447-7440770cbfc9?q=80&w=2069&auto=format&fit=crop');">

        {{-- overlay gelap --}}
        <div class="absolute inset-0 bg-black/20"></div>

        <section class="mx-auto max-w-screen-xl p-4 md:p-5 relative z-10 w-full">

            {{-- title --}}
            <h1
                class="max-w-4xl text-4xl font-black leading-tight drop-shadow-[4px_4px_2px_rgba(0,0,0,0.06)] sm:text-5xl lg:text-6xl">
                <span class="text-[#FAFAFA]">Revolusi</span>
                <span
                    class="bg-gradient-to-r from-[#046910] from-0% via-[#08CF1F] via-38% to-[#08CF1F] bg-clip-text text-transparent">
                    Pupuk Nano
                </span><br>
                <span class="text-[#FAFAFA]">untuk</span>
                <span
                    class="bg-gradient-to-r from-[#046910] from-0% via-[#08CF1F] via-38% to-[#08CF1F] bg-clip-text text-transparent">
                    Hasil Panen Maksimal
                </span>
            </h1>

            {{-- subtitle --}}
            <p class="mt-4 sm:mt-5 max-w-4xl text-base sm:text-lg md:text-xl font-extrabold text-[#FAFAFA] leading-relaxed">
                Teknologi nano terbaru yang meningkatkan penyerapan nutrisi secara signifikan, membantu tanaman tumbuh lebih
                sehat, lebih cepat, dan lebih produktif.
            </p>

        </section>
    </div>

    {{-- tentang kami (mobile + ipad aman) --}}
    <div class="w-full bg-[#EEFBF5] py-10 md:py-16">

        <section class="mx-auto max-w-screen-xl p-4 md:p-5">
            <div class="flex flex-col-reverse lg:grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-16 items-center">

                {{-- content left --}}
                <div class="flex w-full flex-col gap-4 sm:gap-6">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl">
                        <span class="font-bold text-[#047857]">Tentang</span>
                        <span class="font-bold text-black">Kami</span>
                    </h2>

                    {{-- description --}}
                    <div class="space-y-3 sm:space-y-4 text-sm sm:text-base font-medium text-[#444545] leading-relaxed">
                        <p>
                            <span class="italic">PT Grace Indo Pratama</span> merupakan perusahaan yang bergerak di bidang
                            pupuk kimia dengan fokus pada pengembangan teknologi nano. Melalui inovasi yang berkelanjutan,
                            kami menghadirkan produk yang dirancang untuk meningkatkan efisiensi penyerapan unsur hara dan
                            mendukung produktivitas pertanian secara optimal.
                        </p>
                        <p>
                            Kami hadir untuk menjadi mitra terpercaya dalam menghadirkan solusi nutrisi tanaman yang modern,
                            efektif, dan relevan dengan kebutuhan pertanian masa kini.
                        </p>
                    </div>

                    {{-- action button --}}
                    <a href="#"
                        class="mt-2 inline-flex w-max items-center gap-2 text-sm sm:text-base font-semibold text-[#0045B4] transition hover:opacity-80">
                        Lihat Selengkapnya
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>

                {{-- image right --}}
                <div class="w-full">
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070&auto=format&fit=crop"
                        alt="Fasilitas Pabrik"
                        class="h-auto w-full rounded-[1.5rem] sm:rounded-[2rem] object-cover shadow-xl">
                </div>

            </div>
        </section>
    </div>

    {{-- section produk kami --}}
    <div class="w-full bg-[#EEFBF5] pb-10 md:pb-16">

        <section class="mx-auto max-w-screen-xl p-4 md:p-5 overflow-hidden">

            {{-- header section --}}
            <div class="text-center mb-8 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl mb-3">
                    <span class="font-bold text-[#047857]">Produk</span>
                    <span class="font-bold text-black">Kami</span>
                </h2>
                <p class="text-sm sm:text-base font-medium text-[#444545] leading-relaxed">
                    Jangan bingung memilih pupuk!<br class="hidden sm:block">
                    Cek rekomendasi BHOS Teknologi
                </p>
            </div>

            {{-- 
                Container Slider & Grid:
                - Mobile/iPad (flex): overflow-x-auto, snap-x (bisa digeser)
                - Desktop (lg:grid): grid 3 kolom, mematikan fungsi slider
            --}}
            <div
                class="flex gap-5 overflow-x-auto snap-x snap-mandatory pb-6 hide-scrollbar lg:grid lg:grid-cols-3 lg:gap-8 lg:overflow-visible lg:pb-0">

                {{-- Loop simulasi produk --}}
                @for ($i = 0; $i < 6; $i++)
                    {{-- 
                        Card Item:
                        - Mobile: lebar 85% dari layar, posisi snap di tengah
                        - iPad: lebar 45% dari layar
                        - Desktop: lebar otomatis mengikuti grid (w-auto)
                    --}}
                    <div
                        class="flex flex-col bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-sm transition-all hover:shadow-md 
                                w-[85%] shrink-0 snap-center sm:w-[45%] lg:w-auto lg:shrink lg:snap-align-none">

                        {{-- gambar produk --}}
                        <div class="w-full bg-gray-100 relative pt-[75%]">
                            <img src="https://images.unsplash.com/photo-1628352081506-83c43123ed6d?q=80&w=800&auto=format&fit=crop"
                                alt="Produk Pupuk" class="absolute inset-0 w-full h-full object-cover">
                        </div>

                        {{-- detail produk --}}
                        <div class="p-5 sm:p-6 flex flex-col justify-between flex-grow gap-2">
                            <h3 class="text-lg font-bold text-gray-900">BHOS Teknologi</h3>

                            <a href="#"
                                class="inline-flex w-max items-center gap-1 text-sm font-semibold text-[#EA580C] transition hover:opacity-80">
                                Baca Selengkapnya
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endfor

            </div>

            {{-- tombol view more --}}
            <div class="mt-8 lg:mt-12 flex justify-center">
                <a href="#"
                    class="inline-flex items-center justify-center rounded-lg bg-[#EA580C] px-8 py-3 text-sm sm:text-base font-semibold text-white shadow-md transition hover:bg-[#c24106] focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:ring-offset-2 focus:ring-offset-[#EEFBF5]">
                    View More
                </a>
            </div>

        </section>
    </div>

    {{-- section berita & update (mobile + ipad aman, slider aktif) --}}
    <div class="w-full bg-[#EEFBF5] pb-10 md:pb-16">

        <section class="mx-auto max-w-screen-xl p-4 md:p-5 overflow-hidden">

            {{-- header section --}}
            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl mb-4">
                    <span class="font-bold text-[#047857]">Berita & Update</span>
                    <span class="font-bold text-black">Terbaru BHOS Teknologi</span>
                </h2>
                {{-- max-w-4xl dan mx-auto memastikan teks panjang tetap rapi di tengah --}}
                <p class="mx-auto max-w-4xl text-sm sm:text-base font-medium text-[#444545] leading-relaxed px-4">
                    Ikuti berbagai informasi terbaru seputar inovasi produk, kegiatan lapangan, kolaborasi, serta komitmen
                    BHOS Teknologi dalam mendukung pertanian yang lebih produktif dan berkelanjutan.
                </p>
            </div>

            {{-- grid & slider berita --}}
            <div
                class="flex gap-5 overflow-x-auto snap-x snap-mandatory pb-6 hide-scrollbar lg:grid lg:grid-cols-3 lg:gap-8 lg:overflow-visible lg:pb-0">

                {{-- Loop simulasi 6 berita --}}
                @for ($i = 0; $i < 6; $i++)
                    <div
                        class="flex flex-col bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-sm transition-all hover:shadow-md 
                                w-[85%] shrink-0 snap-center sm:w-[45%] lg:w-auto lg:shrink lg:snap-align-none cursor-pointer group">

                        {{-- gambar berita --}}
                        <div class="w-full bg-gray-100 relative pt-[65%] overflow-hidden">
                            {{-- Efek zoom tipis saat card di-hover (opsional, untuk UX yang lebih baik) --}}
                            <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?q=80&w=800&auto=format&fit=crop"
                                alt="Berita BHOS Teknologi"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>

                        {{-- detail berita --}}
                        <div class="p-5 sm:p-6 flex flex-col flex-grow gap-2 sm:gap-3">
                            {{-- tanggal rilis --}}
                            <span class="text-xs sm:text-sm font-medium text-gray-500">
                                01 Januari 2025
                            </span>

                            {{-- judul berita --}}
                            <h3
                                class="text-base sm:text-lg font-bold text-gray-900 leading-snug group-hover:text-[#047857] transition-colors">
                                Inovasi Pupuk BHOS Teknologi Dorong Transformasi Pertanian Modern
                            </h3>
                        </div>
                    </div>
                @endfor

            </div>

            {{-- tombol view more --}}
            <div class="mt-8 lg:mt-14 flex justify-center">
                <a href="#"
                    class="inline-flex items-center justify-center rounded-lg bg-[#EA580C] px-8 py-3 text-sm sm:text-base font-semibold text-white shadow-md transition hover:bg-[#c24106] focus:outline-none focus:ring-2 focus:ring-[#EA580C] focus:ring-offset-2 focus:ring-offset-[#EEFBF5]">
                    View More
                </a>
            </div>

        </section>
    </div>

    {{-- section faq (statis, lebar mengikuti max-w-screen-xl) --}}
    <div class="w-full bg-[#EEFBF5] pb-10 md:pb-16">

        {{-- Section menggunakan max-w-screen-xl untuk konsistensi lebar di desktop --}}
        <section class="mx-auto max-w-screen-xl p-4 md:p-5">

            {{-- header faq --}}
            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                    Kamu Punya Pertanyaan?
                </h2>
                <p class="text-sm sm:text-base font-medium text-[#444545]">
                    Sambil mikir-mikir, mungkin kamu juga perlu membaca beberapa<br class="hidden sm:block">
                    FAQ seputar BHOS Teknologi?
                </p>
            </div>

            {{-- FAQ Container sekarang menggunakan lebar penuh section --}}
            <div class="space-y-4">

                {{-- faq item --}}
                <details
                    class="group bg-white border border-gray-200 rounded-xl p-2 transition-all duration-300 open:shadow-lg">
                    <summary
                        class="flex items-center justify-between font-semibold text-gray-800 cursor-pointer p-4 select-none">
                        <span>Apa Itu BHOS Teknologi</span>
                        <svg class="w-5 h-5 text-[#EA580C] transition-transform group-open:rotate-180" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </summary>
                    <div class="px-4 pb-4 text-sm sm:text-base text-gray-600 leading-relaxed">
                        BHOS Teknologi adalah perusahaan inovasi di bidang pertanian yang berfokus pada teknologi nano untuk meningkatkan produktivitas hasil panen secara maksimal.
                    </div>
                </details>

                <details
                    class="group bg-white border border-gray-200 rounded-xl p-2 transition-all duration-300 open:shadow-lg">
                    <summary
                        class="flex items-center justify-between font-semibold text-gray-800 cursor-pointer p-4 select-none">
                        <span>Apa yang membuat BHOS Teknologi berbeda?</span>
                        <svg class="w-5 h-5 text-[#EA580C] transition-transform group-open:rotate-180" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </summary>
                    <div class="px-4 pb-4 text-sm sm:text-base text-gray-600 leading-relaxed">
                        Kami menggabungkan riset mendalam teknologi nano dengan kebutuhan praktis petani di lapangan,
                        memastikan efisiensi penyerapan nutrisi yang jauh lebih tinggi dibanding pupuk konvensional.
                    </div>
                </details>

                <details
                    class="group bg-white border border-gray-200 rounded-xl p-2 transition-all duration-300 open:shadow-lg">
                    <summary
                        class="flex items-center justify-between font-semibold text-gray-800 cursor-pointer p-4 select-none">
                        <span>Bagaimana cara memesan produk BHOS Teknologi</span>
                        <svg class="w-5 h-5 text-[#EA580C] transition-transform group-open:rotate-180" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </summary>
                    <div class="px-4 pb-4 text-sm sm:text-base text-gray-600 leading-relaxed">
                        Anda dapat memesan melalui formulir kontak di website kami, menghubungi layanan pelanggan via
                        WhatsApp, atau melalui distributor resmi yang tersebar di wilayah Anda.
                    </div>
                </details>

            </div>
        </section>
    </div>

    {{-- section testimoni --}}
    <div class="w-full bg-[#EEFBF5] pb-10 md:pb-16 overflow-hidden">

        <section class="mx-auto max-w-screen-xl p-4 md:p-5 mb-10">
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                    Apa Kata Mereka tentang BHOS Teknologi
                </h2>
                <p class="text-sm sm:text-base font-medium text-[#444545]">
                    Langkah Nyata Menuju Pertanian Lebih Produktif
                </p>
            </div>
        </section>

        {{-- Container Animasi --}}
        <div class="flex overflow-hidden relative">
            <div class="flex animate-marquee gap-6 px-4">
                {{-- Kita looping card-nya --}}
                @for ($i = 0; $i < 6; $i++)
                    <div
                        class="flex-none w-[300px] sm:w-[400px] bg-white border border-gray-200 rounded-3xl p-6 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://ui-avatars.com/api/?name=Bambang+Pratama&background=random" alt="Avatar"
                                class="w-14 h-14 rounded-full">
                            <div>
                                <h4 class="font-bold text-[#047857]">Bambang Pratama Putra</h4>
                                <p class="text-sm text-gray-500">Pekanbaru</p>
                            </div>
                        </div>
                        <p class="text-sm sm:text-base text-[#444545] leading-relaxed">
                            Sejak menggunakan pupuk dari BHOS Teknologi, hasil panen kami meningkat dan kualitas tanah tetap
                            terjaga. Tanaman tumbuh lebih sehat dan merata.
                        </p>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    {{-- CSS untuk Animasi --}}
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            display: flex;
            animation: marquee 20s linear infinite;
        }

        /* Jeda sedikit saat hover */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
@endsection
