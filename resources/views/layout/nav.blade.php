<header class="bg-[#FAFAFA] p-5 shadow-[0_6px_9px_rgba(0,0,0,0.25)] sticky z-[90] top-0 left-0">
    <nav class="bg-[#FAFAFA] fixed w-full z-20 top-0 start-0 border-b border-slate-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            {{-- Logo & Nama Perusahaan --}}
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets_img/logo-2.png') }}" class="h-11" alt="Logo BHOS Teknologi" />
                <span class="self-center text-xl text-slate-800 font-bold whitespace-nowrap hidden lg:block">
                    PT Grace Indo Pratama
                </span>
            </a>

            {{-- Tombol Mobile Menu Hamburger --}}
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-slate-600 rounded-lg md:hidden hover:bg-slate-200/50 focus:outline-none focus:ring-2 focus:ring-[#047857]"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </button>

            {{-- Menu Navigasi --}}
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-slate-200 rounded-lg bg-white md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">

                    {{-- Menu Home --}}
                    <li>
                        <a href="{{ route('landing_page.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('landing_page.index') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('landing_page.index') ? 'aria-current="page"' : '' !!}>
                            Home
                        </a>
                    </li>

                    {{-- Menu About Us --}}
                    <li>
                        <a href="{{ route('about_us.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('about_us.index') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('about_us.index') ? 'aria-current="page"' : '' !!}>
                            About Us
                        </a>
                    </li>

                    {{-- Menu Our Product --}}
                    <li>
                        <a href="{{ route('our_product.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('our_product.*') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('our_product.*') ? 'aria-current="page"' : '' !!}>
                            Our Product
                        </a>
                    </li>

                    {{-- Menu Licensing --}}
                    <li>
                        <a href="{{ route('company_licensing.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('company_licensing.index') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('company_licensing.index') ? 'aria-current="page"' : '' !!}>
                            Licensing
                        </a>
                    </li>

                    {{-- Menu News --}}
                    <li>
                        <a href="{{ route('news.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('news.*') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('news.*') ? 'aria-current="page"' : '' !!}>
                            News
                        </a>
                    </li>

                    {{-- Menu Feedback --}}
                    <li>
                        <a href="{{ route('feedback.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('feedback.index') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('feedback.index') ? 'aria-current="page"' : '' !!}>
                            Feedback
                        </a>
                    </li>

                    {{-- Menu FaQs --}}
                    <li>
                        <a href="{{ route('faqs.index') }}"
                            class="block py-2 px-3 rounded md:p-0 transition-colors {{ request()->routeIs('faqs.index') ? 'text-white bg-[#047857] md:bg-transparent md:text-[#047857] font-bold' : 'text-slate-600 hover:bg-slate-100 md:hover:bg-transparent md:hover:text-[#047857]' }}"
                            {!! request()->routeIs('faqs.index') ? 'aria-current="page"' : '' !!}>
                            FaQs
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
