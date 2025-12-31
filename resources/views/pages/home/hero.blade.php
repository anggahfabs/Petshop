<section 
    x-data="{ 
        activeSlide: 0, 
        slides: {{ $heroes->count() > 0 ? $heroes->count() : 1 }},
        next() { this.activeSlide = (this.activeSlide + 1) % this.slides },
        prev() { this.activeSlide = (this.activeSlide - 1 + this.slides) % this.slides },
        autoplay() { setInterval(() => this.next(), 8000) }
    }" 
    x-init="autoplay()"
    class="relative h-screen min-h-[600px] md:min-h-[800px] lg:min-h-screen overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950"
>
    {{-- Enhanced decorative overlay with better gradient --}}
    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-black via-black/40 to-transparent z-10 pointer-events-none"></div>

    {{-- Empty State --}}
    @if($heroes->count() == 0)
        <div class="absolute inset-0 flex items-center justify-center text-white">
            <div class="text-center px-6 space-y-6">
                <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-2xl shadow-blue-500/50">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-7xl font-bold text-white mb-4 md:mb-6">Welcome to OVI Petshop</h1>
                <p class="text-base md:text-xl text-slate-400 max-w-xs md:max-w-md mx-auto">Please add heroes in admin panel to see the slider.</p>
            </div>
        </div>
    @endif

    {{-- Slides --}}
    @foreach($heroes as $index => $hero)
        <div 
            x-show="activeSlide === {{ $index }}"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0"
        >
            {{-- Enhanced image with better zoom animation --}}
            <div 
                class="absolute inset-0 transform transition-transform duration-[10000ms] ease-out"
                :class="activeSlide === {{ $index }} ? 'scale-110' : 'scale-100'"
            >
                @if($hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" class="w-full h-full object-cover" alt="{{ $hero->title }}">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-950 via-slate-900 to-indigo-950"></div>
                @endif
                {{-- Modern gradient overlay with better depth --}}
                <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-black/30"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-blue-950/10 via-transparent to-transparent"></div>
            </div>

            {{-- Content --}}
            <div class="relative h-full max-w-7xl mx-auto px-6 md:px-12 lg:px-16 flex items-center">
                <div class="max-w-4xl space-y-8">
                    {{-- Enhanced badge with glow effect --}}
                    <div 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-200 duration-1000"
                        x-transition:enter-start="opacity-0 -translate-x-12"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="flex items-center gap-3 mb-6"
                    >
                        <div class="relative">
                            <div class="absolute inset-0 bg-blue-500 blur-md opacity-50"></div>
                            <div class="relative w-12 md:w-16 h-0.5 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 rounded-full"></div>
                        </div>
                        <span class="relative text-blue-400 font-bold tracking-[0.2em] md:tracking-[0.25em] uppercase text-[10px] md:text-sm">
                            Premium Pet Care
                            <span class="absolute -inset-1 bg-blue-500/20 blur-sm -z-10 rounded"></span>
                        </span>
                    </div>

                    {{-- Title tanpa gradient --}}
                    <h1 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-400 duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-12"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-extrabold text-white leading-tight md:leading-[1.05] tracking-tight"
                        style="text-shadow: 0 10px 40px rgba(0,0,0,0.8), 0 0 60px rgba(59,130,246,0.3);"
                    >
                        {{ $hero->title }}
                    </h1>

                    {{-- Enhanced subtitle with better styling --}}
                    <p 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-600 duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-6"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-base md:text-xl lg:text-2xl text-slate-200 max-w-2xl font-medium md:font-light leading-relaxed opacity-90"
                        style="text-shadow: 0 4px 16px rgba(0,0,0,0.8);"
                    >
                        {{ $hero->subtitle }}
                    </p>

                    {{-- Enhanced buttons with modern design --}}
                    <div 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-800 duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-6"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="flex flex-col sm:flex-row gap-3 md:gap-4 pt-4 md:pt-6"
                    >
                        <a href="{{ route('products.index') }}" class="group relative overflow-hidden bg-blue-600 text-white px-8 md:px-12 py-4 md:py-5 rounded-2xl font-bold text-sm md:text-base shadow-2xl shadow-blue-500/40 hover:scale-[1.02] transition-all flex items-center justify-center gap-3">
                            <span class="relative z-10">Shop Products</span>
                            <svg class="relative z-10 w-4 h-4 md:w-5 md:h-5 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('contact.index') }}" class="group relative bg-white/5 backdrop-blur-xl text-white border border-white/20 px-8 md:px-12 py-4 md:py-5 rounded-2xl font-bold text-sm md:text-base hover:bg-white/10 transition-all text-center">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Enhanced bottom bar with modern glassmorphism --}}
    <div class="absolute bottom-8 md:bottom-12 lg:bottom-16 left-0 right-0 z-20 px-6 md:px-12 lg:px-16">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            {{-- Indicators --}}
            <div class="flex items-center gap-2 md:gap-3">
                @foreach($heroes as $index => $hero)
                    <button 
                        @click="activeSlide = {{ $index }}" 
                        class="group relative transition-all duration-500"
                        aria-label="Go to slide {{ $index + 1 }}"
                    >
                        <div 
                            class="rounded-full transition-all duration-500 shadow-lg"
                            :class="activeSlide === {{ $index }} 
                                ? 'w-12 md:w-16 h-2 bg-gradient-to-r from-blue-500 to-blue-400 shadow-blue-500/50' 
                                : 'w-8 md:w-10 h-1.5 bg-white/25 group-hover:bg-white/40 group-hover:w-10 md:group-hover:w-12'"
                        >
                            <div 
                                class="absolute inset-0 bg-blue-400 rounded-full blur-sm opacity-0 transition-opacity duration-500"
                                :class="activeSlide === {{ $index }} ? 'opacity-50' : ''"
                            ></div>
                        </div>
                    </button>
                @endforeach
            </div>

            {{-- Enhanced controls with glassmorphism --}}
            <div class="flex gap-2 md:gap-3">
                <button 
                    @click="prev()" 
                    class="w-10 h-10 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 flex items-center justify-center text-white hover:bg-white hover:text-black transition-all"
                    aria-label="Previous slide"
                >
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button 
                    @click="next()" 
                    class="w-10 h-10 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-blue-600 flex items-center justify-center text-white transition-all shadow-xl shadow-blue-500/20"
                    aria-label="Next slide"
                >
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</section>