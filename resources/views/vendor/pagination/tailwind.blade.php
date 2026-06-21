@if ($paginator->hasPages())
    <div
        class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between bg-gray-200 px-4 py-3 sm:py-4 border-t border-gray-400 text-center sm:text-left">

        {{-- Info --}}
        <div class="text-xs sm:text-sm font-semibold text-gray-800">
            Showing {{ $paginator->firstItem() }}
            – {{ $paginator->lastItem() }}
            of {{ $paginator->total() }}
        </div>

        {{-- Pagination --}}
        <div class="w-full md:w-auto overflow-x-auto flex justify-center sm:justify-start">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-400">
                        <span class="sr-only">Previous</span>
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-400 hover:bg-gray-50 focus:z-20">
                        <span class="sr-only">Previous</span>
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Pages --}}
                @foreach ($elements as $element)

                    {{-- Dots --}}
                    @if (is_string($element))
                        <span
                            class="relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-400">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Pages --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)

                            @if ($page == $paginator->currentPage())
                                <span
                                    class="relative z-10 inline-flex items-center bg-[#53BF6A] px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-white">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="relative inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-400 hover:bg-gray-50">
                                    {{ $page }}
                                </a>
                            @endif

                        @endforeach
                    @endif

                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-400 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-400">
                        <span class="sr-only">Next</span>
                        <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                @endif

            </nav>
        </div>

    </div>
@endif