@extends('admin.layout.master')

@section('open-dashboard', 'open')
@section('menu-dashboard', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')


@section('content')
  {{-- $stats, $summary, $recentActivities, $latestData, $startDate, $endDate
       dikirim dari DashboardController@index --}}

<div class="min-h-screen bg-slate-50">

    {{-- Header --}}
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-6">

            <div class="flex flex-col lg:flex-row justify-between lg:items-center gap-5">

                <div>
                    <h1 class="text-2xl font-bold text-slate-900 tracking-tight">
                        Dashboard
                    </h1>

                    <p class="text-slate-500 mt-1 text-sm">
                        Ringkasan data sistem &mdash; diperbarui hari ini
                    </p>
                </div>

                {{-- Filter --}}
                <form class="flex flex-wrap items-end gap-3">

                    <div>
                        <label class="text-xs font-medium text-slate-500 uppercase tracking-wide block mb-1.5">
                            Start Date
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ $startDate->format('Y-m-d') }}"
                            class="border border-slate-200 bg-slate-50 rounded-lg px-4 py-2 text-sm text-slate-700 w-full focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition">
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-500 uppercase tracking-wide block mb-1.5">
                            End Date
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ $endDate->format('Y-m-d') }}"
                            class="border border-slate-200 bg-slate-50 rounded-lg px-4 py-2 text-sm text-slate-700 w-full focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition">
                    </div>

                    <button
                        class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg px-6 py-2 shadow-sm shadow-emerald-600/20 transition">
                        Filter
                    </button>

                </form>

            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto p-6 space-y-6">

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

            {{-- $stats dikirim dari controller: [['label','value','delta','trend','icon','color'], ...] --}}

            @php
                $colorMap = [
                    'blue'    => ['bg' => 'bg-blue-50',    'text' => 'text-blue-600'],
                    'emerald' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
                    'amber'   => ['bg' => 'bg-amber-50',   'text' => 'text-amber-600'],
                    'pink'    => ['bg' => 'bg-pink-50',    'text' => 'text-pink-600'],
                    'rose'    => ['bg' => 'bg-rose-50',    'text' => 'text-rose-600'],
                    'violet'  => ['bg' => 'bg-violet-50',  'text' => 'text-violet-600'],
                ];
            @endphp

            @foreach($stats as $stat)
                @php $c = $colorMap[$stat['color']]; @endphp

                <div class="bg-white rounded-2xl border border-slate-200 p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                {{ $stat['label'] }}
                            </p>

                            <h2 class="text-3xl font-bold text-slate-900 mt-2 tabular-nums">
                                {{ $stat['value'] }}
                            </h2>

                            <p class="mt-3 text-xs font-medium inline-flex items-center gap-1
                                {{ $stat['trend'] === 'up' ? 'text-emerald-600' : ($stat['trend'] === 'down' ? 'text-rose-600' : 'text-slate-400') }}">

                                @if($stat['trend'] === 'up')
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                @elseif($stat['trend'] === 'down')
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                @endif

                                {{ $stat['delta'] }}
                            </p>
                        </div>

                        <div class="h-12 w-12 rounded-xl {{ $c['bg'] }} {{ $c['text'] }} flex items-center justify-center shrink-0">

                            @switch($stat['icon'])
                                @case('users')
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                    @break
                                @case('box')
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25-3v3m0 0h4.5m-4.5 0h-4.5M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /></svg>
                                    @break
                                @case('newspaper')
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" /></svg>
                                    @break
                                @case('star')
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                                    @break
                                @case('chat')
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334V6.637c0-1.136-.847-2.1-1.98-2.193a48.424 48.424 0 00-10.4 0C4.14 4.537 3.293 5.5 3.293 6.637v6.098c0 1.136.847 2.1 1.98 2.193.253.02.507.038.762.055m10.42-9.344v9.344" /></svg>
                                    @break
                                @case('question')
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.451.999-1.451 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" /></svg>
                                    @break
                            @endswitch

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Summary --}}
        <div class="grid lg:grid-cols-3 gap-6">

            {{-- Recent Activity --}}
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200">

                <div class="border-b border-slate-100 px-6 py-4 flex items-center justify-between">

                    <h2 class="font-semibold text-slate-900">
                        Recent Activity
                    </h2>

                    <a href="#" class="text-xs font-medium text-emerald-600 hover:text-emerald-700">
                        Lihat semua
                    </a>

                </div>

                <div class="divide-y divide-slate-100">

                    @forelse($recentActivities as $activity)

                    <div class="flex items-center justify-between px-6 py-4 hover:bg-slate-50/60 transition">

                        <div class="flex items-center gap-3">

                            <span class="h-2 w-2 rounded-full bg-emerald-500 shrink-0"></span>

                            <div>
                                <h3 class="font-medium text-sm text-slate-800">
                                    {{ $activity['title'] }}
                                </h3>

                                <p class="text-xs text-slate-500 mt-0.5">
                                    {{ $activity['time'] }}
                                </p>
                            </div>

                        </div>

                        <span class="bg-emerald-50 text-emerald-600 text-xs font-medium px-2.5 py-1 rounded-full">
                            {{ $activity['status'] }}
                        </span>

                    </div>

                    @empty

                    <div class="px-6 py-10 text-center text-sm text-slate-400">
                        Belum ada aktivitas.
                    </div>

                    @endforelse

                </div>

            </div>

            {{-- Summary --}}
            <div class="bg-white rounded-2xl border border-slate-200 p-6">

                <h2 class="font-semibold text-slate-900 mb-5">
                    Ringkasan
                </h2>

                <div class="space-y-5">

                    {{-- $summary dikirim dari controller --}}

                    @foreach($summary as $row)
                        <div>

                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-slate-600">{{ $row['label'] }}</span>
                                <span class="font-medium text-slate-900 tabular-nums">{{ $row['value'] }}</span>
                            </div>

                            <div class="bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                <div class="{{ $row['color'] }} h-1.5 rounded-full" style="width: {{ $row['width'] }}"></div>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>
@endsection

@section('addJs')

@endsection