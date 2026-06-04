@extends('layout.master')

@section('content')
<div class="bg-[#ECFDF5]">
    <div class="pt-20">
        @include('faqs.faqs')
    </div>
    
    @include('testimoni.index')
</div>

@endsection