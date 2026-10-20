@extends('admin.layout.master')

{{-- sidebar active (sesuaikan menu kamu) --}}
@section('open-testimoni', 'open')
@section('menu-testimoni', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')
@section('title', 'Testimonials')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <a href="#" class="text-[#2D37CC] hover:underline text-lg sm:text-2xl font-bold">Testimoni</a>
        </div>
    </section>

    {{-- Top Bar / Filter Form --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="{{ route('admin.testimonial.index') }}" method="GET">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">

                {{-- Search Pertanyaan --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" value="{{ request('name') }}" placeholder="Cari nama..."
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>

                {{-- Date Filter --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">
                        Tanggal
                    </label>
                    <input type="date" name="date" value="{{ request('date') }}"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>
                {{-- Provinsi --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">
                        Provinsi
                    </label>
                    <select name="province"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none">

                        <option value="">Semua Provinsi</option>

                        @foreach ($provinces as $province)
                            <option value="{{ $province }}" {{ request('province') == $province ? 'selected' : '' }}>
                                {{ $province }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Per Page --}}
                <select name="per_page"
                    class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none">

                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 / halaman</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 / halaman</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 / halaman</option>
                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 / halaman</option>

                </select>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-2 w-full lg:col-span-1 pt-2 sm:pt-0">
                    <button type="submit"
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
            <a href="{{ route('admin.testimonial.create') }}"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-lg bg-[#2D2ACD] px-6 py-2 text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <span class="text-lg leading-none">+</span>
                Tambah Baru
            </a>
        </div>

        {{-- Tabel --}}
        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr class="[&>th]:border-b [&>th]:border-gray-500">
                            <th scope="col" class="px-6 py-4 font-extrabold text-left w-48">Tanggal</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Provinsi</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-center">Status</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-center w-48">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-200 divide-y divide-gray-500">
                        {{-- Looping Data Menggunakan Foreach --}}
                        @forelse ($testimonials as $data)
                            <tr class="[&>td]:border-b [&>td]:border-gray-400 hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $data->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 font-medium whitespace-normal min-w-[250px]">{{ $data->name }}</td>
                                <td class="px-6 py-4 whitespace-normal">{{ $data->province }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if ($data->status == 'published')
                                        <span
                                            class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                                            Published
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 text-xs font-semibold text-gray-800 bg-gray-300 rounded-full">
                                            Not Published
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.testimonial.edit', $data->id) }}"
                                        class="text-blue-600 hover:underline">Sunting</a>
                                    <span class="mx-1">|</span>
                                    <form action="{{ route('admin.testimonial.destroy', $data->id) }}" method="POST"
                                        class="inline-block form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $testimonials->links() }}
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
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#2D2ACD'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonColor: '#EC0E0E'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Validasi Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#F59E0B'
            });
        </script>
    @endif
@endsection
