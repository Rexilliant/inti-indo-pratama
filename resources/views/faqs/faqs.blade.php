    {{-- section faq (statis, lebar mengikuti max-w-screen-xl) --}}
    <div class="w-full bg-[#ECFDF5] pb-10 lg:pb-20">

        {{-- Section menggunakan max-w-screen-xl untuk konsistensi lebar di desktop --}}
        <section class="mx-auto max-w-screen-xl p-4 md:p-5">

            {{-- header faq --}}
            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                    Kamu Punya Pertanyaan?
                </h2>
                <p class="text-sm sm:text-base font-medium text-[#444545]">
                    Sambil mikir-mikir, mungkin kamu juga perlu membaca beberapa<br class="hidden sm:block">
                    FAQ seputar BHOS Teknologi?
                </p>
            </div>

            {{-- FAQ Container sekarang menggunakan lebar penuh section --}}
            <div class="space-y-4">

                @foreach ($faqs as $faq)
                <details
                    class="group bg-white border border-gray-200 rounded-xl p-2 transition-all duration-300 open:shadow-lg">
                    <summary
                        class="flex items-center justify-between font-semibold text-gray-800 cursor-pointer p-4 select-none">
                        <span>{{ $faq->question }}</span>
                        <svg class="w-5 h-5 text-[#EA580C] transition-transform group-open:rotate-180"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </summary>
                    <div class="px-4 pb-4 text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ $faq->answer }}
                    </div>
                </details>
                @endforeach

            </div>
        </section>
    </div>
