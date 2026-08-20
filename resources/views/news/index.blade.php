@extends('layout.master')

@section('content')
    {{-- hero banner (mobile + ipad aman) --}}
    <div class="relative flex min-h-[500px] w-full items-center bg-[#ECFDF5] bg-cover bg-left bg-no-repeat md:min-h-[700px]"
        style="background-image: url('{{ asset('assets_img/bg-news.png') }}');">

        {{-- overlay gelap --}}
        <div class="absolute inset-0 bg-black/20"></div>

        <section class="mx-auto max-w-screen-xl p-4 md:p-5 relative z-10 w-full">

            {{-- title --}}
            <h1
                class="max-w-4xl text-4xl font-black leading-tight drop-shadow-[4px_4px_2px_rgba(0,0,0,0.06)] sm:text-5xl lg:text-6xl">
                <span class="text-[#FAFAFA]">Wawasan &</span>
                <br>
                <span
                    class="bg-gradient-to-r from-[#046910] from-0% via-[#08CF1F] via-38% to-[#08CF1F] bg-clip-text text-transparent">
                    Inovasi Pertanian
                </span>
            </h1>

            {{-- subtitle --}}
            <p class="mt-4 sm:mt-5 max-w-3xl text-base sm:text-lg md:text-xl font-extrabold text-[#FAFAFA] leading-relaxed">
                Ikuti Perkembangan Terbaru Kami, Studi Kasus dan Tips dari Para Ahli
                Untuk Pertanian Masa Depan Berkelanjutan
            </p>

        </section>
    </div>

    {{-- Section Artikel & Berita --}}
    <div class="w-full bg-[#ECFDF5] py-10 lg:py-20">
        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

            {{-- Top Bar: Kategori Filter & Search Bar --}}
            <form action="{{ route('news.index') }}" method="GET" class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-5 lg:gap-8 mb-8 md:mb-12">
                {{-- Kategori Buttons --}}
                <div class="flex flex-wrap items-center gap-2 sm:gap-3 w-full lg:w-auto">
                    <span class="text-sm sm:text-base font-bold text-gray-900 mr-2">Kategori:</span>

                    {{-- Semua Button --}}
                    <a href="{{ route('news.index', request()->except('category_id')) }}"
                        class="px-4 py-2 text-sm font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 transition-colors {{ empty(request('category_id')) ? 'text-white bg-[#047857] focus:ring-green-600' : 'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-gray-200' }}">
                        Semua
                    </a>

                    {{-- Dynamic Buttons --}}
                    @foreach($categories as $category)
                        <a href="{{ route('news.index', array_merge(request()->query(), ['category_id' => $category->id])) }}"
                            class="px-4 py-2 text-sm font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 transition-colors {{ request('category_id') == $category->id ? 'text-white bg-[#047857] focus:ring-green-600' : 'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-gray-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

                {{-- Search Input (Flowbite Style) --}}
                <div class="relative w-full lg:w-[45%] shrink-0">
                    @if(request('category_id'))
                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    @endif
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search" name="search" value="{{ request('search') }}"
                        class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-[#047857] focus:border-[#047857] shadow-sm transition-shadow"
                        placeholder="Cari Lebih Banyak">
                </div>
            </form>

            {{-- Container Artikel: Scroll Horizontal di Mobile/iPad, Grid di Desktop --}}
            <div
                class="flex lg:grid lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 overflow-x-auto lg:overflow-visible snap-x snap-mandatory pb-8 pt-2 
                        [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                {{-- Looping Card Artikel --}}
                @forelse ($newsList as $item)
                    <article
                        class="shrink-0 w-[85%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none flex flex-col bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-1.5 focus-within:ring-2 focus-within:ring-[#047857]">

                        {{-- Thumbnail Artikel --}}
                        <a href="{{ route('news.news-detail', $item->slug) }}"
                            class="block w-full aspect-[16/9] bg-gray-100 relative overflow-hidden group">
                            <img src="{{ $item->getFirstMediaUrl('news-thumbnail') ?: 'https://placehold.co/800x450/ECFDF5/047857?text=No+Image+Available' }}" alt="{{ $item->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>

                        {{-- Konten Artikel --}}
                        <div class="p-5 sm:p-6 flex flex-col flex-grow">
                            {{-- Meta Date --}}
                            <time class="text-xs font-medium text-gray-500 mb-2.5 block">{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, d F Y') }}</time>

                            {{-- Judul --}}
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2 line-clamp-2 leading-snug">
                                <a href="{{ route('news.news-detail', $item->slug) }}"
                                    class="hover:text-[#047857] transition-colors focus:outline-none" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                            </h3>

                            {{-- Excerpt / Ringkasan Pendek --}}
                            <p class="text-sm text-gray-600 mb-6 line-clamp-2 leading-relaxed">
                                {{ $item->hook ?? \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}
                            </p>

                            {{-- Tombol (mt-auto akan selalu mendorong tombol ke bagian paling bawah walau tinggi teks berbeda) --}}
                            <div class="mt-auto">
                                <a href="{{ route('news.news-detail', $item->slug) }}"
                                    class="inline-flex justify-center items-center w-full sm:w-auto px-5 py-2.5 text-sm font-bold text-white bg-[#047857] rounded-lg hover:bg-[#0369a1] focus:ring-4 focus:outline-none focus:ring-green-300 transition-all shadow-sm">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-10 text-center text-gray-500">
                        Belum ada artikel atau berita yang tersedia.
                    </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="mt-12 sm:mt-16 flex justify-center">
                {{ $newsList->links('layout.pagination') }}
            </div>

        </section>
    </div>

    {{-- @include('faqs.faqs') --}}
    @include('faqs.faqs', ['limit' => 4])
    @include('testimoni.index')
@endsection
