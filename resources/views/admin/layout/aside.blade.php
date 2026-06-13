{{-- Desktop --}}
<aside
    class="hidden lg:flex flex-col bg-white lg:w-[432px] 2xl:w-[350px] h-screen z-[100] lg:sticky left-0 top-0 shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-5 overflow-hidden">

    {{-- header --}}
    <div class="flex items-center mb-6 shrink-0">
        <div class="flex items-center mr-4">
            <img src="{{ asset('assets_img/logo-2.png') }}" alt="Logo" class="h-12 w-auto">
        </div>

        <div class="text-left leading-tight">
            <div class="text-[20px] font-black tracking-wide">PT</div>
            <div class="text-[10px] font-semibold text-slate-500">GRACE INDO</div>
            <div class="text-[10px] font-semibold text-slate-500">PRATAMA</div>
        </div>
    </div>

    {{-- menu --}}
    <div
        class="menu flex-1 overflow-y-auto space-y-2 text-slate-700
            [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

        {{-- Dashboard --}}
        <a href="#"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-dashboard')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Dashboard</span>
        </a>

        {{-- Our Product --}}
        <a href="{{ route('admin.product.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-product')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-1 12H5V8h14v8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Our Product</span>
        </a>

        {{-- Company Licensing --}}
        <a href="{{ route('admin.licensing.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-licensing')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Company Licensing</span>
        </a>

        {{-- News --}}
        <a href="{{ route('admin.news.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-news')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 14v-2h12v2H6zm0-3V9h12v2H6zm0-3V6h12v2H6z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">News</span>
        </a>

        {{-- Testimoni --}}
        <a href="{{ route('admin.testimoni.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-testimoni')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Testimoni</span>
        </a>

        {{-- Feedback --}}
        <a href="{{ route('admin.feedback.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-feedback')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Feedback</span>
        </a>

        {{-- FaQs --}}
        <a href="{{ route('admin.faqs.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-faqs')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">FaQs</span>
        </a>

        {{-- Profile --}}
        <a href="{{ route('profile.edit') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-profile')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path d="M12 2a7 7 0 00-7 7v3a7 7 0 0014 0V9a7 7 0 00-7-7zm-7 19a7 7 0 0114 0H5z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Profile</span>
        </a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit"
                class="w-full text-left flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100">
                <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                    <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                        <path
                            d="M16 13v-2H7V8l-5 4 5 4v-3h9zm3-10H5c-1.1 0-2 .9-2 2v6h2V5h14v14H5v-6H3v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                    </svg>
                </span>
                <span class="font-semibold text-[14px]">Logout</span>
            </button>
        </form>

    </div>
</aside>

{{-- mobile --}}
<aside id="navbar-default"
    class="hidden bg-white w-[280px] sm:w-[320px] h-screen z-[100] fixed left-0 top-0 shadow-[0_4px_4px_rgba(0,0,0,0.25)] p-5 overflow-hidden flex flex-col">

    {{-- header --}}
    <div class="flex items-center justify-between mb-6 shrink-0">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets_img/logo-2.png') }}" alt="Logo" class="h-12 w-auto">
        </div>

        <div class="text-right leading-tight">
            <div class="text-[18px] font-black tracking-wide">PT</div>
            <div class="text-[10px] font-semibold text-slate-500">GRACE INDO</div>
            <div class="text-[10px] font-semibold text-slate-500">PRATAMA</div>
        </div>
    </div>

    {{-- menu --}}
    <div
        class="menu flex-1 overflow-y-auto space-y-2 text-slate-700
            [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

        {{-- Dashboard --}}
        <a href="#"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-dashboard')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Dashboard</span>
        </a>

        {{-- Our Product --}}
        <a href="{{ route('admin.product.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-product')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-1 12H5V8h14v8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Our Product</span>
        </a>

        {{-- Company Licensing --}}
        <a href="{{ route('admin.licensing.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-licensing')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Company Licensing</span>
        </a>

        {{-- News --}}
        <a href="{{ route('admin.news.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-news')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 14v-2h12v2H6zm0-3V9h12v2H6zm0-3V6h12v2H6z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">News</span>
        </a>

        {{-- Testimoni --}}
        <a href="{{ route('admin.testimoni.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-testimoni')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Testimoni</span>
        </a>

        {{-- Feedback --}}
        <a href="{{ route('admin.feedback.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-feedback')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Feedback</span>
        </a>

        {{-- FaQs --}}
        <a href="{{ route('admin.faqs.index') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-faqs')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">FaQs</span>
        </a>

        {{-- Profile --}}
        <a href="{{ route('profile.edit') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-profile')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path d="M12 2a7 7 0 00-7 7v3a7 7 0 0014 0V9a7 7 0 00-7-7zm-7 19a7 7 0 0114 0H5z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Profile</span>
        </a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit"
                class="w-full text-left flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100">
                <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                    <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                        <path
                            d="M16 13v-2H7V8l-5 4 5 4v-3h9zm3-10H5c-1.1 0-2 .9-2 2v6h2V5h14v14H5v-6H3v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                    </svg>
                </span>
                <span class="font-semibold text-[14px]">Logout</span>
            </button>
        </form>

    </div>
</aside>
