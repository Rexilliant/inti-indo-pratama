@extends('admin.layout.master')

@section('open-log-activity', 'open')
@section('menu-log-activity', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">Log Activity</span>
        </div>
    </section>

    {{-- Filter Form --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">
        <form action="{{ route('admin.log-activity.index') }}" method="GET" class="mb-2 sm:mb-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">

                {{-- Search --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari log..."
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>

                {{-- Event Filter --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Event</label>
                    <select name="event"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none">
                        <option value="">Semua Event</option>
                        <option value="created" {{ request('event') === 'created' ? 'selected' : '' }}>Created</option>
                        <option value="updated" {{ request('event') === 'updated' ? 'selected' : '' }}>Updated</option>
                        <option value="deleted" {{ request('event') === 'deleted' ? 'selected' : '' }}>Deleted</option>
                    </select>
                </div>

                {{-- Date Filter --}}
                <div class="flex flex-col w-full">
                    <label class="text-xs font-semibold text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="date" value="{{ request('date') }}"
                        class="rounded-md border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-[#5aba6f] focus:outline-none" />
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-2 w-full pt-2 sm:pt-0">
                    <button type="submit"
                        class="w-full sm:w-auto flex-1 rounded-md bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-800 transition text-center">
                        Filter
                    </button>
                    <a href="{{ route('admin.log-activity.index') }}"
                        class="w-full sm:w-auto flex-1 rounded-md bg-red-600 px-5 py-2 text-sm font-semibold text-white hover:bg-red-800 transition text-center">
                        Reset
                    </a>
                </div>

            </div>
        </form>
    </section>

    {{-- Main Content --}}
    <section class="bg-white p-4 sm:p-5 shadow border border-gray-300 rounded-lg mb-5">

        {{-- Tabel --}}
        <div class="overflow-hidden rounded-lg border border-gray-400 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 whitespace-nowrap">
                    <thead class="bg-[#5aba6f]/70 text-gray-900">
                        <tr class="[&>th]:border-b [&>th]:border-gray-500">
                            <th class="px-6 py-4 font-extrabold w-44">Tanggal</th>
                            <th class="px-6 py-4 font-extrabold">Causer</th>
                            <th class="px-6 py-4 font-extrabold">Subject</th>
                            <th class="px-6 py-4 font-extrabold">Subject ID</th>
                            <th class="px-6 py-4 font-extrabold">Event</th>
                            <th class="px-6 py-4 font-extrabold">Deskripsi</th>
                            <th class="px-6 py-4 font-extrabold text-center w-28">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-200 divide-y divide-gray-500">
                        @forelse ($logs as $log)
                            <tr class="[&>td]:border-b [&>td]:border-gray-400 hover:bg-gray-100">
                                <td class="px-6 py-4 text-xs">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4">
                                    {{ $log->causer?->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-500">
                                    {{ class_basename($log->subject_type ?? '-') }}
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-500">
                                    {{ $log->subject_id ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($log->event === 'created')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-500 text-white">
                                            CREATED
                                        </span>
                                    @elseif ($log->event === 'updated')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-500 text-white">
                                            UPDATED
                                        </span>
                                    @elseif ($log->event === 'deleted')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-500 text-white">
                                            DELETED
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-500 text-white">
                                            {{ strtoupper($log->event ?? '-') }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $log->description }}</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.log-activity.show', $log->id) }}"
                                        class="text-blue-600 hover:underline font-medium">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-6 text-center text-gray-500">Tidak ada data log.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div
                class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between bg-gray-200 px-4 py-3 sm:py-4 border-t border-gray-400">
                <div class="text-xs sm:text-sm font-semibold text-gray-800">
                    Showing {{ $logs->firstItem() }}–{{ $logs->lastItem() }} of {{ $logs->total() }}
                </div>
                <div>
                    {{ $logs->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
