@extends('layout.master')

@section('content')
    {{-- Section Feedback Form --}}
    <div class="w-full bg-[#ECFDF5] py-10 lg:py-20">
        <section class="mx-auto max-w-screen-xl p-4 sm:p-6">

            {{-- Header Title & Subtitle --}}
            <div class="text-center mb-12 flex flex-col items-center gap-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Feedback</span> Form
                </h2>
                <p class="text-sm sm:text-base text-gray-600 max-w-2xl leading-relaxed px-2">
                    Kami sangat menghargai pengalaman Anda dalam menggunakan produk BHOS Ekstra. <br class="hidden sm:block">
                    Silakan isi form berikut untuk membantu kami meningkatkan kualitas produk dan layanan kami.
                </p>
            </div>

            {{-- Form Container: Dipastikan melebar penuh mengikuti batas max-w-screen-md --}}
            <form action="#" method="POST" class="space-y-6 w-full">

                {{-- Row 1: Nama Lengkap & Email (Grup 2 Kolom) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full">
                    {{-- Input Nama Lengkap --}}
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-base font-bold text-gray-800">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            class="bg-white border-0 text-gray-900 text-base rounded-2xl focus:ring-2 focus:ring-[#047857] block w-full p-4 shadow-[0_4px_20px_rgba(0,0,0,0.06)] transition-all focus:outline-none"
                            required>
                    </div>

                    {{-- Input Email --}}
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-base font-bold text-gray-800">Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-white border-0 text-gray-900 text-base rounded-2xl focus:ring-2 focus:ring-[#047857] block w-full p-4 shadow-[0_4px_20px_rgba(0,0,0,0.06)] transition-all focus:outline-none"
                            required>
                    </div>
                </div>

                {{-- Row 2: Subject --}}
                <div class="w-full">
                    <label for="subject" class="block mb-2 text-base font-bold text-gray-800">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="bg-white border-0 text-gray-900 text-base rounded-2xl focus:ring-2 focus:ring-[#047857] block w-full p-4 shadow-[0_4px_20px_rgba(0,0,0,0.06)] transition-all focus:outline-none"
                        required>
                </div>

                {{-- Row 3: Message --}}
                <div class="w-full">
                    <label for="message" class="block mb-2 text-base font-bold text-gray-800">Message</label>
                    <textarea id="message" name="message" rows="6"
                        class="bg-white border-0 text-gray-900 text-base rounded-2xl focus:ring-2 focus:ring-[#047857] block w-full p-4 shadow-[0_4px_20px_rgba(0,0,0,0.06)] transition-all focus:outline-none resize-y"
                        required></textarea>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4 flex justify-start">
                    <button type="submit"
                        class="w-full px-10 py-4 text-white bg-[#047857] hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-800 font-bold rounded-xl text-base text-center shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        Kirim Feedback
                    </button>
                </div>

            </form>

        </section>
    </div>

    @include('testimoni.index')
@endsection
