@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
    $primaryCards = [
        ['label' => 'Produk', 'value' => $stats['products_count'], 'route' => 'admin.products.index', 'accent' => 'border-l-sky-500', 'meta' => 'Produk aktif toko'],
        ['label' => 'Pesan', 'value' => $stats['messages_count'], 'route' => 'admin.inbox.index', 'accent' => 'border-l-rose-500', 'meta' => 'Pesan pelanggan'],
        ['label' => 'Newsletter', 'value' => $stats['subscribers_count'], 'route' => 'admin.subscribers.index', 'accent' => 'border-l-violet-500', 'meta' => 'Pelanggan newsletter'],
        ['label' => 'Layanan', 'value' => $stats['services_count'], 'route' => 'admin.services.index', 'accent' => 'border-l-teal-500', 'meta' => 'Layanan website'],
    ];

    $contentCards = [
        ['label' => 'Kategori', 'value' => $stats['categories_count'], 'route' => 'admin.categories.index'],
        ['label' => 'Artikel', 'value' => $stats['articles_count'], 'route' => 'admin.articles.index'],
        ['label' => 'Galeri', 'value' => $stats['galleries_count'], 'route' => 'admin.galleries.index'],
        ['label' => 'Kotak Masuk', 'value' => $stats['messages_count'], 'route' => 'admin.inbox.index'],
    ];
@endphp

<div class="space-y-5">
    <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-teal-500"></span>
                    <p class="text-xs font-bold uppercase tracking-wide text-slate-500">Ringkasan operasional</p>
                </div>
                <h2 class="mt-2 text-2xl font-bold text-slate-950">Dashboard Petshop</h2>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-slate-600">Pantau data penting, pesan pelanggan, konten website, dan akses cepat ke modul yang paling sering dipakai.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.inbox.index') }}" class="inline-flex items-center gap-2 rounded-lg bg-slate-950 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.9 5.3a2 2 0 002.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Kotak Masuk
                </a>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-teal-200 hover:text-teal-700">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Produk
                </a>
            </div>
        </div>
    </section>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach($primaryCards as $card)
            <a href="{{ route($card['route']) }}" class="group rounded-xl border border-slate-200 border-l-4 {{ $card['accent'] }} bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-md">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-500">{{ $card['label'] }}</p>
                        <p class="mt-2 text-3xl font-bold text-slate-950">{{ $card['value'] }}</p>
                    </div>
                    <span class="rounded-md bg-slate-100 p-2 text-slate-500 transition group-hover:bg-slate-950 group-hover:text-white">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-xs font-medium text-slate-500">{{ $card['meta'] }}</p>
            </a>
        @endforeach
    </section>

    <section class="grid gap-5 xl:grid-cols-[1.35fr_.75fr]">
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-center justify-between gap-4 border-b border-slate-200 px-5 py-4">
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wide text-slate-500">Pesan Terbaru</h3>
                    <p class="mt-1 text-sm text-slate-600">Pesan pelanggan yang masuk dari halaman kontak.</p>
                </div>
                <a href="{{ route('admin.inbox.index') }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-teal-700 transition hover:bg-teal-50">Lihat semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-xs font-bold uppercase text-slate-500">
                        <tr>
                            <th class="px-5 py-3">Pelanggan</th>
                            <th class="px-5 py-3">Pesan</th>
                            <th class="px-5 py-3 text-right">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recent_messages as $message)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-950">{{ $message->name }}</p>
                                    <p class="text-sm text-slate-500">{{ $message->email }}</p>
                                </td>
                                <td class="px-5 py-4 text-sm font-medium text-slate-700">
                                    {{ Str::limit($message->message, 70) }}
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <a href="{{ route('admin.inbox.index') }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-teal-200 hover:text-teal-700" aria-label="Lihat pesan">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.5 12C3.7 7.9 7.5 5 12 5s8.3 2.9 9.5 7c-1.2 4.1-5 7-9.5 7s-8.3-2.9-9.5-7z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-5 py-10 text-center text-sm text-slate-500">Belum ada pesan terbaru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-5">
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-bold uppercase tracking-wide text-slate-500">Konten Website</h3>
                <div class="mt-4 grid grid-cols-2 gap-3">
                    @foreach($contentCards as $card)
                        <a href="{{ route($card['route']) }}" class="rounded-lg border border-slate-200 bg-[#fbfcfd] p-4 transition hover:border-teal-200 hover:bg-white hover:shadow-sm">
                            <p class="text-2xl font-bold text-slate-950">{{ $card['value'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-slate-500">{{ $card['label'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="text-sm font-bold uppercase tracking-wide text-slate-500">Akses Cepat</h3>
                <div class="mt-3 divide-y divide-slate-100">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between py-3 text-sm font-semibold text-slate-700 transition hover:text-teal-700">
                        <span>Kelola produk</span>
                        <span>Buka</span>
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between py-3 text-sm font-semibold text-slate-700 transition hover:text-teal-700">
                        <span>Update layanan</span>
                        <span>Buka</span>
                    </a>
                    <a href="{{ route('admin.articles.index') }}" class="flex items-center justify-between py-3 text-sm font-semibold text-slate-700 transition hover:text-teal-700">
                        <span>Edit artikel</span>
                        <span>Buka</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
