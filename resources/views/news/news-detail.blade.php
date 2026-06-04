@extends('layout.master')

@section('content')
    {{-- Section Detail Artikel --}}
    <div class="w-full bg-[#ECFDF5]  py-15 md:py-20 min-h-screen">
        <section class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-screen-xl lg:p-4 lg:p-5 lg:w-full">            
            <article>

                {{-- Bagian Meta Data (Tanggal, Waktu Baca, Penulis) --}}
                <div
                    class="text-xs sm:text-sm md:text-base text-gray-600 font-medium mb-3 sm:mb-4 flex flex-wrap items-center gap-1.5 sm:gap-2">
                    <span>25 Juni 2026</span>
                    <span class="hidden sm:inline-block text-gray-400">•</span>
                    <span>5 Menit Baca</span>
                    <span class="hidden sm:inline-block text-gray-400">•</span>
                    <span>Oleh: <span class="font-bold text-gray-900">BHOS Teknologi</span></span>
                </div>

                {{-- Judul Artikel --}}
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-[42px] font-extrabold text-gray-900 tracking-tight leading-snug sm:leading-tight mb-6 sm:mb-8">
                    Pupuk Nano BHOS Terbukti Meningkatkan Hasil 35% di Wilayah Kering
                </h1>

                {{-- Gambar Utama (Hero Image) --}}
                <div
                    class="w-full mb-8 sm:mb-10 overflow-hidden rounded-xl sm:rounded-2xl md:rounded-3xl shadow-sm sm:shadow-md border border-gray-200 bg-gray-100">
                    {{-- Pastikan asset disesuaikan dengan direktori gambar Anda --}}
                    <img src="{{ asset('assets_img/bg-news.png') }}" alt="Pupuk Nano BHOS di Lahan Kering"
                        class="w-full h-auto object-cover aspect-video hover:scale-[1.02] transition-transform duration-500">
                </div>

                {{-- Konten Artikel --}}
                <div class="text-base sm:text-lg text-gray-800 leading-relaxed space-y-5 sm:space-y-6 md:space-y-8">

                    {{-- Paragraf 1 --}}
                    <p>
                        <strong class="text-gray-900">DELI SERDANG, SUMATRA UTARA</strong> - Teknologi nano-fertilizer
                        terbaru
                        dari BHOS Teknologi telah menunjukkan hasil yang revolusioner dalam mengatasi tantangan pertanian di
                        wilayah lahan kering. Uji coba lapangan selama 12 bulan yang baru-baru ini diselesaikan di Grobogan,
                        Jawa Tengah, salah satu daerah paling terdampak kekeringan, telah membuktikan bahwa Pupuk Nano BHOS
                        mampu meningkatkan hasil panen hingga 35% dibandingkan dengan metode pemupukan konvensional.
                    </p>

                    {{-- Paragraf 2 --}}
                    <p>
                        Pertanian lahan kering di Indonesia sering kali menghadapi kendala efisiensi air dan penyerapan
                        nutrisi
                        yang buruk akibat tanah yang padat dan retak. Namun, Pupuk Nano BHOS, dengan formulasi partikel
                        nano-nutrisi yang sangat halus, dirancang untuk menembus tanah dengan lebih efisien dan langsung
                        diserap
                        oleh sistem perakaran tanaman, bahkan dalam kondisi kelembapan tanah yang minimal.
                    </p>

                    {{-- Paragraf 3 --}}
                    <p>
                        Uji coba ini melibatkan lahan pertanian jagung seluas lima hektar, dengan satu petak menggunakan
                        Pupuk
                        Nano BHOS dan petak lainnya menggunakan pupuk konvensional sebagai kontrol. Selama siklus tanam,
                        petak
                        uji coba BHOS menunjukkan ketahanan yang luar biasa terhadap stres air, dengan tanaman yang tetap
                        hijau
                        subur di tengah kondisi tanah yang gersang.
                    </p>

                    {{-- Paragraf 4 --}}
                    <p>
                        Hasil akhir uji coba menunjukkan peningkatan biomassa tanaman sebesar 40% dan lonjakan hasil panen
                        pipilan kering sebesar 35%. Data analisis lapangan juga menunjukkan peningkatan penyerapan nutrisi
                        sebesar 98% dan efisiensi penggunaan air yang jauh lebih tinggi.
                    </p>

                    {{-- Paragraf 5 (Kutipan/Quote) dibuat menonjol --}}
                    <blockquote
                        class="pl-4 sm:pl-6 py-3 sm:py-4 border-l-4 border-[#047857] bg-[#EBFBF3] rounded-r-xl italic text-gray-700 text-sm sm:text-base md:text-lg font-medium shadow-sm">
                        "Ini adalah titik balik bagi petani lahan kering," kata Dr. Agus Setiawan, peneliti utama dari
                        Institut Pertanian setempat. "Pupuk Nano BHOS tidak hanya memberikan nutrisi yang dibutuhkan
                        tanaman, tetapi juga meningkatkan kemampuan tanah untuk menahan air dan mempromosikan penyerapan
                        yang lebih efisien. Hasil ini sangat menjanjikan untuk ketahanan pangan nasional, terutama di daerah
                        yang rentan terhadap kekeringan."
                    </blockquote>

                    {{-- Paragraf 6 --}}
                    <p>
                        Keberhasilan uji coba ini membuka jalan bagi penerapan teknologi BHOS secara luas di seluruh
                        Indonesia, memberikan harapan baru bagi petani di wilayah marginal dan mendukung pertanian yang
                        lebih berkelanjutan dengan konsumsi sumber daya minimal.
                    </p>

                </div>

            </article>
        </section>
    </div>

    @include('faqs.faqs')

    @include('testimoni.index')
@endsection
