@extends('admin.layout.master')

{{-- sidebar active (sesuaikan menu kamu) --}}
@section('open-news', 'open')
@section('menu-news', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Definisikan Array Data Mockup --}}
    @php
        $tableData = [
            [
                'tanggal' => '07/06/2026',
                'judul' => 'Terobosan Baru Pupuk Nano',
                'kategori' => 'Inovasi dan Riset',
            ],
            [
                'tanggal' => '05/06/2026',
                'judul' => 'Tips Menjaga Tanaman di Musim Hujan',
                'kategori' => 'Tips Pertanian',
            ],
            [
                'tanggal' => '01/06/2026',
                'judul' => 'Peresmian Kantor Cabang Baru',
                'kategori' => 'Kabar Perusahaan',
            ],
        ];
    @endphp

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <a href="#" class="text-[#2D37CC] hover:underline text-lg sm:text-2xl font-bold">News</a>
        </div>
    </section>

    {{-- Top Bar / Filter Form --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="#" method="GET" class="mb-2 sm:mb-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" placeholder="Cari..."
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="date"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Tampilkan</label>
                    <select name="per_page"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none">
                        <option value="10" selected>10 / halaman</option>
                        <option value="25">25 / halaman</option>
                    </select>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 w-full lg:col-span-1 pt-2 sm:pt-0">
                    <button type="button"
                        class="w-full sm:w-auto flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition text-center">Filter</button>
                    <a href="#"
                        class="w-full sm:w-auto flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 transition text-center">Reset</a>
                </div>
            </div>
        </form>
    </section>

    {{-- Main Content --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <div class="mb-4 sm:mb-5 flex items-center justify-end">
            <a href="{{ route('admin.news.create') }}"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-lg bg-[#2D2ACD] px-6 py-2 text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <span class="text-lg leading-none">+</span> Tambah Baru
            </a>
        </div>

        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr class="[&>th]:border-b [&>th]:border-gray-500">
                            <th scope="col" class="px-6 py-4 font-extrabold text-left w-48">Tanggal</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Judul Berita</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Kategori</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200 divide-y divide-gray-500">
                        @foreach ($tableData as $data)
                            <tr class="[&>td]:border-b [&>td]:border-gray-400 hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $data['tanggal'] }}</td>
                                <td class="px-6 py-4 font-medium">{{ $data['judul'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded bg-white text-xs font-semibold border border-gray-300">
                                        {{ $data['kategori'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#"
                                        class="text-blue-600 hover:underline">Sunting</a>
                                    <span class="mx-1">|</span>
                                    <form action="#" class="inline-block form-delete">
                                        <button type="submit"
                                            class="text-red-600 hover:underline cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data yang dihapus tidak bisa dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    confirmButtonText: 'Ya, hapus'
                });
            });
        });
    </script>
@endsection
