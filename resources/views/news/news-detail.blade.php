@extends('layout.master')

@section('content')
    {{-- Section Detail Artikel --}}
    <div class="w-full bg-[#ECFDF5]  py-20 md:py-20 min-h-screen">
        <section class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-screen-xl lg:p-4 lg:p-5 lg:w-full">
            <article>

                {{-- Bagian Meta Data (Tanggal, Waktu Baca, Penulis) --}}
                <div
                    class="text-xs sm:text-sm md:text-base text-gray-600 font-medium mb-3 sm:mb-4 flex flex-wrap items-center gap-1.5 sm:gap-2">
                    <span>{{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}</span>
                    <span class="hidden sm:inline-block text-gray-400">•</span>
                    {{-- Estimasi waktu baca dari jumlah kata (asumsi 200 kata/menit) --}}
                    <span>{{ max(1, ceil(str_word_count(strip_tags($news->content)) / 200)) }} Menit Baca</span>
                    <span class="hidden sm:inline-block text-gray-400">•</span>
                    <span>Oleh: <span class="font-bold text-gray-900">BHOS Teknologi</span></span>
                </div>

                {{-- Judul Artikel --}}
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-[42px] font-extrabold text-gray-900 tracking-tight leading-snug sm:leading-tight mb-6 sm:mb-8">
                    {{ $news->title }}
                </h1>

                {{-- Gambar Utama (Hero Image) --}}
                <div
                    class="w-full mb-8 sm:mb-10 overflow-hidden rounded-xl sm:rounded-2xl md:rounded-3xl shadow-sm sm:shadow-md border border-gray-200 bg-gray-100">
                    <img src="{{ $news->getFirstMediaUrl('news-thumbnail') ?: 'https://placehold.co/1200x600/ECFDF5/047857?text=No+Image+Available' }}"
                        alt="{{ $news->title }}"
                        class="w-full h-auto object-cover aspect-video hover:scale-[1.02] transition-transform duration-500">
                </div>

                {{-- Konten Artikel --}}
                <div
                    class="text-base sm:text-lg text-gray-800 leading-relaxed space-y-5 sm:space-y-6 md:space-y-8 prose prose-lg prose-green max-w-none">
                    {!! $news->content !!}
                </div>

            </article>
        </section>
    </div>

    {{-- @include('faqs.faqs') --}}
    @include('faqs.faqs', ['limit' => 4])
    @include('testimoni.index')
@endsection
