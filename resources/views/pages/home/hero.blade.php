<section 
    x-data="{ 
        activeSlide: 0, 
        slides: {{ $heroes->count() > 0 ? $heroes->count() : 1 }},
        next() { this.activeSlide = (this.activeSlide + 1) % this.slides },
        prev() { this.activeSlide = (this.activeSlide - 1 + this.slides) % this.slides },
        autoplay() { setInterval(() => this.next(), 8000) }
    }" 
    x-init="autoplay()"
    class="relative h-screen min-h-[600px] md:min-h-[700px] overflow-hidden bg-black"
>
    {{-- Decorative Overlay --}}
    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-white to-transparent z-10"></div>

    {{-- Empty State --}}
    @if($heroes->count() == 0)
        <div class="absolute inset-0 flex items-center justify-center text-white">
            <div class="text-center px-6">
                <h1 class="text-4xl md:text-6xl font-black mb-4">Welcome to Petshop</h1>
                <p class="text-lg opacity-60">Please add heroes in admin panel to see the slider.</p>
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
            {{-- Image with Zoom Animation --}}
            <div 
                class="absolute inset-0 transform transition-transform duration-[8000ms] ease-linear"
                :class="activeSlide === {{ $index }} ? 'scale-110' : 'scale-100'"
            >
                @if($hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-900"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
            </div>

            {{-- Content --}}
            <div class="relative h-full max-w-7xl mx-auto px-6 md:px-12 flex items-center pt-20">
                <div class="max-w-4xl">
                    <div 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-300 duration-1000"
                        x-transition:enter-start="opacity-0 -translate-x-10"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="flex items-center gap-4 mb-6"
                    >
                        <div class="w-8 md:w-12 h-1 bg-blue-600 rounded-full"></div>
                        <span class="text-blue-500 font-black tracking-[0.3em] md:tracking-[0.5em] uppercase text-xs md:text-sm">Elite Pet Care</span>
                    </div>

                    <h1 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-500 duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-20"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-4xl sm:text-6xl md:text-8xl lg:text-9xl font-black text-white mb-8 leading-[0.95] tracking-tighter"
                    >
                        {{ $hero->title }}
                    </h1>

                    <p 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-700 duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-10"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-base md:text-xl lg:text-2xl text-gray-300 mb-12 max-w-xl font-medium leading-relaxed"
                    >
                        {{ $hero->subtitle }}
                    </p>

                    <div 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition delay-900 duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-10"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="flex flex-col sm:flex-row gap-4 md:gap-6"
                    >
                        <a href="{{ $hero->button_link ?? route('services.index') }}" class="group bg-blue-600 text-white px-8 md:px-12 py-4 md:py-5 rounded-2xl font-black text-sm md:text-lg shadow-2xl shadow-blue-500/40 hover:bg-blue-700 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                            {{ $hero->button_text ?? 'Discover More' }}
                            <svg class="w-5 h-5 md:w-6 md:h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="{{ route('contact.index') }}" class="bg-white/10 backdrop-blur-md text-white border-2 border-white/20 px-8 md:px-12 py-4 md:py-5 rounded-2xl font-black text-sm md:text-lg hover:bg-white/20 transition-all text-center">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Bottom Bar --}}
    <div class="absolute bottom-12 md:bottom-16 left-0 right-0 z-20 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            {{-- Indicators --}}
            <div class="flex items-center gap-4 md:gap-6">
                @foreach($heroes as $index => $hero)
                    <button 
                        @click="activeSlide = {{ $index }}" 
                        class="group relative h-8 md:h-10 w-1.5 md:w-2 flex items-center transition-all duration-500"
                    >
                        <div 
                            class="w-full transition-all duration-500 rounded-full"
                            :class="activeSlide === {{ $index }} ? 'h-full bg-blue-600' : 'h-1/2 bg-white/20 group-hover:bg-white/40'"
                        ></div>
                    </button>
                @endforeach
            </div>

            {{-- Controls --}}
            <div class="flex gap-3 md:gap-4">
                <button @click="prev()" class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl border-2 border-white/10 flex items-center justify-center text-white hover:bg-white hover:text-black hover:border-white hover:-translate-x-1 transition-all">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="next()" class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-blue-600 flex items-center justify-center text-white hover:bg-blue-700 hover:translate-x-1 transition-all shadow-xl shadow-blue-500/20">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</section>
