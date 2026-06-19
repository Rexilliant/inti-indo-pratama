@extends('admin.layout.master')
{{-- sidebar active (sesuaikan menu kamu) --}}
@section('open-news', 'open')
@section('menu-news-category', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')
@section('content')
    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">News Category</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Add Category</span>
        </div>
    </section>

    <form action="{{ route('admin.news-category.store') }}" method="POST">
        @csrf

        <div class="bg-gray-200/80 p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                Nama Kategori
            </label>

            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                placeholder="Masukkan nama kategori..." required>

            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <a href="{{ route('admin.news-category.index') }}"
                class="w-full sm:w-auto inline-flex justify-center bg-[#EC0E0E] hover:bg-red-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Kembali
            </a>

            <button type="submit"
                class="w-full sm:w-auto inline-flex justify-center bg-[#2D2ACD] hover:bg-blue-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Simpan
            </button>
        </div>
    </form>
@endsection
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            confirmButtonColor: '#2D2ACD'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            confirmButtonColor: '#EC0E0E'
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Validasi Gagal',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#F59E0B'
        });
    </script>
@endif
