@extends('layouts.app')
@section('title', 'Photo Gallery')

@section('content')
<div class="pt-40 pb-24 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-20" data-aos="fade-down">
            <h2 class="text-blue-600 font-black tracking-[0.4em] uppercase mb-4 text-sm">Visual Journey</h2>
            <h1 class="text-6xl md:text-8xl font-black text-gray-900 mb-8 tracking-tighter">Our Photo Gallery</h1>
            <div class="w-48 h-2.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        @if($galleries->count())
            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
                @foreach($galleries as $index => $item)
                    <div 
                        class="relative group rounded-[3.5rem] overflow-hidden shadow-2xl shadow-gray-200/50 break-inside-avoid transform transition-all duration-700 hover:scale-[1.02] border border-gray-100"
                        data-aos="fade-up" 
                        data-aos-delay="{{ $index * 50 }}"
                    >
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-auto object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-600/90 via-blue-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-10">
                            <div class="transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500">
                                <span class="text-white/70 font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">Capturing Moments</span>
                                <h3 class="text-white text-3xl font-black leading-tight">{{ $item->title }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-40 bg-white rounded-[5rem] shadow-2xl shadow-gray-200/50 border border-gray-100" data-aos="zoom-in">
                <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-4xl font-black text-gray-900 mb-4">No Photos Found</h3>
                <p class="text-gray-400 text-xl font-bold">We will share our moments soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection