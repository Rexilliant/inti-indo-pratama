@extends('admin.layout.master')

@section('open-error-log', 'open')
@section('menu-error-log', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')
@section('title', 'Error Log')

@section('content')

    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <span class="text-[#2D37CC] text-lg sm:text-2xl font-bold">
                Error Logs
            </span>
        </div>
    </section>

    {{-- FILTER --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">

        <form action="{{ route('admin.error-log.index') }}" method="GET">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">

                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Pesan</label>
                    <input type="text" name="message" value="{{ request('message') }}" placeholder="Cari Pesan..."
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
                        class="w-full sm:w-auto flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition">
                        Filter
                    </button>

                    <a href="{{ route('admin.error-log.index') }}"
                        class="w-full sm:w-auto flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 transition">
                        Reset
                    </a>

                </div>

            </div>
        </form>
    </section>

    {{-- ACTION BAR (DELETE 30 TERLAMA) --}}
    <section class="mb-4 flex justify-end">

        <form id="delete30Form" action="{{ route('admin.error-log.delete-last-30') }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="bg-red-700 hover:bg-red-900 text-white px-5 py-2 rounded-lg text-sm font-semibold shadow">
                🗑 Hapus 30 Data Terlama
            </button>

        </form>

    </section>

    {{-- TABLE --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg">

        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">

                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr>
                            <th class="px-6 py-4 font-extrabold">Tanggal</th>
                            <th class="px-6 py-4 font-extrabold">Pesan</th>
                            <th class="px-6 py-4 font-extrabold">URL</th>
                            <th class="px-6 py-4 font-extrabold">User</th>
                            <th class="px-6 py-4 font-extrabold text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-200 divide-y divide-gray-500">

                        @forelse ($errorLogs as $data)
                            <tr class="hover:bg-gray-100">

                                <td class="px-6 py-4">
                                    {{ $data->created_at?->format('d M Y H:i:s') ?? '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ Str::limit($data->message ?? '-', 50) }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $data->url ?? '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $data->user_id ?? 'Guest' }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.error-log.show', $data->id) }}"
                                        class="text-blue-600 hover:underline">
                                        Lihat
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada error log
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="mt-4">
            {{ $errorLogs->links() }}
        </div>

    </section>

@endsection

{{-- SWEETALERT DELETE CONFIRM --}}
@section('addJs')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('delete30Form').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: "30 error log TERLAMA akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>

@endsection
