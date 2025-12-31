@extends('layouts.app')
@section('title', 'Exclusive Pet Collection')

@section('content')
<div 
    class="pt-24 md:pt-40 pb-24 bg-gradient-to-b from-white via-gray-50 to-white overflow-hidden"
    x-data="{ showMobileFilters: false }"
>
    {{-- Abstract Background Elements --}}
    <div class="absolute top-40 right-0 w-[500px] h-[500px] bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-40 left-0 w-[400px] h-[400px] bg-blue-600/5 rounded-full blur-3xl pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        {{-- Header --}}
        <div class="mb-16 md:mb-20 text-center" data-aos="fade-down">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-8 h-0.5 bg-gradient-to-r from-transparent via-blue-500 to-transparent rounded-full"></div>
                <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider">Our Marketplace</span>
                <div class="w-8 h-0.5 bg-gradient-to-r from-transparent via-blue-500 to-transparent rounded-full"></div>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight tracking-tight">
                Elite Pet
                <span class="block text-blue-600 mt-1">Products</span>
            </h1>
            <p class="text-gray-600 text-lg mt-4 max-w-2xl mx-auto">Discover premium products for your beloved companions</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            
            {{-- SIDEBAR FILTER --}}
            <aside 
                class="fixed inset-0 z-50 lg:relative lg:z-0 lg:block lg:w-1/4 order-2 lg:order-1"
                x-show="showMobileFilters || (window.innerWidth >= 1024)"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="-translate-x-full lg:translate-x-0"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full lg:translate-x-0"
                @resize.window="if (window.innerWidth >= 1024) showMobileFilters = false"
                style="display: none;"
            >
                {{-- Mobile Backdrop --}}
                <div 
                    class="fixed inset-0 bg-black/50 lg:hidden" 
                    @click="showMobileFilters = false"
                ></div>

                <div class="relative bg-white w-full max-w-xs h-full overflow-y-auto p-6 md:p-10 shadow-2xl border-r border-gray-100 lg:rounded-3xl lg:border lg:sticky lg:top-32 lg:h-auto lg:shadow-lg">
                    <div class="flex items-center justify-between mb-8 lg:mb-6">
                        <h3 class="font-bold text-xl text-gray-900 flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            </div>
                            Shop Filters
                        </h3>
                        <button @click="showMobileFilters = false" class="lg:hidden text-gray-400 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    
                    <form action="{{ route('products.index') }}" method="GET" class="space-y-8">
                        @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif

                        {{-- PRICE RANGE --}}
                        <div>
                            <h4 class="font-semibold text-sm text-gray-700 mb-4">Price Range</h4>
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs">Rp</span>
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full bg-gray-50 border border-gray-200 pl-8 pr-3 py-3 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs">Rp</span>
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full bg-gray-50 border border-gray-200 pl-8 pr-3 py-3 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-xl hover:bg-blue-700 transition-all text-sm shadow-lg shadow-blue-500/30">Apply Filters</button>
                        </div>

                        {{-- CATEGORIES --}}
                        <div x-data="{ open: true }" class="pt-6 border-t border-gray-100">
                            <button type="button" @click="open = !open" class="w-full flex items-center justify-between font-semibold text-sm text-gray-700 mb-4 group">
                                Categories
                                <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-collapse class="space-y-3">
                                <label class="group flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="category" value="" class="hidden peer" {{ request('category') == '' ? 'checked' : '' }} onchange="this.form.submit()">
                                    <div class="w-5 h-5 border-2 border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm group-hover:text-blue-600 transition-colors">All Categories</span>
                                </label>
                                @foreach($categories as $category)
                                    <label class="group flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="category" value="{{ $category->id }}" class="hidden peer" {{ request('category') == $category->id ? 'checked' : '' }} onchange="this.form.submit()">
                                        <div class="w-5 h-5 border-2 border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                        </div>
                                        <span class="text-gray-600 text-sm group-hover:text-blue-600 transition-colors">{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- BRANDS --}}
                        <div x-data="{ open: true }" class="pt-6 border-t border-gray-100">
                            <button type="button" @click="open = !open" class="w-full flex items-center justify-between font-semibold text-sm text-gray-700 mb-4 group">
                                Brands
                                <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-collapse class="space-y-3">
                                <label class="group flex items-center gap-3 cursor-pointer">
                                    <input type="radio" name="brand" value="" class="hidden peer" {{ request('brand') == '' ? 'checked' : '' }} onchange="this.form.submit()">
                                    <div class="w-5 h-5 border-2 border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm group-hover:text-blue-600 transition-colors">All Brands</span>
                                </label>
                                @foreach($brands as $brand)
                                    <label class="group flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="brand" value="{{ $brand->id }}" class="hidden peer" {{ request('brand') == $brand->id ? 'checked' : '' }} onchange="this.form.submit()">
                                        <div class="w-5 h-5 border-2 border-gray-200 rounded-lg peer-checked:border-blue-600 peer-checked:bg-blue-600 transition-all flex items-center justify-center">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                                        </div>
                                        <span class="text-gray-600 text-sm group-hover:text-blue-600 transition-colors">{{ $brand->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <a href="{{ route('products.index') }}" class="block text-center text-sm font-medium text-gray-400 hover:text-red-500 transition-colors pt-4 border-t border-gray-100">Reset Filters</a>
                    </form>
                </div>
            </aside>

            {{-- MAIN CONTENT --}}
            <main class="w-full lg:w-3/4 order-1 lg:order-2">
                
                {{-- SEARCH AND HEADER --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 md:mb-10 gap-6" data-aos="fade-up">
                    <div class="flex items-center justify-between w-full md:w-auto gap-3">
                        <div class="text-gray-500 text-sm">
                            <span class="font-medium hidden sm:inline">Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products</span>
                            <span class="font-medium sm:hidden">{{ $products->total() }} Products Found</span>
                        </div>
                        
                        {{-- Mobile Filter Trigger --}}
                        <button 
                            @click="showMobileFilters = true"
                            class="lg:hidden flex items-center justify-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-xl shadow-lg shadow-blue-500/30 text-xs font-bold active:scale-95 transition-all"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            Filters
                        </button>
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
                            placeholder="Search products..." 
                            class="pl-12 pr-4 py-3 md:py-4 bg-white border border-gray-200 rounded-2xl w-full md:w-[400px] shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-sm"
                        >
                        <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2 group-focus-within:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>

                {{-- PRODUCTS GRID --}}
                @if($products->count())
                    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 mb-12">
                        @foreach($products as $index => $product)
                            <div 
                                class="group"
                                data-aos="fade-up" 
                                data-aos-delay="{{ ($index % 3) * 100 }}"
                            >
                                <div class="relative bg-white rounded-2xl md:rounded-3xl overflow-hidden aspect-[4/5] mb-4 md:mb-6 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-500 border border-gray-100 italic">
                                    @if($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="flex items-center justify-center h-full bg-gradient-to-br from-gray-50 to-gray-100">
                                            <svg class="w-12 md:w-20 h-12 md:h-20 text-gray-200" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="bg-white rounded-xl md:rounded-2xl p-3 md:p-4 transform scale-75 group-hover:scale-100 transition-transform duration-500 shadow-2xl">
                                            <svg class="w-6 md:w-8 h-6 md:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-3 md:bottom-6 left-3 md:left-6 flex flex-col gap-1.5 md:gap-2">
                                        @if($product->category)
                                            <span class="bg-white/95 backdrop-blur-sm px-2.5 md:px-4 py-1 md:py-1.5 rounded-full text-[8px] md:text-xs font-bold text-gray-800 shadow-sm">
                                                {{ $product->category->name }}
                                            </span>
                                        @endif
                                        @if($product->brand)
                                            <span class="bg-blue-600 px-2.5 md:px-4 py-1 md:py-1.5 rounded-full text-[8px] md:text-xs font-bold text-white shadow-sm">
                                                {{ $product->brand->name }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="px-1 md:px-2">
                                    <h3 class="text-sm md:text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors line-clamp-1 select-none">{{ $product->name }}</h3>
                                    <p class="text-base md:text-2xl font-black text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-16 md:mt-24" data-aos="fade-up">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-8 bg-white p-6 md:p-8 rounded-[2.5rem] md:rounded-[3.5rem] shadow-xl shadow-gray-200/50 border border-gray-50">
                            {{-- Info --}}
                            <div class="text-gray-500 font-medium">
                                <span class="text-sm">Showing <span class="text-gray-900 font-bold tracking-tight">{{ $products->firstItem() ?? 0 }}</span> - <span class="text-gray-900 font-bold tracking-tight">{{ $products->lastItem() ?? 0 }}</span> of <span class="text-gray-900 font-bold tracking-tight">{{ $products->total() }}</span> elites</span>
                            </div>

                            {{-- Navigation --}}
                            <div class="flex items-center gap-2 md:gap-3">
                                {{-- Previous --}}
                                @if ($products->onFirstPage())
                                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-300 cursor-not-allowed border border-gray-100 transition-all">
                                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                                    </div>
                                @else
                                    <a href="{{ $products->previousPageUrl() }}" class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-white flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white hover:border-blue-600 border border-gray-200 shadow-lg shadow-gray-100 hover:shadow-blue-500/30 transition-all duration-300 group">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 group-active:scale-95" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                                    </a>
                                @endif

                                {{-- Page Numbers - Desktop Only --}}
                                <div class="hidden sm:flex items-center gap-2 md:gap-3">
                                    @php
                                        $start = max($products->currentPage() - 2, 1);
                                        $end = min($start + 4, $products->lastPage());
                                        if($end - $start < 4) $start = max($end - 4, 1);
                                    @endphp

                                    @for ($page = $start; $page <= $end; $page++)
                                        @if ($page == $products->currentPage())
                                            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-black shadow-xl shadow-blue-500/40 border border-blue-600 select-none">
                                                {{ $page }}
                                            </div>
                                        @else
                                            <a href="{{ $products->url($page) }}" class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-white flex items-center justify-center text-gray-600 font-bold hover:bg-blue-50 hover:text-blue-600 border border-gray-200 hover:border-blue-200 transition-all duration-300 select-none">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endfor
                                </div>

                                {{-- Compact Page Number for Mobile --}}
                                <div class="sm:hidden flex items-center justify-center px-4 py-3 bg-blue-50 rounded-2xl border border-blue-100 text-blue-700 font-bold text-sm">
                                    {{ $products->currentPage() }} / {{ $products->lastPage() }}
                                </div>

                                {{-- Next --}}
                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}" class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-white flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white hover:border-blue-600 border border-gray-200 shadow-lg shadow-gray-100 hover:shadow-blue-500/30 transition-all duration-300 group">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 group-active:scale-95" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                @else
                                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-300 cursor-not-allowed border border-gray-100 transition-all">
                                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-32 bg-white rounded-3xl shadow-lg border border-gray-100" data-aos="zoom-in">
                        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-8">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Products Found</h3>
                        <p class="text-gray-500 mb-8 text-base">We couldn't find any products matching your filters.</p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-700 transition-all text-sm shadow-lg shadow-blue-500/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Reset Filters
                        </a>
                    </div>
                @endif
            </main>
        </div>
    </div>
</div>
@endsection