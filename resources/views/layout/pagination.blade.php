@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="flex justify-center select-none">
        <ul class="inline-flex items-center space-x-2 text-sm font-medium">

            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span
                        class="inline-flex items-center justify-center px-4 h-10 text-slate-400 bg-slate-50 border border-slate-200/60 rounded-xl cursor-not-allowed opacity-60">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Prev
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="inline-flex items-center justify-center px-4 h-10 text-slate-600 bg-white border border-slate-200/80 rounded-xl hover:border-[#EA580C] hover:text-[#EA580C] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#EA580C]/20 group">
                        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-0.5 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Prev
                    </a>
                </li>
            @endif

            {{-- Element Angka Halaman --}}
            @foreach ($elements as $element)
                {{-- Pembatas Tiga Titik "..." --}}
                @if (is_string($element))
                    <li>
                        <span
                            class="flex items-center justify-center w-10 h-10 text-slate-400 bg-transparent tracking-widest">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Link Angka --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- Halaman Aktif (Premium Orange dengan Glowing Shadow) --}}
                            <li>
                                <span aria-current="page"
                                    class="flex items-center justify-center w-10 h-10 text-white bg-[#EA580C] border border-[#EA580C] font-bold rounded-xl shadow-lg shadow-[#EA580C]/20 scale-105 z-10">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            {{-- Halaman Biasa --}}
                            <li>
                                <a href="{{ $url }}"
                                    class="flex items-center justify-center w-10 h-10 text-slate-600 bg-white border border-slate-200/80 rounded-xl hover:border-[#EA580C] hover:text-[#EA580C] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#EA580C]/20">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="inline-flex items-center justify-center px-4 h-10 text-slate-600 bg-white border border-slate-200/80 rounded-xl hover:border-[#EA580C] hover:text-[#EA580C] hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#EA580C]/20 group">
                        Next
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-0.5 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <span
                        class="inline-flex items-center justify-center px-4 h-10 text-slate-400 bg-slate-50 border border-slate-200/60 rounded-xl cursor-not-allowed opacity-60">
                        Next
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
