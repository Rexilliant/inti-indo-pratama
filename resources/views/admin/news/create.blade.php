@extends('admin.layout.master')
@section('addCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

{{-- Sidebar active (Sesuaikan menu) --}}
@section('open-berita', 'open')
@section('menu-berita', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">News</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Add News</span>
        </div>
    </section>

    {{-- Form Start --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Section Metadata: Tanggal, Judul & Kategori --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                {{-- Tanggal --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Tanggal Published</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                </div>
                {{-- Kategori (Dropdown) --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Kategori</label>
                    <select name="category_id" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm cursor-pointer">
                        <option value="" disabled selected>Pilih Kategori...</option>
                        @foreach ($news_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Judul --}}
            <div class="pt-4">
                <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                    placeholder="Masukkan judul berita...">
            </div>
        </div>

        {{-- Section Hook --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Hook</label>
            <textarea rows="2" name="hook" value="{{ old('hook') }}" required
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Masukkan kalimat pemikat (hook)..."></textarea>
        </div>

        {{-- Section Berita Lengkap --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Berita Lengkap</label>
            <textarea rows="10" name="content" value="{{ old('content') }}" required
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Tuliskan berita lengkap di sini..."></textarea>
        </div>

        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Upload Gambar
            </label>a
            <input type="file" class="filepond" name="image" accept="image/png,image/jpeg,image/jpg">
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <a href="{{ route('admin.news.index') }}"
                class="w-full sm:w-auto inline-flex justify-center bg-[#EC0E0E] hover:bg-red-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Kembali
            </a>

            <a href="#"
                class="w-full sm:w-auto inline-flex justify-center bg-[#2D2ACD] hover:bg-blue-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Simpan
            </a>
        </div>
    </form>

@endsection
@section('addJs')
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType
        );

        FilePond.create(document.querySelector('.filepond'), {
            allowMultiple: false,
            maxFiles: 1,

            allowImagePreview: true,
            imagePreviewHeight: 220,

            maxFileSize: '3MB',
            acceptedFileTypes: [
                'image/png',
                'image/jpeg',
                'image/jpg'
            ],

            labelIdle: 'Drag & Drop gambar di sini atau <span class="filepond--label-action">Klik untuk memilih</span>',
            labelMaxFileSizeExceeded: 'Ukuran file terlalu besar',
            labelMaxFileSize: 'Maksimal ukuran file 3MB',
            labelFileTypeNotAllowed: 'Format file tidak diperbolehkan',
            fileValidateTypeLabelExpectedTypes: 'Hanya boleh PNG, JPG, atau JPEG',
        });
    </script>
@endsection
