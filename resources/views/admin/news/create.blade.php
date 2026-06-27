@extends('admin.layout.master')

@section('addCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

@section('open-news', 'open')
@section('menu-news', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">News</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Add News</span>
        </div>
    </section>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="draft_id" id="draft_id">

        {{-- META --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">

                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Tanggal Published
                    </label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">

                    @error('published_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Kategori
                    </label>
                    <select name="category_id"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">

                        <option value="">Pilih Kategori</option>

                        @foreach ($news_categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mt-4">
                <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                    Judul
                </label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- HOOK --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">

            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Hook
            </label>

            <textarea name="hook"
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">{{ old('hook') }}</textarea>

            @error('hook')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        {{-- CONTENT --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">

            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Berita Lengkap
            </label>

            <textarea id="content-editor" name="content">
            {{ old('content') }}
        </textarea>

            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        {{-- IMAGE --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">

            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Upload Gambar
            </label>

            <input type="file" class="filepond" name="image">

            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        {{-- BUTTON --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">

            <a href="{{ route('admin.news.index') }}"
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

@section('addJs')

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        FilePond.create(document.querySelector('.filepond'), {
            allowMultiple: false,
            maxFiles: 1,
            allowImagePreview: true,
            imagePreviewHeight: 220,
        });

        FilePond.setOptions({
            storeAsFile: true
        });
    </script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#content-editor',
            height: 500,
            menubar: true,
            license_key: 'gpl',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
                'preview', 'anchor', 'searchreplace', 'visualblocks', 'code',
                'fullscreen', 'insertdatetime', 'media', 'table', 'wordcount'
            ],

            toolbar: 'undo redo | blocks | bold italic underline | link image | code',

            // 🔥 FIX UTAMA ANTI ../../../
            relative_urls: false,
            convert_urls: false,
            remove_script_host: false,

            images_upload_handler: function(blobInfo) {

                let formData = new FormData();
                formData.append('file', blobInfo.blob());
                formData.append('draft_id', document.getElementById('draft_id').value || '');

                return fetch('/admin/news/upload-image', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('draft_id').value = data.draft_id;
                        return data.location; // FULL URL
                    });
            },

            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

@endsection
