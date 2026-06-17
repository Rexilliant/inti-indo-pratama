@extends('admin.layout.master')
@section('open-licensing', 'open')
@section('menu-licensing', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('addCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <style>
        /* Mengubah font default FilePond agar ikut font master */
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
    </style>
@endsection

@section('content')
    <section class="mb-6">
        <div class="text-xl font-bold">Tambah Licensing</div>
    </section>

    <form action="{{ route('admin.company_licensing.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Tampilkan Error Validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Nama Perizinan --}}
        <div class="bg-gray-200/80 p-5 rounded-xl mb-5">
            <label class="block font-bold mb-2">Nama Perizinan</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full p-2 border rounded @error('name') border-red-500 @enderror">
        </div>

        {{-- Deskripsi --}}
        <div class="bg-gray-200/80 p-5 rounded-xl mb-5">
            <label class="block font-bold mb-2">Deskripsi</label>
            <textarea name="description" rows="5" required
                class="w-full p-2 border rounded @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
        </div>

        {{-- File Upload Area --}}
        <div class="bg-gray-200/80 p-5 rounded-xl mb-5">
            <label class="block font-bold mb-2 text-gray-800">Dokumen Perizinan</label>

            {{-- FilePond Input --}}
            <div class="mt-1">
                <input id="document" type="file" name="document" accept="image/png,image/jpeg,image/jpg" />
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <button type="button" onclick="confirmCancel()"
                class="w-full sm:w-auto inline-flex justify-center bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Kembali
            </button>
            <button type="submit"
                class="w-full sm:w-auto inline-flex justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Simpan
            </button>
        </div>
    </form>
@endsection

@section('addJs')
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <p class="text-base font-bold text-gray-700"><span class="filepond--label-action">Klik</span> atau Tarik file ke sini</p>
                    <p class="text-xs text-gray-500 mt-1 font-medium">PNG, JPG, JPEG (Maksimum 3MB)</p>
                </div>
            </div>
        `;

        // Initialize FilePond
        const inputElement = document.querySelector('#document');
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

        // SweetAlert Cancel Confirmation
        function confirmCancel() {
            Swal.fire({
                title: 'Batal menambah data?',
                text: 'Data yang sudah kamu isi tidak akan tersimpan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, kembali',
                cancelButtonText: 'Lanjut mengisi'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.company_licensing.index') }}";
                }
            });
        }
    </script>
@endsection
