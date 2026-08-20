@extends('admin.layout.master')

{{-- Sidebar active --}}
@section('open-product', 'open')
@section('menu-product', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

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

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">Our Product</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Add Product</span>
        </div>
    </section>

    {{-- Form Start --}}
    <form action="{{ route('admin.our_product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-5 border border-red-200">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Section Input ID & Nama Barang --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">ID Barang</label>
                    <input type="text" name="code" value="{{ old('code') }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                        placeholder="Contoh: BHOSEKS0001">
                </div>

                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Nama Barang</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                        placeholder="Contoh: BHOS Ekstra">
                </div>

            </div>
        </div>

        {{-- Section Deskripsi Produk --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Deskripsi Produk</label>
            <textarea name="description" id="myTinyMce" rows="8"
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Masukkan deskripsi produk...">{{ old('description') }}</textarea>
        </div>

        {{-- Section Foto Produk --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Foto Produk</label>

            {{-- Cukup satu input ini saja! --}}
            <input type="file" name="image" id="imageInput" required accept="image/png, image/jpeg, image/jpg">
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <button type="button" onclick="confirmCancel()"
                class="w-full sm:w-auto inline-flex justify-center bg-[#EC0E0E] hover:bg-red-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Kembali
            </button>

            {{-- Ganti tag <a> jadi <button type="submit"> biar formnya beneran kesubmit --}}
            <button type="submit"
                class="w-full sm:w-auto inline-flex justify-center bg-[#2D2ACD] hover:bg-blue-800 text-white font-semibold py-2.5 px-8 rounded-lg shadow transition">
                Simpan
            </button>
        </div>
    </form>

@endsection

@section('addJs')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. TinyMCE
            if (document.getElementById('myTinyMce')) {
                tinymce.init({
                    selector: '#myTinyMce',
                    plugins: 'image link lists table code preview',

                    // FIXED: Toolbar lengkap sama kayak Edit
                    toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | table | bullist numlist outdent indent | image link | code preview',

                    // FIXED: Menubar diaktifin lagi
                    menubar: true,

                    license_key: 'gpl',
                    height: 400,

                    relative_urls: false,
                    remove_script_host: false,

                    // FIXED: CSS Responsive konten
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px } img { max-width: 100%; height: auto !important; } table { max-width: 100% !important; height: auto !important; table-layout: fixed; }',

                    // FIXED: Pake mode Scroll (bukan wrap), tombol titik tiga akan muncul di mobile
                    toolbar_mode: 'sliding',

                    images_upload_url: '{{ route('admin.our_product.tinymce.upload') }}',
                    images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
                        const token = document.querySelector('meta[name="csrf-token"]');
                        if (!token) return reject('CSRF Token missing');

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route('admin.our_product.tinymce.upload') }}');
                        xhr.setRequestHeader("X-CSRF-Token", token.getAttribute('content'));

                        xhr.upload.onprogress = (e) => progress(e.loaded / e.total * 100);
                        xhr.onload = () => {
                            if (xhr.status !== 200) return reject('HTTP Error: ' + xhr.status);
                            const json = JSON.parse(xhr.responseText);
                            resolve(json.location);
                        };
                        const formData = new FormData();
                        formData.append('file', blobInfo.blob(), blobInfo.filename());
                        xhr.send(formData);
                    })
                });
            }

            // 2. FilePond
            const inputElement = document.querySelector('#imageInput');
            if (inputElement && !inputElement.classList.contains('filepond--input')) {
                FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginFileValidateSize,
                    FilePondPluginImagePreview);

                // Ikon placeholder yang sama dengan style Licensing
                const customIconPlaceholder = `
        <div class="flex flex-col items-center justify-center space-y-4">
            <div class="p-4 bg-blue-50 rounded-full transition-transform duration-300 hover:scale-110">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div class="text-center">
                <p class="text-base font-bold text-gray-700"><span class="filepond--label-action">Klik</span> atau Tarik file ke sini</p>
                <p class="text-xs text-gray-500 mt-1 font-medium">PNG, JPG, JPEG (Maksimum 3MB)</p>
            </div>
        </div>
    `;

                FilePond.create(inputElement, {
                    name: 'image',
                    allowMultiple: false,
                    storeAsFile: true,
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                    maxFileSize: '3MB',
                    labelIdle: customIconPlaceholder, // Memasang ikon custom
                    labelFileTypeNotAllowed: 'Format file tidak didukung',
                    fileValidateTypeLabelExpectedTypes: 'Hanya PNG/JPG/JPEG',
                    labelMaxFileSizeExceeded: 'Ukuran file terlalu besar',
                    labelMaxFileSize: 'Maksimum 3MB',
                });
            }
        });

        function confirmCancel() {
            Swal.fire({
                title: 'Batal menambah data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, kembali',
                cancelButtonText: 'Lanjut mengisi'
            }).then((result) => {
                if (result.isConfirmed) window.location.href = "{{ route('admin.our_product.index') }}";
            });
        }
    </script>
@endsection
