@if(isset($brands) && $brands->count())
<section class="relative py-12 md:py-28 overflow-hidden">
    {{-- Updated background gradient for smooth flow from hero --}}
    <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white"></div>
    
    {{-- More prominent decorative shapes with better glow --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
    <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-blue-400/8 rounded-full blur-2xl"></div>
    
    {{-- Slightly more visible grid pattern --}}
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, #3b82f6 1px, transparent 1px); background-size: 40px 40px;"></div>
    
    {{-- Top Wave Transition --}}
    <div class="absolute top-0 left-0 right-0 h-16">
        <svg class="w-full h-full" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,50 Q360,0 720,50 T1440,50 L1440,0 L0,0 Z" fill="white" opacity="0.8"/>
        </svg>
    </div>
    
    {{-- Bottom Wave Transition --}}
    <div class="absolute bottom-0 left-0 right-0 h-16">
        <svg class="w-full h-full" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,50 Q360,100 720,50 T1440,50 L1440,100 L0,100 Z" fill="white"/>
        </svg>
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            {{-- Title Section --}}
            <div class="w-full lg:w-1/3 text-center lg:text-left" data-aos="fade-right">
                <div class="inline-block mb-4">
                    {{-- Enhanced badge with glow effect --}}
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full shadow-lg shadow-blue-500/50"></div>
                        <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider">Trusted Partners</span>
                    </div>
                </div>
                {{-- Better typography with subtle gradient --}}
                <h3 class="text-xl md:text-3xl font-bold text-gray-900 leading-tight">
                    Trusted by Leading
                    <span class="inline md:block mt-1 bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">Partner Brands</span>
                </h3>
            </div>

            {{-- Brands Grid --}}
            <div class="w-full lg:w-2/3">
                <div class="relative">
                    {{-- Adjusted gradient fade edges --}}
                    <div class="absolute left-0 top-0 bottom-0 w-12 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute right-0 top-0 bottom-0 w-12 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                        @foreach($brands as $index => $brand)
                            <div 
                                class="group relative bg-white/80 backdrop-blur-sm rounded-xl md:rounded-2xl p-4 md:p-8 flex items-center justify-center transition-all duration-500 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-1 border border-gray-100/80"
                                data-aos="fade-up" 
                                data-aos-delay="{{ $index * 80 }}"
                            >
                                {{-- Enhanced glow effect on hover --}}
                                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                {{-- Improved grayscale to color transition --}}
                                <div class="relative h-12 md:h-16 w-full flex items-center justify-center grayscale group-hover:grayscale-0 opacity-50 group-hover:opacity-100 transition-all duration-500">
                                    @if($brand->logo)
                                        <img 
                                            src="{{ asset('storage/'.$brand->logo) }}" 
                                            alt="{{ $brand->name }}" 
                                            class="h-full w-auto object-contain transform group-hover:scale-110 transition-transform duration-500 filter drop-shadow-lg"
                                            title="{{ $brand->name }}"
                                        >
                                    @else
                                        <span class="text-base md:text-lg font-bold text-gray-400 group-hover:text-gray-700 uppercase transition-colors">{{ $brand->name }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
