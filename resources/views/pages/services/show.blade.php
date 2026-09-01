@extends('layouts.app')

@section('title', $service->name)

@section('content')
<div class="pt-28 md:pt-40 pb-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-blue-600 transition-colors mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke layanan
        </a>

        <div class="grid lg:grid-cols-[1.1fr_.9fr] gap-10 lg:gap-16 items-start">
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-xl shadow-gray-200/60">
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-full aspect-[16/10] object-cover">
                @else
                    <div class="w-full aspect-[16/10] bg-gray-100 flex items-center justify-center text-gray-300 font-bold">NO IMAGE</div>
                @endif
            </div>

            <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-xl shadow-gray-200/60">
                <span class="inline-flex px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-xs font-bold mb-6">Layanan Petshop</span>
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">{{ $service->name }}</h1>
                <p class="mt-6 text-gray-600 leading-relaxed">{{ $service->description ?: 'Deskripsi layanan belum tersedia.' }}</p>

                <div class="mt-10 flex flex-col sm:flex-row gap-3">
                    <a href="{{ $whatsappLink }}" class="inline-flex justify-center items-center gap-2 bg-blue-600 text-white px-6 py-4 rounded-2xl font-bold hover:bg-blue-700 transition-colors">
                        Tanya via WhatsApp
                    </a>
                    <a href="{{ route('contact.index') }}" class="inline-flex justify-center items-center gap-2 bg-gray-100 text-gray-900 px-6 py-4 rounded-2xl font-bold hover:bg-gray-200 transition-colors">
                        Kontak Kami
                    </a>
                </div>
            </div>
        </div>

        @if($relatedServices->count())
            <div class="mt-20">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Layanan Lainnya</h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedServices as $item)
                        <a href="{{ route('services.show', $item->slug) }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all">
                            @if($item->image)
                                <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" class="w-full aspect-[4/3] object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                            <div class="p-5">
                                <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $item->name }}</h3>
                                <p class="mt-2 text-sm text-gray-500 line-clamp-2">{{ $item->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
