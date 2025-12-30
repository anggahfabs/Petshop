@extends('layouts.app')
@section('title', 'Exclusive Pet Collection')

@section('content')
<div class="pt-32 md:pt-40 pb-24 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Header --}}
        <div class="mb-16 md:mb-24 text-center" data-aos="fade-down">
            <h2 class="text-blue-600 font-black tracking-[0.4em] uppercase mb-4 text-xs md:text-sm">Our Marketplace</h2>
            <h1 class="text-5xl md:text-8xl font-black text-gray-900 mb-8 tracking-tighter leading-tight">Elite Products</h1>
            <div class="w-32 md:w-48 h-2 md:h-2.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
            
            {{-- SIDEBAR FILTER --}}
            <aside class="w-full lg:w-1/4 order-2 lg:order-1" data-aos="fade-right">
                <div class="bg-white p-8 md:p-10 rounded-[3rem] shadow-xl shadow-gray-200/50 lg:sticky lg:top-32 border border-gray-100">
                    <div class="relative z-10">
                        <h3 class="font-black text-2xl mb-8 text-gray-900 flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            </div>
                            Shop Filters
                        </h3>
                        
                        <form action="{{ route('products.index') }}" method="GET" class="space-y-12">
                            @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif

                            {{-- CATEGORIES --}}
                            <div x-data="{ open: true }">
                                <button type="button" @click="open = !open" class="w-full flex items-center justify-between font-black text-[10px] uppercase tracking-[0.3em] text-gray-400 mb-6 group">
                                    Categories
                                    <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" x-collapse class="space-y-4">
                                    <label class="group flex items-center gap-4 cursor-pointer">
                                        <input type="radio" name="category" value="" class="hidden peer" {{ request('category') == '' ? 'checked' : '' }} onchange="this.form.submit()">
                                        <div class="w-6 h-6 border-2 border-gray-100 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center shadow-sm">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                        </div>
                                        <span class="text-gray-500 font-bold group-hover:text-blue-600 transition-colors text-sm">All Collections</span>
                                    </label>
                                    @foreach($categories as $category)
                                        <label class="group flex items-center gap-4 cursor-pointer">
                                            <input type="radio" name="category" value="{{ $category->id }}" class="hidden peer" {{ request('category') == $category->id ? 'checked' : '' }} onchange="this.form.submit()">
                                            <div class="w-6 h-6 border-2 border-gray-100 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center shadow-sm">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                            </div>
                                            <span class="text-gray-500 font-bold group-hover:text-blue-600 transition-colors text-sm">{{ $category->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- BRANDS --}}
                            <div x-data="{ open: true }">
                                <button type="button" @click="open = !open" class="w-full flex items-center justify-between font-black text-[10px] uppercase tracking-[0.3em] text-gray-400 mb-6 group">
                                    Popular Brands
                                    <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" x-collapse class="space-y-4">
                                    <label class="group flex items-center gap-4 cursor-pointer">
                                        <input type="radio" name="brand" value="" class="hidden peer" {{ request('brand') == '' ? 'checked' : '' }} onchange="this.form.submit()">
                                        <div class="w-6 h-6 border-2 border-gray-100 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center shadow-sm">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                        </div>
                                        <span class="text-gray-500 font-bold group-hover:text-blue-600 transition-colors text-sm">All Brands</span>
                                    </label>
                                    @foreach($brands as $brand)
                                        <label class="group flex items-center gap-4 cursor-pointer">
                                            <input type="radio" name="brand" value="{{ $brand->id }}" class="hidden peer" {{ request('brand') == $brand->id ? 'checked' : '' }} onchange="this.form.submit()">
                                            <div class="w-6 h-6 border-2 border-gray-100 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center shadow-sm">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                            </div>
                                            <span class="text-gray-500 font-bold group-hover:text-blue-600 transition-colors text-sm">{{ $brand->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- PRICE RANGE --}}
                            <div>
                                <h4 class="font-black text-[10px] uppercase tracking-[0.3em] text-gray-400 mb-8">Price Range</h4>
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 font-black text-[10px]">Rp</span>
                                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full bg-gray-50 border-none pl-10 py-4 rounded-xl text-xs font-bold focus:ring-2 focus:ring-blue-600">
                                    </div>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 font-black text-[10px]">Rp</span>
                                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full bg-gray-50 border-none pl-10 py-4 rounded-xl text-xs font-bold focus:ring-2 focus:ring-blue-600">
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 text-white font-black py-5 rounded-2xl shadow-xl shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95 uppercase tracking-widest text-xs">Apply Filters</button>
                            </div>
                            
                            <a href="{{ route('products.index') }}" class="block text-center text-[10px] font-black text-gray-300 hover:text-red-500 uppercase tracking-[0.4em] transition-colors">Reset All Filters</a>
                        </form>
                    </div>
                </div>
            </aside>

            {{-- MAIN CONTENT --}}
            <main class="w-full lg:w-3/4 order-1 lg:order-2">
                
                {{-- SEARCH AND HEADER --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-8" data-aos="fade-up">
                    <div class="flex items-center gap-4 text-gray-400 font-black uppercase text-[10px] tracking-[0.3em]">
                        <span>Found {{ $products->total() }} results</span>
                        <div class="w-12 h-[1px] bg-gray-200"></div>
                    </div>
                    
                    <form action="{{ route('products.index') }}" method="GET" class="w-full md:w-auto relative group">
                        @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                        @if(request('brand')) <input type="hidden" name="brand" value="{{ request('brand') }}"> @endif
                        @if(request('min_price')) <input type="hidden" name="min_price" value="{{ request('min_price') }}"> @endif
                        @if(request('max_price')) <input type="hidden" name="max_price" value="{{ request('max_price') }}"> @endif

                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Search our catalog..." 
                            class="pl-14 pr-8 py-5 bg-white border-none rounded-[2rem] w-full md:w-[400px] shadow-2xl shadow-gray-200 focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900"
                        >
                        <svg class="w-6 h-6 text-gray-300 absolute left-6 top-1/2 -translate-y-1/2 group-focus-within:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>

                {{-- PRODUCTS GRID --}}
                @if($products->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10 md:gap-12">
                        @foreach($products as $index => $product)
                            <div 
                                class="group"
                                data-aos="fade-up" 
                                data-aos-delay="{{ ($index % 3) * 100 }}"
                            >
                                <div class="relative bg-white rounded-[4rem] overflow-hidden aspect-[4/5] mb-8 shadow-xl shadow-gray-200 group-hover:shadow-blue-200 group-hover:shadow-2xl transition-all duration-700 border border-gray-50">
                                    @if($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                                    @else
                                        <div class="flex items-center justify-center h-full bg-gray-50 text-gray-100">
                                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    
                                    <div class="absolute inset-0 bg-blue-600/60 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
                                        <div class="p-4 bg-white rounded-[2rem] transform scale-50 group-hover:scale-100 transition-all duration-500 shadow-2xl">
                                            <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </div>
                                    </div>

                                    <div class="absolute top-8 left-8 flex flex-col gap-3">
                                        @if($product->category)
                                            <span class="bg-white/95 backdrop-blur-md px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] text-gray-900 shadow-lg border border-white/20">
                                                {{ $product->category->name }}
                                            </span>
                                        @endif
                                        @if($product->brand)
                                            <span class="bg-blue-600 px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] text-white shadow-lg shadow-blue-500/20">
                                                {{ $product->brand->name }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="px-6">
                                    <h3 class="text-3xl font-black text-gray-900 mb-2 group-hover:text-blue-600 transition-colors tracking-tight">{{ $product->name }}</h3>
                                    <p class="text-2xl font-bold text-gray-300">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-24">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-center py-40 bg-white rounded-[5rem] shadow-2xl shadow-gray-200/50 border border-gray-100" data-aos="zoom-in">
                        <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-10">
                            <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-4xl font-black text-gray-900 mb-6 tracking-tight">Catalog Empty</h3>
                        <p class="text-gray-400 font-bold mb-12 text-xl">We couldn't find items matching your filters.</p>
                        <a href="{{ route('products.index') }}" class="inline-flex bg-gray-900 text-white px-12 py-5 rounded-2xl font-black hover:bg-blue-600 transition-all uppercase tracking-widest text-xs shadow-2xl shadow-gray-200">Reset Filters</a>
                    </div>
                @endif
            </main>
        </div>
    </div>
</div>
@endsection