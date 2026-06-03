@extends('layout.master')

@section('content')
    {{-- hero banner (mobile + ipad aman) --}}
    <div class="relative flex min-h-[500px] w-full items-center bg-gray-900 bg-cover bg-left bg-no-repeat md:min-h-[700px]"
        style="background-image: url('{{ asset('assets_img/bg-about-us.png') }}');">

        {{-- overlay gelap --}}
        <div class="absolute inset-0 bg-black/20"></div>

        <section class="mx-auto max-w-screen-xl p-4 md:p-5 relative z-10 w-full">

            {{-- title --}}
            <h1
                class="max-w-4xl text-4xl font-black leading-tight drop-shadow-[4px_4px_2px_rgba(0,0,0,0.06)] sm:text-5xl lg:text-6xl">
                <span class="text-[#FAFAFA]">Inovasi</span>
                <span
                    class="bg-gradient-to-r from-[#046910] from-0% via-[#08CF1F] via-38% to-[#08CF1F] bg-clip-text text-transparent">
                    Pupuk Nano
                </span><br>
                <span class="text-[#FAFAFA]">untuk</span>
                <span
                    class="bg-gradient-to-r from-[#046910] from-0% via-[#08CF1F] via-38% to-[#08CF1F] bg-clip-text text-transparent">
                    Pertanian Masa Depan
                </span>
            </h1>

            {{-- subtitle --}}
            <p class="mt-4 sm:mt-5 max-w-4xl text-base sm:text-lg md:text-xl font-extrabold text-[#FAFAFA] leading-relaxed">
                BHOS Teknologi adalah perusahaan Indonesia yang berfokus pada pengembangan pupuk nano inovatif untuk
                membantu petani mendapatkan hasil panen optimal, menjaga kesehatan tanah, dan mewujudkan pertanian
                berkelanjutan
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
                        <span class="font-bold text-[#047857]">
                            Berdedikasi Untuk Petani
                            Bertumbuh Untuk Indonesia
                        </span>

                    </h2>

                    {{-- description --}}
                    <div class="space-y-3 sm:space-y-4 text-sm sm:text-base font-medium text-[#444545] leading-relaxed">
                        <p>
                            Sejak berdiri <span class="italic">PT Grace Indo Pratama</span> berkomitmen mengembangkan
                            teknologi pupuk berbasis nano yang mampu
                            meningkatkan efisiensi penyerapan nutrisi, memperbaiki kesuburuan tanah dan meningkatkan
                            produktivitas tanaman, kami bekerja bersama petani peneliti dan mitra strategis untuk
                            menghadirkan solusi pertanian yang inovatif, aman, dan berkelanjutan
                        </p>
                    </div>
                </div>

                {{-- image right --}}
                <div class="w-full">
                    <img src="{{ asset('assets_img/item-1.jpg') }}"
                        alt="Tanaman Sehat"
                        class="h-auto w-full rounded-[1.5rem] sm:rounded-[2rem] object-cover shadow-xl">
                </div>

            </div>
        </section>
    </div>

    {{-- Section Visi & Misi --}}
    <div class="w-full bg-[#EBFBF3] py-16 md:py-24">
        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

            {{-- Grid Container (1 Kolom di Mobile, 2 Kolom di Desktop) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">

                {{-- Visi --}}
                <div class="flex flex-col">

                    {{-- Header "Visi" bergaya Tab --}}
                    <div class="w-full border-b-[3px] border-[#A7D7C5] mb-6 lg:mb-8 flex">
                        <h3
                            class="bg-[#047857] text-white text-xl md:text-2xl font-bold px-10 py-2.5 rounded-tr-4xl rounded-bl-4xl translate-y-[3px]">
                            Visi
                        </h3>
                    </div>

                    {{-- Konten Visi --}}
                    <p class="text-base sm:text-lg text-gray-700 leading-relaxed pr-0 md:pr-4">
                        Menjadi pemimpin dalam inovasi pupuk nano yang mendukung pertanian produktif, sehat dan
                        berkelanjutan di Indonesia dan dunia
                    </p>
                </div>

                {{-- Misi --}}
                <div class="flex flex-col">

                    {{-- Header "Misi" bergaya Tab --}}
                    <div class="w-full border-b-[3px] border-[#A7D7C5] mb-6 lg:mb-8 flex">
                        <h3
                            class="bg-[#047857] text-white text-xl md:text-2xl font-bold px-10 py-2.5 rounded-tr-4xl rounded-bl-4xl translate-y-[3px]">
                            Misi
                        </h3>
                    </div>

                    {{-- Konten Misi (Unordered List) --}}
                    <ul
                        class="list-disc text-base sm:text-lg text-gray-700 leading-relaxed space-y-3 pl-5 marker:text-gray-500">
                        <li>
                            Mengembangkan teknologi pupuk nano yang efektif dan ramah lingkungan
                        </li>
                        <li>
                            Meningkatkan hasil panen dan pendapatan petani
                        </li>
                        <li>
                            Menjaga dan memperbaiki kesehatan tanah untuk generasi mendatang
                        </li>
                        <li>
                            Memberikan layanan terbaik dan edukasi berkelanjutan bagi petani
                        </li>
                        <li>
                            Berkolaborasi dengan mitra strategis untuk inovasi tanpa henti
                        </li>
                    </ul>
                </div>

            </div>

        </section>
    </div>

    {{-- Keunggulan Teknologi --}}
    <div class="w-full bg-[#F4FDF9] py-16 md:py-24 overflow-hidden">
        <section class="mx-auto max-w-screen-xl px-0 lg:px-8">

            {{-- Header Title --}}
            <div class="text-center mb-10 md:mb-14 flex flex-col items-center gap-3 px-4 sm:px-6 lg:px-0">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Nilai-Nilai</span> Kami
                </h2>
                <p class="text-base sm:text-lg text-gray-600 mt-2">
                    Prinsip yang menjadi dasar setiap langkah inovasi
                </p>
            </div>

            {{-- Grid 5 Kolom (Desktop) & Slider (Mobile/Tablet) --}}
            <div
                class="flex lg:grid lg:grid-cols-5 gap-4 sm:gap-5 lg:gap-6 overflow-x-auto lg:overflow-visible snap-x snap-mandatory px-4 sm:px-6 lg:px-0 pb-8 pt-2 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                {{-- Card 1: Inovasi --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[40%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl p-6 sm:p-5 xl:p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col items-center text-center">
                    <div class="w-20 h-20 mb-5 text-[#047857]">
                        <img src="{{ asset('assets_img/inovasi.png') }}" alt="Inovasi">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Inovasi</h3>
                    <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                        Terus mengembangkan teknologi nano untuk solusi pertanian masa depan
                    </p>
                </div>

                {{-- Card 2: Integritas --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[40%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl p-6 sm:p-5 xl:p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col items-center text-center">
                    <div class="w-20 h-20 mb-5 text-[#047857]">
                        <img src="{{ asset('assets_img/integritas.png') }}" alt="Integritas">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Integritas</h3>
                    <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                        Menjunjung tinggi kejujuran, transparansi, dan komitmen
                    </p>
                </div>

                {{-- Card 3: Kualitas --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[40%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl p-6 sm:p-5 xl:p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col items-center text-center">
                    <div class="w-20 h-20 mb-5 text-[#047857]">
                         <img src="{{ asset('assets_img/kualitas.png') }}" alt="Kualitas">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kualitas</h3>
                    <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                        Produk berkualitas tinggi dengan standar terbaik
                    </p>
                </div>

                {{-- Card 4: Kolaborasi --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[40%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl p-6 sm:p-5 xl:p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col items-center text-center">
                    <div class="w-20 h-20 mb-5 text-[#047857]">
                         <img src="{{ asset('assets_img/kolaborasi.png') }}" alt="kolaborasi">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kolaborasi</h3>
                    <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                        Bersinergi dengan petani, mitra dan ahli untuk hasil berkelanjutan
                    </p>
                </div>

                {{-- Card 5: Keberlanjutan --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[40%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl p-6 sm:p-5 xl:p-6 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col items-center text-center">
                    <div class="w-20 h-20 mb-5 text-[#047857]">
                         <img src="{{ asset('assets_img/keberlanjutan.png') }}" alt="keberlanjutan">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Keberlanjutan</h3>
                    <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                        Peduli lingkungan dan mendukung pertanian yang berkelanjutan
                    </p>
                </div>

            </div>
        </section>
    </div>

    <div class="w-full bg-white py-16 md:py-24 overflow-hidden">
        <section class="mx-auto max-w-screen-xl px-0 lg:px-8">

            {{-- Header Title --}}
            <div class="text-center mb-10 md:mb-14 flex flex-col items-center gap-3 px-4 sm:px-6 lg:px-0">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Keunggulan Teknologi</span> Kami
                </h2>
                <p class="text-base sm:text-lg text-gray-600 mt-2">
                    Dari riset hingga sampai ke tangan petani
                </p>
            </div>

            {{-- Slider (Mobile/Tablet) & Grid 4 (Desktop) --}}
            <div
                class="flex lg:grid lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 overflow-x-auto lg:overflow-visible snap-x snap-mandatory px-4 sm:px-6 lg:px-0 pb-8 pt-2 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                {{-- Card 1: Riset --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col overflow-hidden">
                    <div class="w-full aspect-[4/3] bg-gray-100 relative overflow-hidden group">
                        <img src="{{ asset('assets_img/riset-dan-pengembangan.jpg') }}" alt="Riset dan Pengembangan"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Riset dan Pengembangan</h3>
                        <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                            Riset mendalam untuk menemukan formula nano terbaik yang efektif dan aman bagi tanaman
                        </p>
                    </div>
                </div>

                {{-- Card 2: Formula --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col overflow-hidden">
                    <div class="w-full aspect-[4/3] bg-gray-100 relative overflow-hidden group">
                        <img src="{{ asset('assets_img/formula-presisi.jpg') }}" alt="Formula Presisi"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Formula Presisi</h3>
                        <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                            Teknologi nano memastikan ukuran partikel ultra kecil untuk penyerapan nutrisi yang lebih
                            optimal
                        </p>
                    </div>
                </div>

                {{-- Card 3: Uji Kualitas --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col overflow-hidden">
                    <div class="w-full aspect-[4/3] bg-gray-100 relative overflow-hidden group">
                        <img src="{{ asset('assets_img/uji-kualitas.jpg') }}" alt="Uji Kualitas Ketat"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Uji Kualitas Ketat</h3>
                        <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                            Pengujian berlapis di laboratorium dan lapangan untuk memastikan kualitas dan efektivitas
                        </p>
                    </div>
                </div>

                {{-- Card 4: Distribusi --}}
                <div
                    class="shrink-0 w-[75%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 flex flex-col overflow-hidden">
                    <div class="w-full aspect-[4/3] bg-gray-100 relative overflow-hidden group">
                        <img src="{{ asset('assets_img/distribusi-produk.jpg') }}" alt="Distribusi Produk"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Distribusi Produk</h3>
                        <p class="text-[13px] sm:text-sm text-gray-600 leading-relaxed">
                            Produk sampai ke petani dengan pelayanan terbaik dan pendampingan berkelanjutan
                        </p>
                    </div>
                </div>

            </div>
        </section>
    </div>

    {{-- Perjalanan Kami --}}
    <div class="w-full bg-[#EBFBF3] py-16 md:py-24 overflow-hidden">
        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="text-center mb-14 lg:mb-20 flex flex-col items-center gap-3">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Perjalanan</span> Kami
                </h2>
                <p class="text-base sm:text-lg text-gray-600 mt-2 max-w-2xl">
                    Langkah nyata kami dalam menghadirkan inovasi untuk pertanian indonesia
                </p>
            </div>

            {{-- Timeline Container --}}
            <div class="relative max-w-6xl mx-auto">
                {{-- Garis Penghubung: Vertikal di Mobile, Horizontal di Desktop --}}
                <div
                    class="absolute bg-[#047857] 
                            left-[15px] top-2 w-[2px] h-[calc(100%-2rem)] 
                            lg:left-[10%] lg:right-[10%] lg:w-[80%] lg:top-[15px] lg:h-[2px]">
                </div>

                {{-- Item Timeline --}}
                <div class="flex flex-col lg:flex-row justify-between gap-10 lg:gap-4 relative z-10">

                    @php
                        $timeline = [
                            'BHOS Teknologi mulai didirikan dengan mulai menghadirkan pupuk nano inovatif',
                            'Peluncuran teknologi pupuk nano generasi pertama',
                            'Ekspansi ke berbagai wilayah dan kemitraan strategis',
                            'Pengembangan formula nano generasi terbaru yang lebih efektif',
                            '1000+ petani bergabung dan terus bertumbuh bersama kami',
                        ];
                    @endphp

                    @foreach ($timeline as $text)
                        <div class="flex flex-row lg:flex-col items-start lg:items-center gap-5 lg:gap-4 flex-1 group">
                            {{-- Titik/Dot (Dilapisi border warna background agar menutupi garis) --}}
                            <div
                                class="w-8 h-8 shrink-0 bg-[#047857] rounded-full ring-4 ring-[#EBFBF3] flex items-center justify-center relative z-10 transition-transform duration-300 group-hover:scale-125 shadow-sm">
                            </div>

                            {{-- Teks --}}
                            <p
                                class="text-[14px] sm:text-[15px] text-gray-700 lg:text-center mt-1 lg:mt-3 leading-relaxed font-semibold max-w-xs">
                                {{ $text }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>

        </section>
    </div>

    @include('faqs.faqs')
    @include('testimoni.index')
@endsection
