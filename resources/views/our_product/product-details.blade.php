@extends('layout.master')

@section('content')
    {{-- tentang kami (mobile + ipad aman) --}}
    <div class="w-full bg-[#EEFBF5] py-10 md:py-16">
        <section class="mx-auto max-w-screen-xl p-4 md:p-5 text-center">
            <h1 class="text-2xl sm:text-4xl md:text-5xl">
                <span class="font-bold text-[#047857]">BHOS</span>
                <span class="font-bold text-black">Ekstra</span>
            </h1>
            <div class="text-sm sm:text-base font-medium text-[#444545] leading-relaxed pt-2">
                <p>
                    Kami menghadirkan berbagai solusi pupuk berbasis teknologi Nano
                    Dirancang untuk berbagai jenis tanaman dan kebutuhan pertanian modern.
                </p>
            </div>

        </section>

        <section class="mx-auto max-w-screen-xl p-4 md:p-5">
            <h2 class="text-2xl sm:text-3xl md:text-4xl pb-5 sm:pb-8">
                <span class="font-bold text-[#047857]">Keunggulan</span>
                <span class="font-bold text-black">Produk</span>
            </h2>
            <div class="flex flex-col-reverse lg:grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-16">

                {{-- content left --}}
                <div class="flex w-full flex-col gap-4 sm:gap-6">
                    {{-- description --}}
                    <div
                        class="space-y-3 sm:space-y-4 text-sm sm:text-base font-medium text-[#444545] leading-relaxed pt-5">
                        <p>
                            BHOS Ekstra adalah pupuk berbasis teknologi nano yang diformulasikan untuk mendukung peningkatan
                            produktivitas tanaman secara menyeluruh pada berbagai sektor pertanian, termasuk hortikultura,
                            tanaman pangan, dan perkebunan.
                            Keunggulan produk ini meliputi:
                        </p>
                    </div>

                    <ol class="list-decimal pl-5 sm:pl-6 space-y-4 sm:space-y-2 marker:text-gray-900 marker:font-bold">

                        {{-- Item 1: Kalium --}}
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Berteknologi Nano sehingga bisa langsung diserap tanaman
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Mampu menetralkan Ph Tanah dalam waktu ± 4 Jam
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Sebagai katalis asam - basa
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Membantu memperbanyak percabangan akar
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Mebantu pertumbuhan batang
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Membantu pembentukan klorofil dan fotosintesis
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Membantu mekasimalkan hasil panen petani
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Memperbaiki jaringan sel tanaman sehingga tanaman lebih kebal terhadap penyakit
                            </span>
                        </li>
                        <li>
                            <span class="text-gray-600 block mt-1 sm:mt-0">
                                Cocok untuk semua jenis tanaman dan lain-lain
                            </span>
                        </li>
                    </ol>

                </div>

                {{-- image right --}}
                <div class="w-full items-center">
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070&auto=format&fit=crop"
                        alt="Fasilitas Pabrik"
                        class="h-auto w-full rounded-[1.5rem] sm:rounded-[2rem] object-cover shadow-xl">
                </div>

            </div>
        </section>
    </div>

    {{-- Section Komposisi Produk --}}
    <div class="w-full bg-[#F4FDF9] py-12 md:py-20">
        <section class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl lg:p-4 lg:p-5 lg:w-full">

            {{-- Header Title --}}
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Komposisi</span> Produk
                </h2>
            </div>

            {{-- Deskripsi Utama --}}
            <div class="text-base sm:text-lg text-gray-700 leading-relaxed mb-6 sm:mb-8">
                <p>
                    BHOS Ekstra diformulasikan dengan kombinasi unsur hara makro dan mikro yang seimbang untuk mendukung
                    pertumbuhan tanaman secara optimal. Setiap kandungan dirancang untuk bekerja secara sinergis dalam
                    meningkatkan penyerapan nutrisi, memperkuat struktur tanaman, serta mendukung proses metabolisme
                    tanaman.
                </p>
            </div>

            {{-- Daftar Komposisi --}}
            <div class="text-base sm:text-lg text-gray-800 leading-relaxed">
                <p class="mb-3 sm:mb-4 font-semibold text-gray-900">Komposisi:</p>

                {{-- Unordered List dengan marker bawaan Tailwind --}}
                <ul class="list-disc pl-5 sm:pl-6 space-y-4 sm:space-y-2 marker:text-gray-600">

                    {{-- Item 1: Kalium --}}
                    <li>
                        <span class="font-semibold text-gray-900 block sm:inline">Kalium (K<sub>2</sub>O) 11.42%</span>
                        <span class="text-gray-600 block mt-1 sm:mt-0">Berperan dalam meningkatkan kualitas hasil panen
                            serta ketahanan tanaman terhadap stres.</span>
                    </li>

                    {{-- Item 2: Magnesium --}}
                    <li>
                        <span class="font-semibold text-gray-900 block sm:inline">Magnesium (MgO) 6.3%</span>
                        <span class="text-gray-600 block mt-1 sm:mt-0">Mendukung pembentukan klorofil dan meningkatkan
                            efisiensi fotosintesis.</span>
                    </li>

                    {{-- Item 3: Kalsium --}}
                    <li>
                        <span class="font-semibold text-gray-900 block sm:inline">Kalsium (CaO) 2.93%</span>
                        <span class="text-gray-600 block mt-1 sm:mt-0">Memperkuat struktur sel tanaman dan membantu
                            pertumbuhan akar serta batang.</span>
                    </li>

                    {{-- Item 4: Fosfor --}}
                    <li>
                        <span class="font-semibold text-gray-900 block sm:inline">Fosfor (P<sub>2</sub>O<sub>5</sub>)
                            6.82%</span>
                        <span class="text-gray-600 block mt-1 sm:mt-0">Berperan penting dalam pembentukan energi dan
                            pertumbuhan akar.</span>
                    </li>

                    {{-- Item 5: Sulfur --}}
                    <li>
                        <span class="font-semibold text-gray-900 block sm:inline">Sulfur (S) 4.33%</span>
                        <span class="text-gray-600 block mt-1 sm:mt-0">Mendukung pembentukan protein dan meningkatkan
                            kualitas hasil tanaman.</span>
                    </li>

                    {{-- Item 6: pH --}}
                    <li>
                        <span class="font-semibold text-gray-900 block sm:inline">pH 11.94</span>
                        <span class="text-gray-600 block mt-1 sm:mt-0">Membantu menstabilkan kondisi tanah dan mendukung
                            ketersediaan unsur hara.</span>
                    </li>

                </ul>
            </div>

        </section>
    </div>

    {{-- Rekomendasi Pemakaian --}}
    <div class="w-full bg-[#F4FDF9] py-12 md:py-20">
        <section class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl lg:p-4 lg:p-5 lg:w-full">

            {{-- Header Title --}}
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Rekomendasi</span> Pemakaian
                </h2>
            </div>

            {{-- Deskripsi Utama --}}
            <div class="text-base sm:text-lg text-gray-700 leading-relaxed mb-6 sm:mb-8">
                <p>
                    Gunakan BHOS Ekstra sesuai dengan jenis dan umur tanaman untuk mendapatkan hasil yang optimal. Tabel
                    berikut memberikan panduan dosis dan frekuensi aplikasi yang disarankan untuk mendukung pertumbuhan
                    tanaman serta meningkatkan hasil panen.
                </p>
            </div>
        </section>
    </div>

    {{-- Panduan Penggunaan --}}
    <div class="w-full bg-[#F4FDF9]">
        <section class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl lg:p-4 lg:p-5 lg:w-full">

            {{-- Header Title --}}
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-gray-900 tracking-tight">
                    <span class="text-[#047857]">Panduan</span> Penggunaan
                </h2>
            </div>

            {{-- Deskripsi Utama --}}
            <div class="text-base sm:text-lg text-gray-700 leading-relaxed mb-6 sm:mb-8">
                <p>
                    <span class="font-bold">BHOS Ekstra</span> merupakan pupuk cair berbasis teknologi nano yang
                    penggunaannya harus dicampurkan dengan air
                    sebelum diaplikasikan ke tanaman. Penggunaan yang tepat akan membantu meningkatkan efektivitas
                    penyerapan nutrisi serta mendukung pertumbuhan tanaman secara optimal.
                </p>
            </div>

            {{-- Daftar Komposisi --}}
            <div class="text-base sm:text-lg text-gray-800 leading-relaxed">
                <p class="mb-3 sm:mb-4 font-semibold text-gray-900">Panduan Penggunaan:</p>

                {{-- Unordered List dengan marker bawaan Tailwind --}}
                <ol class="list-decimal pl-5 sm:pl-6 space-y-4 sm:space-y-2 marker:text-gray-900 marker:font-bold">

                    {{-- Item 1: Kalium --}}
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Siapkan air bersih sesuai kebutuhan.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Campurkan BHOS Ekstra ke dalam air sesuai dosis yang dianjurkan.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Aduk hingga larutan tercampur secara merata.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Aplikasikan larutan dengan cara disemprotkan atau disiramkan ke tanaman, terutama pada bagian
                            daun dan area perakaran.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Lakukan aplikasi secara rutin sesuai dengan frekuensi yang dianjurkan.
                        </span>
                    </li>

                </ol>

                <p class="mb-3 sm:mb-4 font-semibold text-gray-900 pt-10">Waktu Aplikasi:</p>
                <p>
                    Disarankan dilakukan pada pagi hari atau sore hari untuk menghindari penguapan yang berlebihan dan
                    memastikan penyerapan nutrisi lebih optimal.
                </p>
                <p>
                    Catatan:
                </p>
                <ul class="list-disc pl-5 sm:pl-6 space-y-4 sm:space-y-1 marker:text-gray-600">

                    {{-- Item 1: Kalium --}}
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Gunakan sesuai dosis yang dianjurkan.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Hindari penggunaan pada saat cuaca terik.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Kocok produk sebelum digunakan.
                        </span>
                    </li>
                    <li>
                        <span class="text-gray-600 block mt-1 sm:mt-0">
                            Simpan di tempat yang sejuk dan terhindar dari sinar matahari langsung.
                        </span>
                    </li>
                </ul>

            </div>

        </section>
    </div>

    @include('faqs.faqs')
    @include('testimoni.index')
@endsection
