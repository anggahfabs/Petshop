<section class="py-16 md:py-32 bg-gradient-to-b from-white via-gray-50/30 to-white overflow-hidden relative">
    <!-- Added smooth background gradient for seamless transition -->
    <div class="max-w-[1800px] mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 md:mb-24 gap-8" data-aos="fade-up">
            <div class="max-w-3xl">
                <!-- Added glow effect to badge -->
                <h2 class="text-blue-600 font-bold uppercase mb-4 text-[10px] md:text-sm bg-blue-50 px-4 py-2 rounded-full inline-block shadow-lg shadow-blue-500/20">Visual Journey</h2>
                <!-- Added gradient text to title -->
                <h1 class="text-3xl md:text-5xl font-bold bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent leading-tight px-2 md:px-0 text-center md:text-left">Gallery of <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">Happiness</span></h1>
            </div>
            <p class="text-gray-500 font-medium max-w-xs text-sm leading-relaxed hidden sm:block">
                Capturing the best moments of our furry friends and their happy families.
            </p>
        </div>

        <div class="columns-2 sm:columns-2 lg:columns-4 gap-4 md:gap-10 space-y-4 md:space-y-10">
            @foreach($galleries as $index => $item)
                <div 
                    class="relative group rounded-2xl md:rounded-[4rem] overflow-hidden shadow-2xl shadow-gray-900/10 break-inside-avoid transform transition-all duration-1000 hover:scale-[1.02] border border-gray-100"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 50 }}"
                >
                    <!-- Enhanced shadow and hover effects -->
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-auto object-cover transition-transform duration-[2000ms] group-hover:scale-125">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-600/90 via-blue-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700 flex flex-col justify-end p-4 md:p-12 backdrop-blur-[2px]">
                        <div class="transform translate-y-10 group-hover:translate-y-0 transition-transform duration-700">
                            <span class="text-blue-100 font-bold text-[8px] md:text-xs mb-2 md:mb-4 block uppercase tracking-wider">Store Moments</span>
                            <h3 class="text-white text-sm md:text-2xl font-bold leading-tight drop-shadow-lg line-clamp-2 md:line-clamp-none">{{ $item->title }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
