<section class="py-16 md:py-32 bg-gradient-to-b from-white via-gray-50/30 to-white relative overflow-hidden">
    {{-- Subtle background elements that blend with services and articles sections --}}
    <div class="absolute -bottom-40 -left-40 w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-gradient-to-br from-blue-400/5 to-purple-400/5 rounded-full blur-[120px]"></div>
    <div class="absolute -top-40 -right-40 w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-gradient-to-br from-pink-400/5 to-blue-400/5 rounded-full blur-[100px]"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 md:mb-24 gap-8" data-aos="fade-up">
            <div class="max-w-2xl">
                {{-- Badge with glow effect --}}
                <span class="inline-block bg-gradient-to-r from-blue-500/10 to-purple-500/10 text-blue-600 font-bold uppercase mb-4 text-[10px] md:text-sm px-4 py-2 rounded-full border border-blue-500/20 shadow-lg shadow-blue-500/10">Our Marketplace</span>
                {{-- Title with gradient text --}}
                <h1 class="text-3xl md:text-5xl font-bold bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent leading-tight px-2 md:px-0">Treat Your Pet With <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Quality</span></h1>
            </div>
            {{-- Enhanced button with glassmorphism --}}
            <a href="{{ route('products.index') }}" class="group relative bg-gradient-to-r from-gray-900 to-gray-800 text-white px-8 md:px-10 py-4 md:py-5 rounded-2xl font-bold flex items-center gap-4 hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-2xl shadow-gray-900/20 hover:shadow-blue-500/30 text-sm overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/0 via-white/10 to-blue-400/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                <span class="relative">Explore Full Shop</span>
                <svg class="relative w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-12">
            @foreach($products as $index => $product)
                <div 
                    class="group"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 150 }}"
                >
                    {{-- Enhanced card with backdrop blur and better shadows --}}
                    <div class="relative rounded-3xl md:rounded-[4rem] overflow-hidden bg-white/80 backdrop-blur-sm shadow-xl shadow-gray-200/70 aspect-[4/5] mb-5 md:mb-8 border border-gray-100/50 transition-all duration-700 group-hover:shadow-blue-300/50 group-hover:shadow-2xl group-hover:scale-[1.02]">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-50 flex items-center justify-center font-bold text-gray-300">NO IMAGE</div>
                        @endif
                        
                        {{-- Enhanced hover overlay with gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/70 via-purple-600/60 to-pink-600/70 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center gap-4">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-white/95 backdrop-blur-md rounded-2xl flex items-center justify-center text-gray-900 transform scale-50 group-hover:scale-100 transition-all duration-500 shadow-2xl hover:shadow-blue-500/50 hover:bg-blue-50 cursor-pointer">
                                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>

                        {{-- Enhanced category badge with backdrop blur --}}
                        @if($product->category)
                            <div class="absolute top-4 md:top-8 left-4 md:left-8 bg-white/95 backdrop-blur-md px-3 md:px-5 py-1.5 rounded-full text-[8px] md:text-xs font-bold text-gray-900 shadow-lg shadow-gray-900/10 border border-white/50">
                                {{ $product->category->name }}
                            </div>
                        @endif
                    </div>
                    <div class="px-2 md:px-6">
                        <h3 class="text-base md:text-2xl font-extrabold text-gray-900 mb-1 group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text group-hover:text-transparent transition-all duration-300 line-clamp-1">{{ $product->name }}</h3>
                        <div class="flex items-center justify-between">
                            {{-- Enhanced price with gradient on hover --}}
                            <span class="text-sm md:text-2xl font-bold text-gray-500 group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text group-hover:text-transparent transition-all duration-300">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
