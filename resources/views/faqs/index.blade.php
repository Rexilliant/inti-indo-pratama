@extends('layout.master')

@section('title', 'FAQ - Pertanyaan Umum | BHOS Teknologi')
@section('meta_description', 'Temukan jawaban atas pertanyaan yang sering diajukan seputar produk pupuk nano BHOS Teknologi, cara penggunaan, manfaat, dan layanan PT Grace Indo Pratama.')
@section('meta_keywords', 'FAQ BHOS Teknologi, pertanyaan pupuk nano, cara pakai pupuk nano, manfaat pupuk nano, bantuan pelanggan')
@section('og_title', 'FAQ - Pertanyaan Umum | BHOS Teknologi')
@section('og_description', 'Temukan jawaban atas pertanyaan yang sering diajukan seputar produk pupuk nano BHOS Teknologi.')

@section('content')
<div class="bg-[#ECFDF5]">
    <div class="pt-20">
        @include('faqs.faqs')
    </div>
    
    @include('testimoni.index')
</div>

@endsection