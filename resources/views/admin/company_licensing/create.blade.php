@extends('admin.layout.master')

{{-- Sidebar active --}}
@section('open-licensing', 'open')
@section('menu-licensing', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-6">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">Company Licensing</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Tambah Licensing</span>
        </div>
    </section>

    {{-- Form Start --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Section Nama Perizinan --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Nama Perizinan
            </label>
            <input type="text"
                class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                placeholder="Masukkan nama perizinan..." value="">
        </div>

        {{-- Section Deskripsi Singkat --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Deskripsi Singkat Dokumen
            </label>
            <textarea rows="5"
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Masukkan deskripsi dokumen..."></textarea>
        </div>

        {{-- Section Upload Dokumen (PDF, PNG, JPG) --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Dokumen Perizinan
            </label>
            <div
                class="mt-2 flex justify-center rounded-lg border-2 border-dashed border-gray-400 px-6 py-12 hover:bg-gray-300/50 transition duration-200 ease-in-out cursor-pointer relative">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".png, .jpg, .jpeg, .pdf">
                <div class="text-center">
                    <svg class="mx-auto h-10 w-10 text-gray-800 mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-800 justify-center font-medium">
                        <span class="font-bold text-gray-900">Click to upload</span>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">PNG, JPG, or JPEG, PDF (MAX 3 Mb)</p>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <a href="{{ route('admin.licensing.index') }}"
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
