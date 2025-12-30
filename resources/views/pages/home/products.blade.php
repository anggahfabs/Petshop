<section class="py-24 md:py-32 bg-gray-50 relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute -bottom-40 -left-40 w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-blue-100/40 rounded-full blur-[100px]"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 md:mb-24 gap-8" data-aos="fade-up">
            <div class="max-w-2xl">
                <h2 class="text-blue-600 font-black tracking-[0.3em] uppercase mb-4 text-xs md:text-sm">Our Marketplace</h2>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-gray-900 tracking-tighter leading-[0.95]">Treat Your Pet <br>With Quality</h1>
            </div>
            <a href="{{ route('products.index') }}" class="group bg-gray-900 text-white px-8 md:px-10 py-4 md:py-5 rounded-2xl font-black flex items-center gap-4 hover:bg-blue-600 transition-all shadow-2xl shadow-gray-200 text-xs md:text-sm uppercase tracking-widest">
                Explore Full Shop
                <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12">
            @foreach($products as $index => $product)
                <div 
                    class="group"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 150 }}"
                >
                    <div class="relative rounded-[3.5rem] md:rounded-[4rem] overflow-hidden bg-white shadow-xl shadow-gray-200/50 aspect-[4/5] mb-8 border border-gray-100 transition-all duration-700 group-hover:shadow-blue-200/50 group-hover:shadow-2xl">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                        @else
                            <div class="w-full h-full bg-gray-50 flex items-center justify-center font-black text-gray-200">NO IMAGE</div>
                        @endif
                        
                        {{-- Hover Overlay --}}
                        <div class="absolute inset-0 bg-blue-600/60 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center gap-4">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-white rounded-2xl flex items-center justify-center text-gray-900 transform scale-50 group-hover:scale-100 transition-all duration-500 shadow-xl">
                                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>

                        {{-- Category Badge --}}
                        @if($product->category)
                            <div class="absolute top-6 md:top-8 left-6 md:left-8 bg-white/95 backdrop-blur-md px-4 md:px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] text-gray-900 shadow-md border border-white/20">
                                {{ $product->category->name }}
                            </div>
                        @endif
                    </div>
                    <div class="px-6">
                        <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-2 group-hover:text-blue-600 transition-colors tracking-tight">{{ $product->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-xl md:text-2xl font-bold text-gray-300">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
