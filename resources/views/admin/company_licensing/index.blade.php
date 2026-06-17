@extends('admin.layout.master')

{{-- sidebar active (sesuaikan menu kamu) --}}
@section('open-licensing', 'open')
@section('menu-licensing', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <a href="#" class="text-[#2D37CC] hover:underline text-lg sm:text-2xl font-bold">Company Licensing</a>
        </div>
    </section>

    {{-- Top Bar / Filter Form (Sudah benerin action & button) --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="{{ route('admin.company_licensing.index') }}" method="GET" class="mb-2 sm:mb-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..."
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="date" value="{{ request('date') }}"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Tampilkan</label>
                    <select name="per_page"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 / halaman</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 / halaman</option>
                    </select>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 w-full lg:col-span-1 pt-2 sm:pt-0">
                    <button type="submit"
                        class="w-full sm:w-auto flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition text-center">
                        Filter
                    </button>
                    <a href="{{ route('admin.company_licensing.index') }}"
                        class="w-full sm:w-auto flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 transition text-center">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </section>

    {{-- Main Content --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <div class="mb-4 sm:mb-5 flex items-center justify-end">
            <a href="{{ route('admin.company_licensing.create') }}"
                class="bg-[#2D2ACD] px-6 py-2 rounded-lg text-sm font-semibold text-white">+ Tambah Baru</a>
        </div>

        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr>
                            <th class="px-6 py-4 font-extrabold w-48">Tanggal</th>
                            <th class="px-6 py-4 font-extrabold">Nama Perizinan</th>
                            <th class="px-6 py-4 font-extrabold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200 divide-y divide-gray-500">
                        @forelse ($licenses as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 border-b border-gray-400">{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 border-b border-gray-400">{{ $item->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-400 text-center">
                                    <a href="{{ route('admin.company_licensing.edit', $item->id) }}"
                                        class="text-blue-600 hover:underline">Sunting</a>
                                    <span class="mx-1">|</span>
                                    <form action="{{ route('admin.company_licensing.destroy', $item->id) }}" method="POST"
                                        class="inline-block form-delete">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- Tabel udah ditutup, gak ada </table> double lagi --}}
            </div>
        </div>
        @include('admin.layout.pagination', ['paginator' => $licenses])
    </section>
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#53BF6A',
                confirmButtonText: 'OK'
            });
        @endif

        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data Licensing ini akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
