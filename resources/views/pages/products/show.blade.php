@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="pt-28 md:pt-40 pb-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-blue-600 transition-colors mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke produk
        </a>

        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-start">
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-xl shadow-gray-200/60">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full aspect-[4/3] object-cover">
                @else
                    <div class="w-full aspect-[4/3] bg-gray-100 flex items-center justify-center text-gray-300 font-bold">NO IMAGE</div>
                @endif
            </div>

            <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-xl shadow-gray-200/60">
                <div class="flex flex-wrap gap-2 mb-6">
                    @if($product->category)
                        <span class="px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-xs font-bold">{{ $product->category->name }}</span>
                    @endif
                    @if($product->brand)
                        <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-xs font-bold">{{ $product->brand->name }}</span>
                    @endif
                </div>

                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">{{ $product->name }}</h1>
                <p class="mt-5 text-3xl font-black text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <div class="mt-8 border-t border-gray-100 pt-8">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-gray-400 mb-3">Deskripsi Produk</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $product->description ?: 'Deskripsi produk belum tersedia.' }}</p>
                </div>

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

        @if($relatedProducts->count())
            <div class="mt-20">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Produk Terkait</h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedProducts as $item)
                        <a href="{{ route('products.show', $item->slug) }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all">
                            @if($item->image)
                                <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" class="w-full aspect-[4/3] object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                            <div class="p-5">
                                <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $item->name }}</h3>
                                <p class="mt-2 font-black text-blue-600">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
