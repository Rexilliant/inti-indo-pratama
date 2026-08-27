@extends('admin.layout.master')

@section('addCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <style>
        .filepond--root {
            font-family: inherit;
            margin-bottom: 0;
            min-height: 250px !important;
        }

        .filepond--drop-label {
            background-color: transparent !important;
            cursor: pointer;
            min-height: 250px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 1.5rem !important;
        }

        .filepond--panel-root {
            background-color: #ffffff !important;
            border: 2px dashed #d1d5db !important;
            border-radius: 1rem !important;
            transition: all 0.3s ease;
        }

        .filepond--root:hover .filepond--panel-root {
            border-color: #3b82f6 !important;
            background-color: #eff6ff !important;
        }

        .filepond--label-action {
            text-decoration: none;
            cursor: pointer;
            color: #3b82f6;
            font-weight: 700;
        }

        .filepond--drop-label>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* CSS Tambahan untuk membantu Scrollbar TinyMCE terlihat lebih jelas di beberapa browser mobile */
        .tox-toolbar-overflown {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
    </style>
@endsection

@section('open-news', 'open')
@section('menu-news', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">News</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Edit News</span>
        </div>
    </section>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="draft_id" id="draft_id">

        {{-- METADATA --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">

                {{-- TANGGAL --}}
                <div>
                    <label class="block text-sm font-bold mb-2">Tanggal Published</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', $news->published_at) }}"
                        class="w-full border rounded px-4 py-2.5
                       {{ $errors->has('published_at') ? 'border-red-500' : 'border-gray-300' }}">
                    @error('published_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CATEGORY --}}
                <div>
                    <label class="block text-sm font-bold mb-2">Kategori</label>
                    <select name="category_id"
                        class="w-full border rounded px-4 py-2.5
                        {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }}">

                        @foreach ($news_categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $news->news_categories->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- TITLE --}}
            <div class="pt-4">
                <label class="block text-sm font-bold mb-2">Judul</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}"
                    class="w-full border rounded px-4 py-2.5
                   {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}">

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- HOOK --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl mb-5">
            <div class="flex justify-between items-end mb-2">
                <label class="block text-sm font-bold">Hook (Ringkasan)</label>
                <span id="hook-counter"
                    class="text-xs font-semibold text-gray-500 bg-gray-100 px-2 py-1 rounded-md border border-gray-300">
                    0 / 500
                </span>
            </div>

            <textarea id="hook" name="hook" maxlength="500" oninput="updateCharCount()"
                class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#275931]
                  {{ $errors->has('hook') ? 'border-red-500' : 'border-gray-300' }}">{{ old('hook', $news->hook) }}</textarea>

            @error('hook')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- CONTENT (TINYMCE) --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl mb-5">
            <label class="block text-sm font-bold mb-2">Berita Lengkap</label>

            <textarea id="content-editor" name="content" required>
                {!! old('content', $news->content) !!}
            </textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- OLD THUMBNAIL --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl mb-5">
            <label class="block text-sm font-bold mb-2">Thumbnail Saat Ini</label>

            @if ($news->getFirstMediaUrl('news-thumbnail'))
                <img src="{{ $news->getFirstMediaUrl('news-thumbnail') }}" class="w-32 h-32 object-cover rounded mb-3">
            @endif

            <input type="file" class="filepond" name="image">

            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end gap-3 mt-6">

            <a href="{{ route('admin.news.index') }}" class="bg-red-600 text-white px-6 py-2 rounded">
                Kembali
            </a>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">
                Update
            </button>
        </div>

    </form>

@endsection

@section('addJs')

   <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // Daftarkan plugin validasi tipe file bersama image preview
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType
        );

        FilePond.create(document.querySelector('.filepond'), {
            allowMultiple: false,
            maxFiles: 1,
            allowImagePreview: true,
            imagePreviewHeight: 220,
            // Tipe file yang diizinkan (MIME types)
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'],
            labelFileTypeNotAllowed: 'Format file tidak valid',
            fileValidateTypeLabelExpectedTypes: 'Hanya menerima: {allButLastType} atau {lastType}'
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
            license_key: 'gpl',
            menubar: true,
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

    <script>
        function updateCharCount() {
            const textarea = document.getElementById('hook');
            const counter = document.getElementById('hook-counter');

            if (textarea && counter) {
                const currentLength = textarea.value.length;
                counter.textContent = currentLength + ' / 500';

                // Ubah warna jika karakter mencapai batas maksimal
                if (currentLength >= 500) {
                    counter.classList.replace('text-gray-500', 'text-red-600');
                    counter.classList.replace('bg-gray-100', 'bg-red-100');
                    counter.classList.replace('border-gray-300', 'border-red-300');
                } else {
                    counter.classList.replace('text-red-600', 'text-gray-500');
                    counter.classList.replace('bg-red-100', 'bg-gray-100');
                    counter.classList.replace('border-red-300', 'border-gray-300');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', updateCharCount);
    </script>

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
