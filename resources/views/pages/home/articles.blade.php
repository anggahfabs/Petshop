<section class="py-24 md:py-32 bg-gray-900 relative overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute -top-24 -right-24 w-64 md:w-96 h-64 md:h-96 bg-blue-600/10 rounded-full blur-[100px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            <h2 class="text-blue-500 font-black tracking-[0.3em] uppercase mb-4 text-xs md:text-sm">Pet Knowledge</h2>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white mb-8 tracking-tighter leading-[0.95]">Latest From Journal</h1>
            <div class="w-24 h-2 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            @foreach($articles as $index => $article)
                <article 
                    class="group bg-gray-800/40 backdrop-blur-md rounded-[3.5rem] overflow-hidden border border-white/5 hover:border-blue-500/50 transition-all duration-700"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 150 }}"
                >
                    <div class="relative h-64 md:h-80 overflow-hidden">
                        @if($article->thumbnail)
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1500ms]">
                        @else
                            <div class="w-full h-full bg-gray-700 flex items-center justify-center font-black text-gray-600 text-xs">NO ARTICLE IMAGE</div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <div class="absolute top-6 right-6">
                            <div class="bg-blue-600/90 backdrop-blur-md text-white px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-2xl">
                                {{ $article->created_at->format('d M') }}
                            </div>
                        </div>
                    </div>
                    <div class="p-10">
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-6 group-hover:text-blue-500 transition-colors line-clamp-2 leading-tight tracking-tight">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-400 text-base md:text-lg mb-10 line-clamp-2 font-medium leading-relaxed">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 100) }}
                        </p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-4 text-white font-black hover:gap-6 transition-all uppercase tracking-widest text-xs group/link">
                            <span>Read Full Story</span>
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border border-white/10 flex items-center justify-center group-hover/link:border-blue-500 group-hover/link:bg-blue-500 transition-all duration-300">
                                <svg class="w-4 h-4 text-blue-500 group-hover/link:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </div>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
