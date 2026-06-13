@extends('admin.layout.master')

@section('open-log-activity', 'open')
@section('menu-log-activity', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')

    {{-- Breadcrumb --}}
    <section class="mb-5">
        <div class="text-lg sm:text-2xl font-bold">
            <span class="text-[#121212]">Log Activity</span>
            <span class="mx-1 text-[#121212]">></span>
            <span class="text-[#2D37CC]">Detail</span>
        </div>
    </section>

    @php
        $changes      = $activity->attribute_changes ?? collect();
        $attrNew      = $changes->get('attributes', []);  // nilai sekarang (create / update)
        $attrOld      = $changes->get('old', []);         // nilai lama (update / delete)
        $requestInfo  = $activity->properties?->get('request', []) ?? [];
        $event        = $activity->event;

        $eventColors = [
            'created' => 'bg-green-100 text-green-700',
            'updated' => 'bg-blue-100 text-blue-700',
            'deleted' => 'bg-red-100 text-red-700',
        ];
        $badgeColor = $eventColors[$event] ?? 'bg-gray-100 text-gray-700';

        // Kumpulkan semua key unik dari old + new
        $allKeys = collect(array_keys((array) $attrNew))
            ->merge(array_keys((array) $attrOld))
            ->unique()
            ->values();
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

        {{-- Info Utama --}}
        <section class="bg-white p-5 shadow border border-gray-300 rounded-lg">
            <h2 class="text-base font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Informasi Log</h2>
            <dl class="space-y-3 text-sm">
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">ID</dt>
                    <dd class="text-gray-800">{{ $activity->id }}</dd>
                </div>
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">Log Name</dt>
                    <dd class="text-gray-800">{{ $activity->log_name }}</dd>
                </div>
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">Event</dt>
                    <dd>
                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold {{ $badgeColor }}">
                            {{ ucfirst($event ?? '-') }}
                        </span>
                    </dd>
                </div>
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">Deskripsi</dt>
                    <dd class="text-gray-800">{{ $activity->description }}</dd>
                </div>
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">Causer</dt>
                    <dd class="text-gray-800">{{ $activity->causer?->name ?? '-' }}</dd>
                </div>
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">Subject</dt>
                    <dd class="text-gray-800">
                        {{ class_basename($activity->subject_type ?? '-') }}
                        @if($activity->subject_id) #{{ $activity->subject_id }} @endif
                    </dd>
                </div>
                <div class="flex gap-3">
                    <dt class="w-32 font-semibold text-gray-600 shrink-0">Tanggal</dt>
                    <dd class="text-gray-800">{{ $activity->created_at->format('d/m/Y H:i:s') }}</dd>
                </div>
            </dl>
        </section>

        {{-- Request Info --}}
        <section class="bg-white p-5 shadow border border-gray-300 rounded-lg">
            <h2 class="text-base font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Request Info</h2>
            @if (!empty($requestInfo))
                <dl class="space-y-3 text-sm">
                    @foreach ($requestInfo as $key => $val)
                        <div class="flex gap-3">
                            <dt class="w-32 font-semibold text-gray-600 shrink-0 capitalize">
                                {{ str_replace('_', ' ', $key) }}
                            </dt>
                            <dd class="text-gray-800 break-all">{{ $val ?? '-' }}</dd>
                        </div>
                    @endforeach
                </dl>
            @else
                <p class="text-sm text-gray-400">Tidak ada request info.</p>
            @endif
        </section>

    </div>

    {{-- Attribute Changes --}}
    @if ($allKeys->isNotEmpty())
        <section class="bg-white p-5 shadow border border-gray-300 rounded-lg mb-5">
            <h2 class="text-base font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                Perubahan Data
                <span class="ml-2 text-xs font-normal text-gray-500">
                    @if ($event === 'created') (data baru dibuat)
                    @elseif ($event === 'updated') (nilai lama → nilai baru)
                    @elseif ($event === 'deleted') (data dihapus)
                    @endif
                </span>
            </h2>

            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 font-semibold w-40">Field</th>

                            @if ($event === 'created')
                                <th class="px-4 py-3 font-semibold text-green-700">Nilai (Baru)</th>
                            @elseif ($event === 'deleted')
                                <th class="px-4 py-3 font-semibold text-red-700">Nilai (Dihapus)</th>
                            @else
                                <th class="px-4 py-3 font-semibold text-red-600">Nilai Lama</th>
                                <th class="px-4 py-3 font-semibold text-green-600">Nilai Baru</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($allKeys as $key)
                            @php
                                $newVal = data_get($attrNew, $key);
                                $oldVal = data_get($attrOld, $key);

                                $newDisplay = is_array($newVal) ? json_encode($newVal) : ($newVal ?? '—');
                                $oldDisplay = is_array($oldVal) ? json_encode($oldVal) : ($oldVal ?? '—');

                                $changed = ($event === 'updated') && ($newDisplay !== $oldDisplay);
                            @endphp
                            <tr class="{{ $changed ? 'bg-yellow-50' : 'bg-white' }}">
                                <td class="px-4 py-3 font-semibold text-gray-700">{{ $key }}</td>

                                @if ($event === 'created')
                                    <td class="px-4 py-3 text-green-800 break-all">{{ $newDisplay }}</td>
                                @elseif ($event === 'deleted')
                                    <td class="px-4 py-3 text-red-800 break-all">{{ $oldDisplay }}</td>
                                @else
                                    <td class="px-4 py-3 break-all {{ $changed ? 'line-through text-red-500' : 'text-gray-600' }}">
                                        {{ $oldDisplay }}
                                    </td>
                                    <td class="px-4 py-3 break-all {{ $changed ? 'font-semibold text-green-700' : 'text-gray-600' }}">
                                        {{ $newDisplay }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endif

    {{-- Back Button --}}
    <div class="mt-2">
        <a href="{{ route('admin.log-activity.index') }}"
            class="inline-flex items-center gap-2 bg-[#EC0E0E] hover:bg-red-800 text-white font-semibold py-2.5 px-6 rounded-lg shadow transition text-sm">
            &larr; Kembali
        </a>
    </div>

@endsection
