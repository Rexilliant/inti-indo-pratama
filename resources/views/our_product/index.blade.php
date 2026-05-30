@extends('layout.master')

@section('content')
    {{-- Section Produk Unggulan --}}
    <div class="w-full bg-[#F4FDF9] py-12 sm:py-16 md:py-24 overflow-hidden">
        <section class="mx-auto max-w-screen-xl px-0 lg:px-8">

            {{-- Header Title --}}
            <div class="text-center mb-10 md:mb-14 flex flex-col items-center gap-3 md:gap-4 px-4 sm:px-6 lg:px-0">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Produk Unggulan</span> Kami
                </h2>
                <p class="text-base sm:text-lg text-gray-600 max-w-2xl leading-relaxed">
                    Kami menghadirkan berbagai solusi pupuk berbasis teknologi Nano. <br class="hidden md:block">
                    Dirancang khusus untuk berbagai jenis tanaman dan kebutuhan pertanian modern.
                </p>
            </div>

            {{-- Container Produk (Slider di Mobile/iPad, Grid di Desktop) --}}
            <div
                class="flex lg:grid lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 overflow-x-auto lg:overflow-visible snap-x snap-mandatory px-4 sm:px-6 lg:px-0 pb-8 pt-2 
                        [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                {{-- Looping Card Produk --}}
                @for ($i = 0; $i < 8; $i++)
                    <div
                        class="shrink-0 w-[75%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none group bg-white border border-gray-200 rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-xl overflow-hidden flex flex-col transition-all duration-300 hover:-translate-y-1.5 focus-within:ring-2 focus-within:ring-[#047857]">

                        {{-- Gambar Produk --}}
                        <div class="w-full aspect-[4/3] lg:aspect-square bg-gray-50 relative overflow-hidden">
                            <img src="{{ asset('images/pupuk-nitrea.jpg') }}" alt="Pupuk Nitrea"
                                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                        </div>

                        {{-- Konten Text --}}
                        <div class="p-4 sm:p-5 flex flex-col flex-grow justify-between">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-1 sm:mb-2 line-clamp-2">
                                BHOS Teknologi
                            </h3>

                            <div class="mt-2 sm:mt-3">
                                <a href="#"
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
                @endfor

            </div>

            {{-- Pagination Tampil di Semua Layar (Mobile, iPad, Desktop) --}}
            <nav aria-label="Navigasi Halaman" class="flex justify-center items-center mt-6 sm:mt-10 gap-2 sm:gap-3 px-4">
                {{-- Active Page --}}
                <a href="#" aria-current="page"
                    class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#EA580C] text-white text-sm sm:text-base font-semibold shadow-md hover:bg-[#C2410C] transition-all focus:ring-4 focus:ring-orange-200 focus:outline-none">
                    1
                </a>
                {{-- Inactive Pages --}}
                <a href="#"
                    class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-white border border-gray-300 text-gray-600 text-sm sm:text-base font-semibold hover:bg-gray-50 hover:text-gray-900 transition-all focus:ring-4 focus:ring-gray-100 focus:outline-none">
                    2
                </a>
                <a href="#"
                    class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-white border border-gray-300 text-gray-600 text-sm sm:text-base font-semibold hover:bg-gray-50 hover:text-gray-900 transition-all focus:ring-4 focus:ring-gray-100 focus:outline-none">
                    3
                </a>
                <span class="flex items-center justify-center w-10 h-10 text-gray-500 font-medium">...</span>
                <a href="#"
                    class="flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-white border border-gray-300 text-gray-600 text-sm sm:text-base font-semibold hover:bg-gray-50 hover:text-gray-900 transition-all focus:ring-4 focus:ring-gray-100 focus:outline-none">
                    8
                </a>
            </nav>

        </section>
    </div>

    @include('faqs.faqs')

    @include('testimoni.index')
@endsection
