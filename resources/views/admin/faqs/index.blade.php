@extends('admin.layout.master')

{{-- sidebar active (sesuaikan menu kamu) --}}
@section('open-faqs', 'open')
@section('menu-faqs', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <a href="#" class="text-[#2D37CC] hover:underline text-lg sm:text-2xl font-bold">FaQs</a>
        </div>
    </section>

    {{-- Top Bar / Filter Form --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="#" method="GET" class="mb-2 sm:mb-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">

                {{-- Search Pertanyaan --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">
                        Pencarian Pertanyaan
                    </label>
                    <input type="text" name="search" placeholder="Cari pertanyaan..."
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>

                {{-- Date Filter --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">
                        Tanggal
                    </label>
                    <input type="date" name="date"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>

                {{-- Per Page --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">
                        Tampilkan
                    </label>
                    <select name="per_page"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none">
                        <option value="10" selected>10 / halaman</option>
                        <option value="25">25 / halaman</option>
                        <option value="50">50 / halaman</option>
                        <option value="100">100 / halaman</option>
                    </select>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-2 w-full lg:col-span-1 pt-2 sm:pt-0">
                    <button type="button"
                        class="w-full sm:w-auto flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition text-center">
                        Filter
                    </button>
                    <a href="#"
                        class="w-full sm:w-auto flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 transition text-center">
                        Reset
                    </a>
                </div>

            </div>
        </form>
    </section>

    {{-- Main Content --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">

        {{-- Tombol Tambah Baru --}}
        <div class="mb-4 sm:mb-5 flex items-center justify-end">
            <a href="{{ route('admin.faqs.create') }}"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-lg bg-[#2D2ACD] px-6 py-2 text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <span class="text-lg leading-none">+</span>
                Tambah Baru
            </a>
        </div>

        {{-- Tabel --}}
        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">
            <div class="overflow-x-auto">
                {{-- Tambahan whitespace-nowrap agar tabel tidak squished di layar kecil --}}
                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr class="[&>th]:border-b [&>th]:border-gray-500">
                            <th scope="col" class="px-6 py-4 font-extrabold text-left w-48">Tanggal</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Pertanyaan</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-center w-48">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-200 divide-y divide-gray-500">
                        {{-- Baris Data Statis 1 --}}
                        @forelse ($faqs as $faq)
                            <tr class="[&>td]:border-b [&>td]:border-gray-400 hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $faq->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 font-medium whitespace-normal min-w-[250px]">{{ $faq->question }}</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                                        class="text-blue-600 hover:underline">Sunting</a>
                                    <span class="mx-1">|</span>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="inline-block form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center">No data found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination Mockup (Statis) --}}
            <div
                class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between bg-gray-200 px-4 py-3 sm:py-4 border-t border-gray-400 text-center sm:text-left">
                <div class="text-xs sm:text-sm font-semibold text-gray-800">
                    Showing 1–3 of 15
                </div>
                <div class="w-full md:w-auto overflow-x-auto flex justify-center sm:justify-start">
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-400 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page"
                            class="relative z-10 inline-flex items-center bg-[#53BF6A] px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#53BF6A]">1</a>
                        <a href="#"
                            class="relative inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-400 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <a href="#"
                            class="relative hidden items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-400 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                        <span
                            class="relative inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-400 focus:outline-offset-0">...</span>
                        <a href="#"
                            class="relative hidden items-center px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-400 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">5</a>
                        <a href="#"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-400 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const targetForm = this;

                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data FAQ yang dihapus tidak bisa dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        targetForm.submit();
                    }
                });
            });
        });
    </script>
@endsection
