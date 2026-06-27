@extends('admin.layout.master')

@section('open-error-log', 'open')
@section('menu-error-log', 'bg-gradient-to-r from-[#53BF6A] to-[#275931] text-white')

@section('content')
    <section class="mb-5">
        <div class="text-xl font-bold text-gray-800">
            Detail Error Log
        </div>
    </section>

    <div class="bg-white border border-gray-300 rounded-lg shadow p-5 space-y-5">

        {{-- MESSAGE --}}
        <div>
            <h3 class="font-semibold text-gray-700">Message</h3>
            <p class="text-red-600 mt-1">
                {{ $log->message }}
            </p>
        </div>

        {{-- EXCEPTION --}}
        <div>
            <h3 class="font-semibold text-gray-700">Exception</h3>
            <p class="text-gray-800 mt-1">
                {{ $log->exception }}
            </p>
        </div>

        {{-- FILE + LINE --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <h3 class="font-semibold text-gray-700">File</h3>
                <p class="text-gray-800 mt-1 break-all">
                    {{ $log->file }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-700">Line</h3>
                <p class="text-gray-800 mt-1">
                    {{ $log->line }}
                </p>
            </div>

        </div>

        {{-- URL + METHOD --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <h3 class="font-semibold text-gray-700">URL</h3>
                <p class="text-blue-600 mt-1 break-all">
                    {{ $log->url }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-700">Method</h3>
                <p class="mt-1">
                    {{ $log->method }}
                </p>
            </div>

        </div>

        {{-- IP + USER --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <h3 class="font-semibold text-gray-700">IP Address</h3>
                <p class="mt-1">
                    {{ $log->ip }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-700">User ID</h3>
                <p class="mt-1">
                    {{ $log->user_id ?? 'Guest' }}
                </p>
            </div>

        </div>

        {{-- INPUT USER --}}
        <div>
            <h3 class="font-semibold text-gray-700">Input Request</h3>

            <pre class="bg-gray-100 p-3 rounded mt-2 text-sm overflow-x-auto">
{{ json_encode($log->input, JSON_PRETTY_PRINT) }}
        </pre>
        </div>

        {{-- TIME --}}
        <div>
            <h3 class="font-semibold text-gray-700">Waktu</h3>
            <p class="mt-1">
                {{ optional($log->created_at)->format('d M Y H:i:s') ?? '-' }}
            </p>
        </div>

        {{-- BACK BUTTON --}}
        <div class="pt-3">
            <a href="{{ route('admin.error-log.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-900">
                ← Kembali
            </a>
        </div>

    </div>
@endsection
