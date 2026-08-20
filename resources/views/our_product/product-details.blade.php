@extends('layout.master')

@section('addCss')
    <style>
        .tinymce-content { width: 100%; color: #374151; font-size: 1rem; line-height: 1.6; }
        .tinymce-content h1 { font-size: 2em; font-weight: 800; margin: 1.5em 0 1em 0; color: #047857; }
        .tinymce-content h2 { font-size: 1.5em; font-weight: 700; margin: 1em 0; }
        .tinymce-content h3 { font-size: 1.25em; font-weight: 600; margin: 1em 0; }
        .tinymce-content p { margin-bottom: 1rem; }
        .tinymce-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
        .tinymce-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
        
        /* Tabel Responsif buat mobile */
        .tinymce-content table { 
            border-collapse: collapse; 
            width: 100% !important; 
            margin: 1.5rem 0; 
            overflow-x: auto; 
            display: block; 
        }
        .tinymce-content td, .tinymce-content th { border: 1px solid #d1d5db; padding: 12px; }
        @media (min-width: 768px) { .tinymce-content table { display: table; } }
    </style>
@endsection

@section('content')
    {{-- Hero Section --}}
    <div class="w-full bg-[#EEFBF5] pt-20">
        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#047857]">
                {{ $product->name }}
            </h1>
            <div class="text-sm sm:text-base font-medium text-[#444545] leading-relaxed pt-4 max-w-3xl mx-auto">
                <p>Kami menghadirkan berbagai solusi pupuk berbasis teknologi Nano untuk pertanian modern.</p>
            </div>
        </section>
    </div>

    {{-- Konten Utama (Output TinyMCE) --}}
    <div class="w-full bg-[#EEFBF5] pb-20">
        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 w-full">
            <div class="tinymce-content w-full overflow-x-auto">
                {!! $product->description !!}
            </div>
        </section>
    </div>

    {{-- @include('faqs.faqs') --}}
    @include('faqs.faqs', ['limit' => 4])
    @include('testimoni.index')
@endsection