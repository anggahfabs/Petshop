<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute top-0 right-0 w-full md:w-1/3 h-full bg-blue-50/50 -skew-x-12 translate-x-1/2 hidden md:block"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 md:mb-24 gap-8" data-aos="fade-up">
            <div class="max-w-2xl">
                <h2 class="text-blue-600 font-black tracking-[0.3em] uppercase mb-4 text-xs md:text-sm">Professional Care</h2>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-gray-900 leading-[0.95] tracking-tighter">Our Exclusive <br>Pet Services</h1>
            </div>
            <a href="{{ route('services.index') }}" class="group flex items-center gap-4 text-gray-900 font-black uppercase tracking-widest text-[10px] md:text-xs hover:text-blue-600 transition-colors">
                View All Services
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-gray-200 flex items-center justify-center group-hover:border-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            @foreach($services as $index => $service)
                <div 
                    class="group bg-white rounded-[3.5rem] p-3 md:p-4 shadow-xl shadow-gray-200/50 border border-gray-100 hover:-translate-y-4 transition-all duration-700"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 150 }}"
                >
                    <div class="relative h-64 md:h-72 rounded-[3rem] overflow-hidden mb-8">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                        @else
                            <div class="w-full h-full bg-blue-50 flex items-center justify-center">
                                <svg class="w-16 h-16 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    </div>
                    
                    <div class="px-6 pb-8 text-center">
                        <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-4 group-hover:text-blue-600 transition-colors tracking-tight">{{ $service->name }}</h3>
                        <p class="text-gray-500 text-base md:text-lg leading-relaxed mb-10 line-clamp-2 font-medium">
                            {{ $service->description }}
                        </p>
                        <a href="{{ route('services.index') }}" class="inline-block px-10 py-4 md:py-5 bg-gray-50 text-gray-900 rounded-2xl font-black text-xs md:text-sm uppercase tracking-widest group-hover:bg-blue-600 group-hover:text-white shadow-sm transition-all duration-300">
                            Learn More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
