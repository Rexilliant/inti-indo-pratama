@extends('admin.layout.master')

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
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Tanggal</label>
                    <input type="date"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                </div>
                {{-- Kategori (Dropdown) --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Kategori</label>
                    <select
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm cursor-pointer">
                        <option value="" disabled selected>Pilih Kategori...</option>
                        <option value="inovasi-riset">Inovasi dan Riset</option>
                        <option value="tips-pertanian">Tips Pertanian</option>
                        <option value="kabar-perusahaan">Kabar Perusahaan</option>
                    </select>
                </div>
            </div>

            {{-- Judul --}}
            <div class="pt-4">
                <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">Judul</label>
                <input type="text"
                    class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                    placeholder="Masukkan judul berita...">
            </div>
        </div>

        {{-- Section Hook --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Hook</label>
            <textarea rows="2"
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Masukkan kalimat pemikat (hook)..."></textarea>
        </div>

        {{-- Section Berita Lengkap --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Berita Lengkap</label>
            <textarea rows="10"
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Tuliskan berita lengkap di sini..."></textarea>
        </div>

        {{-- Section Upload Gambar --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">Upload Gambar</label>
            <div
                class="mt-2 flex justify-center rounded-lg border-2 border-dashed border-gray-400 px-6 py-12 hover:bg-gray-300/50 transition duration-200 ease-in-out cursor-pointer relative">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".png, .jpg, .jpeg">
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
                    <p class="text-sm text-gray-600 mt-1">PNG, JPG, or JPEG (MAX 3 Mb)</p>
                </div>
            </div>
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
