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

            {{-- Search Bar --}}
            @unless(isset($limit))
            <div class="mb-8 max-w-2xl mx-auto">
                <div class="relative">
                    {{-- Search Icon --}}
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    {{-- Input --}}
                    <input
                        type="text"
                        id="faq-search-input"
                        placeholder="Cari pertanyaan..."
                        autocomplete="off"
                        class="w-full pl-12 pr-12 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-800 text-sm sm:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent shadow-sm transition-all duration-300"
                    />

                    {{-- Clear Button --}}
                    <button
                        type="button"
                        id="faq-search-clear"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
                        style="display: none;"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Search result count --}}
                <p id="faq-search-count" class="text-xs text-gray-500 mt-2 pl-1 transition-opacity duration-300" style="display: none;"></p>
            </div>
            @endunless

            {{-- FAQ Container sekarang menggunakan lebar penuh section --}}
            <div class="space-y-4" id="faq-container">

                @php
                    // Jika ada variabel $limit, ambil 5, jika tidak ada, ambil semua
                    $displayFaqs = isset($limit) ? $faqs->take($limit) : $faqs;
                @endphp

                {{-- @foreach ($faqs as $faq) --}}
                @foreach ($displayFaqs as $faq)
                    <details
                        class="faq-item group bg-white border border-gray-200 rounded-xl p-2 transition-all duration-300 open:shadow-lg"
                        data-question="{{ strtolower($faq->question) }}"
                        data-answer="{{ strtolower(strip_tags($faq->answer)) }}">
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
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </details>
                @endforeach

                {{-- No Results Message --}}
                <div id="faq-no-results" class="text-center py-12" style="display: none;">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-gray-500 font-medium text-base">Tidak ada FAQ yang cocok</p>
                    <p class="text-gray-400 text-sm mt-1">Coba gunakan kata kunci lain</p>
                </div>

            </div>
        </section>
    </div>

    {{-- FAQ Search Script --}}
    @unless(isset($limit))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('faq-search-input');
            const clearBtn = document.getElementById('faq-search-clear');
            const countEl = document.getElementById('faq-search-count');
            const noResults = document.getElementById('faq-no-results');
            const faqItems = document.querySelectorAll('.faq-item');

            if (!searchInput || faqItems.length === 0) return;

            let debounceTimer;

            searchInput.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => filterFaqs(), 200);

                // Toggle clear button
                clearBtn.style.display = this.value.length > 0 ? 'flex' : 'none';
            });

            clearBtn.addEventListener('click', function () {
                searchInput.value = '';
                clearBtn.style.display = 'none';
                filterFaqs();
                searchInput.focus();
            });

            function filterFaqs() {
                const query = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                faqItems.forEach(function (item) {
                    const question = item.dataset.question || '';
                    const answer = item.dataset.answer || '';
                    const isMatch = query === '' || question.includes(query) || answer.includes(query);

                    if (isMatch) {
                        item.style.display = '';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                        visibleCount++;
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(-8px)';
                        setTimeout(() => {
                            if (!item.dataset.question.includes(searchInput.value.toLowerCase().trim()) &&
                                !item.dataset.answer.includes(searchInput.value.toLowerCase().trim()) &&
                                searchInput.value.trim() !== '') {
                                item.style.display = 'none';
                            }
                        }, 200);
                    }
                });

                // Show/hide no results
                if (query !== '' && visibleCount === 0) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }

                // Show/hide count
                if (query !== '') {
                    countEl.textContent = visibleCount + ' dari ' + faqItems.length + ' pertanyaan ditemukan';
                    countEl.style.display = 'block';
                } else {
                    countEl.style.display = 'none';
                }
            }
        });
    </script>
    @endunless

