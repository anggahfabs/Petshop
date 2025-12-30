<section class="py-24 md:py-32 bg-white overflow-hidden relative">
    <div class="max-w-[1800px] mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 md:mb-24 gap-8" data-aos="fade-up">
            <div class="max-w-3xl">
                <h2 class="text-blue-600 font-black tracking-[0.3em] uppercase mb-4 text-xs md:text-sm">Visual Journey</h2>
                <h1 class="text-4xl md:text-6xl lg:text-8xl font-black text-gray-900 tracking-tighter leading-[0.9]">Gallery of <br class="hidden md:block"> Happiness</h1>
            </div>
            <p class="text-gray-300 font-bold max-w-xs text-left md:text-right hidden sm:block uppercase tracking-widest text-[10px] leading-loose">
                Capturing the best moments of our furry friends and their happy families.
            </p>
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-4 gap-6 md:gap-10 space-y-6 md:space-y-10">
            @foreach($galleries as $index => $item)
                <div 
                    class="relative group rounded-[3rem] md:rounded-[4rem] overflow-hidden shadow-2xl shadow-gray-200/50 break-inside-avoid transform transition-all duration-1000 hover:scale-[1.02] border border-gray-50"
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 50 }}"
                >
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-auto object-cover transition-transform duration-[2000ms] group-hover:scale-125">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-600/90 via-blue-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700 flex flex-col justify-end p-8 md:p-12">
                        <div class="transform translate-y-10 group-hover:translate-y-0 transition-transform duration-700">
                            <span class="text-white/60 font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">Store Moments</span>
                            <h3 class="text-white text-2xl md:text-3xl font-black leading-tight tracking-tight">{{ $item->title }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
