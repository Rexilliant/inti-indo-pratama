@extends('admin.layout.master')

{{-- sidebar active (sesuaikan menu kamu) --}}
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
@section('open-testimoni', 'open')
@section('menu-testimoni', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">Testimoni</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Tambah Testimoni</span>
        </div>
    </section>

    {{-- Form Start --}}
    {{-- Ditambahkan enctype agar bisa upload file/foto --}}
    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Section Identitas (Grid 2 Kolom) --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" value="{{ $testimonial->name }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                        placeholder="Contoh: Bambang Pratma Putra Hadi">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Negara --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Negara
                    </label>
                    <input type="text" name="country" value="{{ $testimonial->country }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Provinsi --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Provinsi
                    </label>
                    <input type="text" name="province" value="{{ $testimonial->province }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                    @error('province')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kota/Kabupaten --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Kota/Kabupaten
                    </label>
                    <input type="text" name="city" value="{{ $testimonial->city }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                    @error('city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Section Testimoni --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Testimoni
            </label>
            <textarea rows="6" name="comment" required
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Masukkan testimoni...">{{ $testimonial->comment }}</textarea>
            @error('comment')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Section Foto Profile (Drag & Drop UI) --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Foto Profile
            </label>
            <img src="{{ $image }}" alt="" class="w-24 h-24">
            <input type="file" class="filepond" name="image">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                Status
            </label>
            <select name="status" id="status"
                class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                <option value="published" {{ $testimonial->status == 'published' ? 'selected' : '' }}>Publish</option>
                <option value="not_published" {{ $testimonial->status == 'not_published' ? 'selected' : '' }}>Not Publish
                </option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            {{-- Sesuaikan route ini dengan yang kamu butuhkan untuk Testimoni --}}
            <a href="{{ route('admin.testimoni.index') }}"
                class="w-full sm:w-auto inline-flex justify-center bg-[#EC0E0E] hover:bg-red-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Batal
            </a>

            {{-- Mengganti tag <a> menjadi <button> agar form dapat di-submit dengan benar --}}
            <button type="submit"
                class="w-full sm:w-auto inline-flex justify-center bg-[#2D2ACD] hover:bg-blue-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Simpan
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
