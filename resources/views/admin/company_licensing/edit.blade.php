@extends('admin.layout.master')
@section('open-licensing', 'open')
@section('menu-licensing', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

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

            <div id="drop-zone"
                class="relative group cursor-pointer mt-1 flex flex-col items-center justify-center min-h-[250px] w-full p-4 border-2 border-dashed rounded-2xl transition-all duration-300 overflow-hidden bg-white border-gray-300 hover:border-blue-500 hover:bg-blue-50/50">

                {{-- ID ini sudah disamakan jadi file-input --}}
                <input id="file-input" name="document" type="file" class="sr-only" accept=".png, .jpg, .jpeg, .pdf">

                {{-- Tampilan Placeholder --}}
                <div id="upload-placeholder" class="flex flex-col items-center justify-center space-y-4 py-8">
                    <div class="p-4 bg-blue-50 rounded-full group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <p class="text-base font-bold text-gray-700">Klik atau Tarik file baru untuk mengganti</p>
                    </div>
                </div>

                {{-- Tampilan Preview --}}
                <div id="preview-area"
                    class="hidden absolute inset-0 flex flex-col items-center justify-center bg-white p-4">
                    <div id="preview-content" class="w-full h-full flex items-center justify-center overflow-hidden"></div>
                    <div class="absolute bottom-4 flex flex-col items-center">
                        <p id="file-name" class="text-xs font-bold text-gray-500 mb-1"></p>
                        <button type="button" id="remove-btn"
                            class="text-[10px] font-bold text-red-600 hover:underline">KLIK LAGI UNTUK MENGGANTI</button>
                    </div>
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
    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-input');
        const placeholder = document.getElementById('upload-placeholder');
        const previewArea = document.getElementById('preview-area');
        const previewContent = document.getElementById('preview-content');
        const fileName = document.getElementById('file-name');
        const removeBtn = document.getElementById('remove-btn');

        dropZone.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function(e) {
            handleFile(this.files[0]);
        });

        function handleFile(file) {
            if (!file) return;

            fileName.textContent = file.name;
            placeholder.classList.add('hidden');
            previewArea.classList.remove('hidden');

            if (file.type.startsWith('image/')) {
                previewContent.innerHTML =
                    `<img src="${URL.createObjectURL(file)}" class="w-full h-full object-contain rounded-lg">`;
            } else {
                previewContent.innerHTML = `
                <div class="flex flex-col items-center text-red-500">
                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm0 2h12v12H4V4z"/></svg>
                    <span class="text-xs font-bold mt-2">PDF DOCUMENT</span>
                </div>`;
            }
        }

        removeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            fileInput.value = '';
            placeholder.classList.remove('hidden');
            previewArea.classList.add('hidden');
            previewContent.innerHTML = '';
        });

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-blue-500');
        });
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-blue-500');
        });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-500');
            const file = e.dataTransfer.files[0];
            fileInput.files = e.dataTransfer.files;
            handleFile(file);
        });
    </script>
@endsection
