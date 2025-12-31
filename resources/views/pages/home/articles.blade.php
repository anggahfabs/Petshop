<section class="relative py-16 md:py-32 bg-gradient-to-b from-white via-gray-50 to-white overflow-hidden">
    {{-- Abstract Background Elements --}}
    <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-blue-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-0 w-[400px] h-[400px] bg-blue-600/5 rounded-full blur-3xl"></div>
    
    {{-- Decorative Shapes --}}
    <div class="absolute top-1/3 right-20 w-32 h-32 border-2 border-blue-100/50 rounded-3xl rotate-12 hidden lg:block"></div>
    <div class="absolute bottom-1/4 left-20 w-24 h-24 bg-blue-500/5 rounded-2xl -rotate-12 hidden lg:block"></div>
    
    {{-- Subtle Grid Pattern --}}
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, #3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        {{-- Header Section --}}
        <div class="text-center mb-16 md:mb-20" data-aos="fade-up">
            {{-- Added glow effect to badge --}}
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-8 h-0.5 bg-gradient-to-r from-transparent via-blue-500 to-transparent rounded-full"></div>
                <span class="inline-block bg-gradient-to-r from-blue-500/10 to-blue-600/10 text-blue-600 font-semibold text-xs uppercase tracking-wider px-4 py-1.5 rounded-full border border-blue-200/50 shadow-lg shadow-blue-500/10">Pet Knowledge</span>
                <div class="w-8 h-0.5 bg-gradient-to-r from-transparent via-blue-500 to-transparent rounded-full"></div>
            </div>
            {{-- Added gradient text to "Journal" --}}
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 leading-tight tracking-tight px-2 md:px-0">
                Latest From Our
                <span class="block mt-1 bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600 bg-clip-text text-transparent">Journal</span>
            </h1>
            <p class="text-gray-600 text-sm md:text-lg mt-4 max-w-2xl mx-auto px-2 md:px-0">Discover expert tips, guides, and stories about pet care</p>
        </div>

        {{-- Articles Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $index => $article)
                <article 
                    class="group relative bg-white/80 backdrop-blur-sm rounded-3xl overflow-hidden border border-gray-200/50 hover:border-blue-300/50 hover:shadow-2xl hover:shadow-blue-500/20 hover:-translate-y-2 transition-all duration-500"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 100 }}"
                >
                    {{-- Image Container --}}
                    <div class="relative h-56 md:h-72 overflow-hidden">
                        @if($article->thumbnail)
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-50 to-blue-100/50 flex items-center justify-center">
                                <svg class="w-16 h-16 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        
                        {{-- Enhanced date badge with backdrop blur --}}
                        <div class="absolute top-6 right-6">
                            <div class="bg-white/95 backdrop-blur-md text-blue-600 px-4 py-2 rounded-full text-xs font-bold shadow-lg shadow-black/10">
                                {{ $article->created_at->format('d M Y') }}
                            </div>
                        </div>
                        
                        {{-- Enhanced category badge with glow --}}
                        <div class="absolute bottom-6 left-6">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wide shadow-lg shadow-blue-500/50">
                                Article
                            </div>
                        </div>
                    </div>
                    
                    {{-- Content --}}
                    <div class="p-6 md:p-8">
                        <h3 class="text-lg md:text-2xl font-bold text-gray-900 mb-3 md:mb-4 group-hover:text-blue-600 transition-colors leading-tight line-clamp-2">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-500 text-xs md:text-base leading-relaxed mb-6 line-clamp-2 md:line-clamp-3">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                        </p>
                        
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-2 text-blue-600 font-semibold text-sm group-hover:gap-3 transition-all">
                            Read More
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    {{-- Enhanced decorative corner with gradient --}}
                    <div class="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tl from-blue-500/10 to-transparent rounded-tl-[3rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </article>
            @endforeach
        </div>
        
        {{-- Enhanced button with glassmorphism and shimmer effect --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <a href="{{ route('articles.index') }}" class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-10 py-5 rounded-2xl font-semibold text-base hover:shadow-2xl hover:shadow-blue-500/50 hover:scale-105 transition-all overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                <span class="relative z-10">View All Articles</span>
                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
