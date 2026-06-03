<header class="bg-white p-5 shadow-[0_6px_9px_rgba(0,0,0,0.25)] sticky z-[90] top-0 left-0">
    <nav class="bg-neutral-primary fixed w-full z-20 top-0 start-0 border-b border-default">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">Flowbite</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">

                    {{-- Menu Home --}}
                    <li>
                        <a href="{{ route('landing_page.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('landing_page.index') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('landing_page.index') ? 'aria-current="page"' : '' !!}>
                            Home
                        </a>
                    </li>

                    {{-- Menu About Us --}}
                    <li>
                        <a href="{{ route('about_us.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('about_us.index') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('about_us.index') ? 'aria-current="page"' : '' !!}>
                            About Us
                        </a>
                    </li>

                    {{-- Menu Our Product --}}
                    <li>
                        <a href="{{ route('our_product.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('our_product.*') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('our_product.*') ? 'aria-current="page"' : '' !!}>
                            Our Product
                        </a>
                    </li>

                    {{-- Menu Licensing --}}
                    <li>
                        <a href="{{ route('company_licensing.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('company_licensing.index') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('company_licensing.index') ? 'aria-current="page"' : '' !!}>
                            Licensing
                        </a>
                    </li>

                    {{-- Menu News --}}
                    <li>
                        <a href="{{ route('news.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('news.*') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('news.*') ? 'aria-current="page"' : '' !!}>
                            News
                        </a>
                    </li>

                    {{-- Menu Feedback --}}
                    <li>
                        <a href="{{ route('feedback.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('feedback.index') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('feedback.index') ? 'aria-current="page"' : '' !!}>
                            Feedback
                        </a>
                    </li>

                    {{-- Menu FaQs --}}
                    <li>
                        <a href="{{ route('faqs.index') }}"
                            class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('faqs.index') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                            {!! request()->routeIs('faqs.index') ? 'aria-current="page"' : '' !!}>
                            FaQs
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
