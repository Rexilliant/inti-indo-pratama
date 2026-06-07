@extends('admin.layout.master')

{{-- sidebar active (sesuaikan menu kamu) --}}
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
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Section Identitas (Grid 2 Kolom) --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm"
                        placeholder="Contoh: Bambang Pratma Putra Hadi">
                </div>

                {{-- Negara --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Negara
                    </label>
                    <input type="text"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                </div>

                {{-- Provinsi --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Provinsi
                    </label>
                    <input type="text"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                </div>

                {{-- Kota/Kabupaten --}}
                <div>
                    <label class="block text-sm sm:text-base font-bold text-gray-800 mb-2">
                        Kota/Kabupaten
                    </label>
                    <input type="text"
                        class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm">
                </div>

            </div>
        </div>

        {{-- Section Testimoni --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Testimoni
            </label>
            <textarea rows="6"
                class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-[#275931] focus:outline-none bg-white shadow-sm leading-relaxed"
                placeholder="Masukkan testimoni..."></textarea>
        </div>

        {{-- Section Foto Profile (Drag & Drop UI) --}}
        <div class="bg-gray-200/80 p-4 sm:p-5 rounded-xl shadow-sm border border-gray-300 mb-5">
            <label class="block text-sm sm:text-base font-bold text-gray-800 mb-3">
                Foto Profile
            </label>
            <div
                class="mt-2 flex justify-center rounded-lg border-2 border-dashed border-gray-400 px-6 py-12 hover:bg-gray-300/50 transition duration-200 ease-in-out cursor-pointer relative">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept=".png, .jpg, .jpeg">
                <div class="text-center">
                    {{-- Icon Cloud Upload --}}
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
