@if(isset($brands) && $brands->count())
<section class="py-16 md:py-20 bg-gray-50 border-y border-gray-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-20">
            <div class="w-full lg:w-1/4 text-center lg:text-left" data-aos="fade-right">
                <h3 class="text-sm md:text-xl font-black text-gray-300 uppercase tracking-[0.3em] leading-tight">Partner <br class="hidden lg:block"> Collaborations</h3>
            </div>
            <div class="w-full lg:w-3/4">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8 md:gap-12 items-center opacity-30 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-1000">
                    @foreach($brands as $index => $brand)
                        <div class="h-10 md:h-14 flex items-center justify-center p-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            @if($brand->logo)
                                <img 
                                    src="{{ asset('storage/'.$brand->logo) }}" 
                                    alt="{{ $brand->name }}" 
                                    class="h-full w-auto object-contain transition-transform duration-500 hover:scale-110"
                                    title="{{ $brand->name }}"
                                >
                            @else
                                <span class="text-xl md:text-2xl font-black text-gray-200 uppercase tracking-tighter">{{ $brand->name }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
