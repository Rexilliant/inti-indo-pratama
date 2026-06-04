@extends('layout.master')

@section('content')
    {{-- Section Hero: Perizinan & Legalitas Usaha --}}
    {{-- Menggunakan warna latar hijau sangat lembut (mirip dengan desain) --}}
    <div class="relative flex min-h-[500px] w-full items-center bg-[#ECFDF5] bg-cover bg-left lg:bg-center bg-no-repeat md:min-h-[700px] object-right overflow-hidden"
        style="background-image: url('{{ asset('assets_img/bg-licensing.png') }}');" aria-label="petani modern">

        {{-- Elemen Dekorasi Background (Opsional, untuk meniru lengkungan/blob abstrak di gambar) --}}
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-[#D1F4E0] rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 right-0 w-96 h-96 bg-[#D1F4E0] rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform translate-x-1/3 translate-y-1/3 pointer-events-none">
        </div>

        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 relative z-10 py-15">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                {{-- Kolom Kiri: Konten Teks & Badge --}}
                <div class="flex flex-col justify-center text-left">

                    {{-- Judul Utama --}}
                    <h2
                        class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#047857] mb-3 lg:mb-4 tracking-tight leading-tight">
                        Perizinan & Legalitas Usaha
                    </h2>

                    {{-- Subjudul --}}
                    <p class="text-sm sm:text-base lg:text-lg font-bold text-[#047857] mb-5 lg:mb-6">
                        Komitmen kami Terhadap Transparansi dan Kepercayaan
                    </p>

                    {{-- Paragraf Deskripsi --}}
                    <p class="text-base sm:text-lg text-gray-700 leading-relaxed mb-8 lg:mb-10">
                        PT Grace Indo Pratama beroperasi secara resmi dan telah dilengkapi dengan berbagai dokumen perizinan
                        sesuai dengan ketentuan yang berlaku. Kami berkomitmen untuk menjaga transparansi serta memberikan
                        rasa aman dan kepercayaan kepada seluruh mitra dan pelanggan.
                    </p>

                    {{-- Badge / Info Card --}}
                    <div
                        class="inline-flex items-center gap-4 bg-white border border-gray-200 rounded-2xl p-4 sm:p-5 lg:p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] max-w-lg transition-transform hover:-translate-y-1 duration-300">
                        {{-- Ikon Shield (Bisa diganti dengan SVG asli dari desainer) --}}
                        <div
                            class="shrink-0 flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 bg-[#F4FDF9] rounded-full border border-[#047857]/20">
                            <img src="{{ asset('assets_img/shield.png') }}" alt="Trusted">
                        </div>
                        {{-- Teks Badge --}}
                        <p class="text-sm sm:text-base font-bold text-[#047857] leading-snug">
                            Seluruh Dokumen Dibawah Ini adalah Asli dan Sah Sesuai dengan Peraturan yang Berlaku di
                            Indonesia
                        </p>
                    </div>

                </div>

            </div>
        </section>
    </div>

    {{-- Section Legalitas / Dokumen Perizinan --}}
    <div class="w-full bg-[#ECFDF5] py-10 lg:py-20 overflow-hidden">
        <section class="mx-auto max-w-screen-xl px-0 lg:px-8">

            {{-- Header Title --}}
            <div class="text-center mb-12 flex flex-col items-center gap-2 md:gap-3 px-4 sm:px-6 lg:px-0">
                <span class="text-sm md:text-base font-bold text-[#047857] uppercase tracking-wider">
                    DOKUMEN PERIZINAN
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#047857] tracking-tight">
                    Legalitas yang Kami Miliki
                </h2>
                <p class="text-base sm:text-lg text-gray-700 max-w-2xl mt-2 leading-relaxed">
                    Berikut adalah Dokumen Perizinan yang Dimiliki Oleh PT Grace Indo Pratama
                </p>
            </div>

            {{-- Container Grid/Slider --}}
            <div
                class="flex lg:grid lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 overflow-x-auto lg:overflow-visible snap-x snap-mandatory px-4 sm:px-6 lg:px-0 pb-8 pt-2 
                        [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                {{-- Looping Card Dokumen (Dibuat 6 kali) --}}
                @for ($i = 0; $i < 6; $i++)
                    <div
                        class="shrink-0 w-[90%] sm:w-[45%] lg:w-auto snap-center lg:snap-align-none bg-white border border-gray-200 rounded-3xl p-6 sm:p-8 shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">

                        {{-- Judul Dokumen --}}
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-6 leading-snug">
                            Nomor Induk Berusaha<br>(NIB)
                        </h3>

                        {{-- Konten Utama (Gambar & Teks) --}}
                        <div class="flex items-start gap-4 mb-8">
                            {{-- Thumbnail Dokumen --}}
                            <div class="w-20 sm:w-24 shrink-0 items-center">
                                {{-- Ganti dengan path gambar dokumen asli --}}
                                <img src="{{ asset('assets_img/licensing.png') }}" alt="Thumbnail NIB"
                                    class="w-full h-auto object-contain">
                            </div>

                            {{-- Deskripsi & Status --}}
                            <div class="flex flex-col gap-3">
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    Dokumen resmi yang mentakan identitas dan legalitas usaha PT Grace Indo Pratama
                                </p>

                                {{-- Badge Status Verifikasi --}}
                                <div class="flex items-center gap-1.5 text-[#047857] font-bold text-sm">
                                    <img src="{{ asset('assets_img/trust.png') }}" alt="Trusted" class="w-10 h-10">
                                    Aktif & Terverifikasi
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons (Didorong ke paling bawah menggunakan mt-auto) --}}
                        <div class="mt-auto grid grid-cols-2 gap-3">
                            {{-- Button 1: Outline (Lihat Dokumen) --}}
                            <button type="button"
                                class="flex items-center justify-center gap-1.5 px-2 sm:px-4 py-2.5 text-xs sm:text-sm font-bold text-[#047857] bg-white border border-[#047857] rounded-xl hover:bg-green-50 focus:ring-4 focus:outline-none focus:ring-green-100 transition-colors lg:whitespace-nowrap">
                                <svg class="w-4 h-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Lihat Dokumen
                            </button>

                            {{-- Button 2: Solid (Unduh Dokumen) --}}
                            <button type="button"
                                class="flex items-center justify-center gap-1.5 px-2 sm:px-4 py-2.5 text-xs sm:text-sm font-bold text-white bg-[#047857] border border-[#047857] rounded-xl hover:bg-[#0369a1] focus:ring-4 focus:outline-none focus:ring-green-300 transition-colors lg:whitespace-nowrap">
                                Unduh Dokumen
                                <svg class="w-4 h-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                </svg>
                            </button>
                        </div>

                    </div>
                @endfor

            </div>

        </section>
    </div>

    {{-- Section Banner Kepercayaan & Kepatuhan --}}
    <div class="w-full bg-[#ECFDF5] pb-15 lg:pb-30">
        <section class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

            {{-- Card Container --}}
            <div
                class="relative bg-white border border-gray-200 rounded-[2rem] p-6 sm:p-8 lg:p-10 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col md:flex-row items-center md:items-stretch gap-6 lg:gap-10 overflow-hidden">

                {{-- Bagian Kiri: Ikon (Shield + Leaves) --}}
                <div class="shrink-0 flex items-center justify-center md:self-center">
                    <div
                        class="flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24 rounded-full border border-[#047857]/40 bg-[#F4FDF9]">
                        {{-- Menggunakan SVG Shield Check mirip desain, warnanya di-set ke hijau #047857 --}}
                        <img src="{{ asset('assets_img/shield.png') }}" alt="Trusted">
                    </div>
                </div>

                {{-- Bagian Tengah: Teks Konten --}}
                <div class="flex-1 flex flex-col justify-center text-center md:text-left z-10">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3 sm:mb-4 tracking-tight">
                        <span class="text-[#047857]">Kepercayaan</span> dan Kepatuhan
                    </h2>
                    <p class="text-sm sm:text-base lg:text-[16px] text-gray-600 leading-relaxed">
                        Kami memastikan seluruh proses operasional perusahaan berjalan sesuai dengan standar dan regulasi
                        yang berlaku. Dengan legalitas yang lengkap kami berkomitmen untuk menjadi mitra terpercaya dalam
                        mendukung sektor pertanian modern di Indonesia
                    </p>
                </div>

                {{-- Bagian Kanan: Gambar Maskot Pekerja --}}
                <div class="shrink-0 flex justify-center mt-4 md:mt-0 md:-my-10 lg:-my-12">
                    {{-- 
                        Ganti dengan path maskot Anda. 
                        Tinggi gambar dimaksimalkan, tapi lebarnya dibatasi agar tidak merusak layout flex 
                    --}}
                    <img src="{{ asset('assets_img/maskot-worker.png') }}" alt="Maskot Pekerja Kepercayaan"
                        class="w-32 sm:w-40 lg:w-48 h-auto object-contain drop-shadow-md transition-transform hover:scale-105 duration-300">
                </div>

            </div>

        </section>
    </div>

    @include('faqs.faqs')
    @include('testimoni.index')
@endsection
