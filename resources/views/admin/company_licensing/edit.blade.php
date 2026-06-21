@extends('admin.layout.master')
@section('open-licensing', 'open')
@section('menu-licensing', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

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
            /* gray-300 */
            border-radius: 1rem !important;
            /* rounded-2xl */
            transition: all 0.3s ease;
        }

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
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Dokumen Perizinan</label>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Box Menampilkan Gambar yang Sudah Ada --}}
                <div
                    class="flex flex-col items-center justify-center p-4 bg-white rounded-xl border border-gray-300 shadow-sm">
                    <span class="text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Gambar Saat Ini</span>
                    @if ($license->hasMedia('licenses'))
                        <img src="{{ $license->getFirstMediaUrl('licenses', 'thumb') }}" alt="Dokumen Perizinan"
                            class="max-h-[160px] w-auto object-contain rounded-lg border border-gray-200 p-1 shadow-sm">
                    @else
                        <div class="text-gray-400 text-sm flex flex-col items-center">
                            <svg class="w-12 h-12 mb-1 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Tidak ada dokumen</span>
                        </div>
                    @endif
                </div>

                {{-- Box Tempat Upload Baru --}}
                <div class="md:col-span-2 flex flex-col justify-center">
                    <input id="file-input" name="document" type="file" accept="image/png,image/jpeg,image/jpg">
                </div>
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
