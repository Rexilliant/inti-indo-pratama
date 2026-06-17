@extends('admin.layout.master')
@section('open-licensing', 'open')
@section('menu-licensing', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('addCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <style>
        /* Mengubah font default FilePond agar ikut font master Anda */
        .filepond--root {
            font-family: inherit;
            margin-bottom: 0;
            min-height: 250px !important;
        }

        .filepond--drop-label {
            background-color: transparent !important;
            cursor: pointer;
            min-height: 250px !important;

            /* Menggunakan Flexbox untuk menengahkan ikon */
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 1.5rem !important;
        }

        .filepond--panel-root {
            background-color: #ffffff !important;
            border: 2px dashed #d1d5db !important;
            /* gray-300 */
            border-radius: 1rem !important;
            /* rounded-2xl */
            transition: all 0.3s ease;
        }

        /* Efek hover untuk panel utama (kotak dashed) */
        .filepond--root:hover .filepond--panel-root {
            border-color: #3b82f6 !important;
            /* blue-500 */
            background-color: #eff6ff !important;
            /* blue-50 */
        }

        .filepond--label-action {
            text-decoration: none;
            cursor: pointer;
            color: #3b82f6;
            /* Warna biru blue-600 */
            font-weight: 700;
        }

        /* Memastikan container flex kustom di dalam drop-label
                   tidak memiliki margin bawaan yang mengganggu centering */
        .filepond--drop-label>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endsection

@section('content')
    <section class="mb-6">
        <div class="text-xl font-bold">Edit Licensing</div>
    </section>

    <form action="{{ route('admin.company_licensing.update', $license->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Perizinan --}}
        <div class="bg-gray-200/80 p-5 rounded-xl mb-5">
            <label class="block font-bold mb-2">Nama Perizinan</label>
            <input type="text" name="name" value="{{ old('name', $license->name) }}" required
                class="w-full p-2 border rounded @error('name') border-red-500 @enderror">
        </div>

        {{-- Deskripsi --}}
        <div class="bg-gray-200/80 p-5 rounded-xl mb-5">
            <label class="block font-bold mb-2">Deskripsi</label>
            <textarea name="description" rows="5" required
                class="w-full p-2 border rounded @error('description') border-red-500 @enderror">{{ old('description', $license->description) }}</textarea>
        </div>

        {{-- File Upload Area --}}
        <div class="bg-gray-200/80 p-5 rounded-xl mb-5">
            <label class="block font-bold mb-2 text-gray-800">Dokumen Perizinan</label>

            {{-- Info File Lama --}}
            @if ($license->hasMedia('licenses'))
                <div class="mb-4 p-3 bg-white rounded-lg border border-blue-200 text-sm text-blue-700">
                    File saat ini: <strong>{{ $license->getFirstMedia('licenses')->file_name }}</strong>
                </div>
            @endif

            {{-- FilePond Input --}}
            <div class="mt-1">
                <input id="file-input" name="document" type="file" accept="image/png,image/jpeg,image/jpg">
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <a href="{{ route('admin.company_licensing.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2.5 px-8 rounded-lg shadow">Batal</a>
            <button type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow">Simpan
                Perubahan</button>
        </div>
    </form>
@endsection

@section('addJs')
    {{-- FilePond Plugins & Core --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script>
        // Register FilePond Plugins
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImagePreview
        );

        // Desain HTML kustom 
        const customIconPlaceholder = `
            <div class="flex flex-col items-center justify-center space-y-4">
                <div class="p-4 bg-blue-50 rounded-full transition-transform duration-300 hover:scale-110">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div class="text-center">
                    <p class="text-base font-bold text-gray-700"><span class="filepond--label-action">Klik</span> atau Tarik file baru untuk mengganti</p>
                    <p class="text-xs text-gray-500 mt-1 font-medium">PNG, JPG, JPEG (Maksimum 3MB)</p>
                </div>
            </div>
        `;

        // Initialize FilePond
        const inputElement = document.querySelector('#file-input');
        const pond = FilePond.create(inputElement, {
            storeAsFile: true,
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            maxFileSize: '3MB',
            labelIdle: customIconPlaceholder,
            labelFileTypeNotAllowed: 'Format file tidak didukung',
            fileValidateTypeLabelExpectedTypes: 'Hanya PNG/JPG/JPEG',
            labelMaxFileSizeExceeded: 'Ukuran file terlalu besar',
            labelMaxFileSize: 'Maksimum 3MB',
        });
    </script>
@endsection
