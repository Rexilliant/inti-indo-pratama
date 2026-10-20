@extends('layout.master')

@section('title', 'Produk Unggulan Kami | BHOS Teknologi')
@section('meta_description',
    'Jelajahi produk unggulan BHOS Teknologi - solusi pupuk berbasis teknologi nano yang
    dirancang untuk berbagai jenis tanaman dan kebutuhan pertanian modern.')
@section('meta_keywords',
    'produk BHOS Teknologi, pupuk nano, produk pupuk nano, pupuk pertanian modern, solusi nutrisi
    tanaman')
@section('og_title', 'Produk Unggulan Kami | BHOS Teknologi')
@section('og_description',
    'Jelajahi produk unggulan BHOS Teknologi - solusi pupuk berbasis teknologi nano untuk
    pertanian modern.')

@section('content')
    {{-- Section Produk Unggulan --}}
    <div class="w-full bg-[#ECFDF5] py-24 lg:py-20 overflow-hidden">
        <section class="mx-auto max-w-screen-xl px-0 lg:px-8">

            {{-- Header Title --}}
            <div
                class="pt-20 lg:pt-8 text-center mb-10 md:mb-14 flex flex-col items-center gap-3 md:gap-4 px-4 sm:px-6 lg:px-0">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight ">
                    <span class="text-[#047857]">Produk Unggulan</span> Kami
                </h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl leading-relaxed">
                    Kami menghadirkan berbagai solusi pupuk berbasis teknologi Nano. <br class="hidden md:block">
                    Dirancang khusus untuk berbagai jenis tanaman dan kebutuhan pertanian modern.
                </p>
            </div>

            {{-- Search Bar --}}
            <div class="mb-8 max-w-2xl mx-auto px-4 sm:px-6 lg:px-0">
                <form id="product-search-form" action="{{ route('our_product.index') }}" method="GET">
                    <div class="relative">
                        {{-- Search Icon --}}
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        {{-- Input --}}
                        <input type="search" id="product-search-input" name="search" value="{{ request('search') }}"
                            placeholder="Cari produk..." autocomplete="off"
                            class="w-full pl-12 pr-12 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-800 text-sm sm:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent shadow-sm transition-all duration-300" />

                        {{-- Clear Button (visible when search has value) --}}
                        @if (request('search'))
                            <a href="{{ route('our_product.index') }}"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var input = document.getElementById('product-search-input');
                        var form = document.getElementById('product-search-form');
                        var timer;

                        if (input && form) {
                            if (input.value) {
                                input.focus();
                                var val = input.value;
                                input.value = '';
                                input.value = val;
                            }

                            input.addEventListener('input', function() {
                                clearTimeout(timer);
                                timer = setTimeout(function() {
                                    form.submit();
                                }, 1500);
                            });
                        }
                    });
                </script>

                {{-- Search result info --}}
                @if (request('search'))
                    <p class="text-xs text-gray-500 mt-2 pl-1">
                        {{ $products->total() }} produk ditemukan untuk "<span
                            class="font-semibold">{{ request('search') }}</span>"
                    </p>
                @endif
            </div>

            {{-- Container Produk --}}
            <div
                class="flex lg:grid lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 overflow-x-auto lg:overflow-visible snap-x snap-mandatory px-4 sm:px-6 lg:px-0 pb-8 pt-2 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                @forelse ($products as $product)
                    <div
                        class="shrink-0 w-[75%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none group bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-xl overflow-hidden flex flex-col transition-all duration-300 hover:-translate-y-1.5 focus-within:ring-2 focus-within:ring-[#047857]">

                        <a href="{{ route('our_product.product-details', $product->slug) }}"
                            class="block w-full aspect-[4/3] lg:aspect-square bg-gray-50 relative overflow-hidden focus:outline-none">

                            <img src="{{ $product->getFirstMediaUrl('product_images', 'preview') ?: 'https://placehold.co/800x800/ECFDF5/047857?text=No+Image+Available' }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                        </a>

                        {{-- Konten Text --}}
                        <div class="p-4 sm:p-5 flex flex-col flex-grow justify-between">

                            <a href="{{ route('our_product.product-details', $product->slug) }}"
                                class="focus:outline-none hover:text-[#047857] transition-colors">
                                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-1 sm:mb-2 line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <div class="mt-2 sm:mt-3">
                                <a href="{{ route('our_product.product-details', $product->slug) }}"
                                    class="inline-flex items-center py-2 text-sm font-bold text-[#EA580C] hover:text-[#C2410C] transition-colors focus:outline-none">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-10 text-gray-500 font-medium">
                        Belum ada produk yang ditambahkan.
                    </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="mt-6 sm:mt-10 px-4 flex justify-center">
                {{ $products->links('layout.pagination') }}
            </div>

        </section>
    </div>

    {{-- @include('faqs.faqs') --}}
    @include('faqs.faqs', ['limit' => 4])
    @include('testimoni.index')
@endsection
