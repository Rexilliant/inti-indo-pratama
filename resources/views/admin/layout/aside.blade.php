{{-- Desktop --}}
<aside class="hidden lg:flex flex-col bg-white lg:w-[300px] h-screen sticky left-0 top-0 shadow-md p-5">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-xl font-bold">LOGO</h1>
    </div>

    {{-- Menu --}}
    <div
        class="menu flex-1 overflow-y-auto space-y-2 text-slate-700
        [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

        {{-- Menu 1 --}}
        <a href="#"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-1')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Menu 1</span>
        </a>

        {{-- Menu 2 + Sub Menu --}}
        <div x-data="{ open: false }">

            <button @click="open = !open"
                class="w-full flex gap-3 items-center justify-between px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100">

                <div class="flex gap-3 items-center">
                    <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                        <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-1 12H5V8h14v8z" />
                        </svg>
                    </span>

                    <span class="font-semibold text-[14px]">Menu 2</span>
                </div>

                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>

            </button>

            <div x-show="open" x-transition class="ml-12 mt-1 space-y-1">

                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-slate-100 @yield('submenu-1')">
                    Sub Menu 1
                </a>

                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-slate-100 @yield('submenu-2')">
                    Sub Menu 2
                </a>

            </div>
        </div>

        {{-- Menu 3 --}}
        <a href="#"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-3')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Menu 3</span>
        </a>

        {{-- Menu 4 --}}
        <a href="{{ route('profile.edit') }}"
            class="cursor-pointer flex gap-3 items-center px-3 py-2 rounded-xl duration-300 ease-in-out hover:bg-slate-100 @yield('menu-4')">
            <span class="h-8 w-8 rounded-full bg-slate-200 grid place-items-center">
                <svg class="fill-slate-600" width="18" height="18" viewBox="0 0 24 24">
                    <path
                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 14v-2h12v2H6zm0-3V9h12v2H6zm0-3V6h12v2H6z" />
                </svg>
            </span>
            <span class="font-semibold text-[14px]">Profile</span>
        </a>

    </div>

    {{-- Logout --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-100">

            <span class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center">
                🚪
            </span>

            <span class="font-semibold">
                Logout
            </span>

        </button>
    </form>

</aside>
