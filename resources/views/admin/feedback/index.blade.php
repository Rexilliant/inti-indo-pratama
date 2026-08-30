@extends('admin.layout.master')

@section('open-feedback', 'open')
@section('menu-feedback', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')
@section('title', 'Feedback')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="mb-4 text-xl font-semibold text-gray-700">
            <a href="#" class="text-[#2D37CC] hover:underline text-lg sm:text-2xl font-bold">Feedback</a>
        </div>
    </section>

    {{-- Filter Form --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="{{ route('admin.feedback.index') }}" method="GET" class="mb-2 sm:mb-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}"
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
                        class="w-full sm:w-auto flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition text-center">Filter</button>
                    <a href="{{ route('admin.feedback.index') }}"
                        class="w-full sm:w-auto flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 transition text-center">Reset</a>
                </div>
            </div>
        </form>
    </section>

    {{-- Main Content --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr class="[&>th]:border-b [&>th]:border-gray-500">
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Tanggal</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Nama</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Email</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-left">Subjek</th>
                            <th scope="col" class="px-6 py-4 font-extrabold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200 divide-y divide-gray-500">
                        @forelse ($feedbacks as $item)
                            <tr class="[&>td]:border-b [&>td]:border-gray-400 hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $item->name }}</td>
                                <td class="px-6 py-4">{{ $item->email }}</td>
                                <td class="px-6 py-4">{{ $item->subject }}</td>
                                <td class="px-6 py-4 text-center">
                                    <button type="button" onclick="openModal('modal-{{ $item->id }}')"
                                        class="text-blue-600 hover:underline">Lihat</button>
                                    <span class="mx-1">|</span>

                                    <form action="{{ route('admin.feedback.destroy', $item->id) }}" method="POST"
                                        class="inline-block form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline cursor-pointer">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Pop-up --}}
                            <div id="modal-{{ $item->id }}"
                                class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 bg-gray-900/50 backdrop-blur-sm">

                                <div
                                    class="bg-white p-6 rounded-xl shadow-2xl w-full max-w-4xl border border-gray-200 max-h-[90vh] overflow-y-auto">
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-lg font-bold text-gray-800">Detail Pesan</h3>
                                        <button onclick="closeModal('modal-{{ $item->id }}')"
                                            class="text-gray-500 hover:text-gray-800 font-bold text-xl">&times;</button>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="bg-gray-100 p-3 rounded-lg border border-gray-200">
                                            <p class="text-[10px] uppercase font-bold text-gray-500">Pengirim</p>
                                            <p class="text-sm font-semibold">{{ $item->name }}</p>
                                        </div>
                                        <div class="bg-gray-100 p-3 rounded-lg border border-gray-200">
                                            <p class="text-[10px] uppercase font-bold text-gray-500">Tanggal Dikirim</p>
                                            <p class="text-sm font-semibold">{{ $item->created_at->format('d M Y H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-gray-100 p-3 rounded-lg border border-gray-200 mb-4">
                                        <p class="text-[10px] uppercase font-bold text-gray-500">Email</p>
                                        <p class="text-sm font-semibold">{{ $item->email }}</p>
                                    </div>

                                    <div class="bg-gray-100 p-3 rounded-lg border border-gray-200 mb-4">
                                        <p class="text-[10px] uppercase font-bold text-gray-500">Subjek</p>
                                        <p class="text-sm font-semibold">{{ $item->subject }}</p>
                                    </div>

                                    <div class="bg-gray-100 p-3 rounded-lg border border-gray-200">
                                        <p class="text-[10px] uppercase font-bold text-gray-500 mb-1">Pesan</p>
                                        <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                                            {{ $item->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data feedback.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @include('admin.layout.pagination', ['paginator' => $feedbacks])

    </section>
@endsection

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

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
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
