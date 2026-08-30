@extends('admin.layout.master')

@section('open-product', 'open')
@section('menu-product', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')
@section('title', 'Our Product')

@section('content')
    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <a href="#" class="text-[#2D37CC] hover:underline text-lg sm:text-2xl font-bold">Our Product</a>
        </div>
    </section>

    {{-- Filter Form --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="{{ route('admin.our_product.index') }}" method="GET" class="mb-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="text-xs font-semibold text-gray-700 mb-1 block">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..."
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none bg-white" />
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-700 mb-1 block">Tanggal</label>
                    <input type="date" name="date" value="{{ request('date') }}"
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none bg-white" />
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-700 mb-1 block">Tampilkan</label>
                    <select name="per_page"
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none bg-white">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 / halaman</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 / halaman</option>
                    </select>
                </div>
                <div class="flex gap-2 pt-2 sm:pt-0">
                    <button type="submit"
                        class="flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition">Filter</button>
                    <a href="{{ route('admin.our_product.index') }}"
                        class="flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 text-center transition">Reset</a>
                </div>
            </div>
        </form>
    </section>

    {{-- Table Content --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        {{-- FIXED: Membuat posisi tombol tambah responsive di mobile --}}
        <div class="mb-5 flex justify-end">
            <a href="{{ route('admin.our_product.create') }}"
                class="w-full sm:w-auto text-center bg-[#2D2ACD] hover:bg-blue-800 px-6 py-2 rounded-lg text-sm font-semibold text-white shadow transition">
                + Tambah Baru
            </a>
        </div>

        {{-- FIXED: Ditambahkan overflow-x-auto agar tabel bisa di-swipe kanan-kiri di HP tanpa ngerusak layout --}}
        <div class="w-full overflow-x-auto rounded-lg border border-gray-400 shadow-sm">
            <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                <thead class="bg-[#5aba6f]/70">
                    <tr>
                        <th class="px-6 py-4 font-extrabold w-48">Tanggal</th>
                        <th class="px-6 py-4 font-extrabold">ID Barang</th>
                        <th class="px-6 py-4 font-extrabold">Nama Barang</th>
                        <th class="px-6 py-4 font-extrabold text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200 divide-y divide-gray-500">
                    @forelse ($products as $item)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4">{{ $item->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 font-medium">{{ $item->code }}</td>
                            <td class="px-6 py-4">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.our_product.edit', $item->id) }}"
                                    class="text-blue-600 hover:underline font-medium">Sunting</a>
                                <span class="mx-1 text-gray-400">|</span>
                                <form action="{{ route('admin.our_product.destroy', $item->id) }}" method="POST"
                                    class="inline-block form-delete">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center bg-gray-100 text-gray-500">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if ($products->hasPages())
            <div class="mt-4">{{ $products->links() }}</div>
        @endif
    </section>
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Notif Sukses (Simpan/Update/Hapus)
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#53BF6A'
            });
        @endif

        // Notif Hapus
        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data ini akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) this.submit();
                });
            });
        });
    </script>
@endsection