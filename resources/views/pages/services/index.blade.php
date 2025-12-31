@extends('layouts.app')
@section('title', 'Professional Pet Care Services')

@section('content')
<div class="pt-32 md:pt-40 pb-24 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Header Section --}}
        <div class="text-center mb-16 md:mb-24" data-aos="fade-down">
            <h2 class="text-blue-600 font-bold uppercase mb-4 text-[10px] md:text-sm tracking-widest">World Class Care</h2>
            <h1 class="text-3xl md:text-6xl font-bold text-gray-900 mb-6 md:mb-8 leading-tight px-4">Our Professional Services</h1>
            <div class="w-24 md:w-48 h-1.5 md:h-2.5 bg-blue-600 mx-auto rounded-full mb-6 md:mb-8"></div>
            <p class="text-gray-500 text-base md:text-xl max-w-2xl mx-auto font-medium px-4">
                We provide a wide range of expert pet care services designed to keep your furry companions happy, healthy, and thriving.
            </p>
        </div>

        {{-- Services Grid --}}
        @if($services->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                @foreach($services as $index => $service)
                    <div 
                        class="group bg-white rounded-3xl md:rounded-[4rem] overflow-hidden shadow-lg md:shadow-xl shadow-gray-200 border border-gray-100 hover:shadow-2xl hover:shadow-blue-200 transition-all duration-700"
                        data-aos="fade-up" 
                        data-aos-delay="{{ $index * 100 }}"
                    >
                        {{-- Image Section --}}
                        <div class="relative h-64 md:h-80 overflow-hidden">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[1500ms]">
                            @else
                                <div class="w-full h-full bg-gray-50 flex items-center justify-center font-bold text-gray-200 text-xs italic">NO SERVICE IMAGE</div>
                            @endif
                            
                            @if(isset($service->price))
                                <div class="absolute top-6 md:top-8 right-6 md:right-8 bg-white/95 backdrop-blur-md px-4 md:px-5 py-1.5 md:py-2 rounded-full text-[10px] md:text-xs font-bold text-blue-600 shadow-lg border border-white/20">
                                    Starts from Rp {{ number_format($service->price, 0, ',', '.') }}
                                </div>
                            @endif
                        </div>

                        <div class="p-8 md:p-12">
                            <h3 class="text-xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6 group-hover:text-blue-600 transition-colors leading-tight">
                                {{ $service->name }}
                            </h3>
                            <p class="text-gray-500 text-sm md:text-lg mb-8 md:mb-10 leading-relaxed font-medium">
                                {{ $service->description }}
                            </p>
                            
                            <a href="{{ route('appointments.index') }}" class="inline-flex items-center gap-3 md:gap-4 text-gray-900 font-bold hover:gap-5 md:hover:gap-6 transition-all text-xs md:text-sm group/btn">
                                <span>Book This Service</span>
                                <div class="w-8 h-8 md:w-12 md:h-12 rounded-full border border-gray-100 flex items-center justify-center group-hover/btn:bg-blue-600 group-hover/btn:text-white group-hover/btn:border-blue-600 transition-all duration-300">
                                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-40 bg-white rounded-[5rem] shadow-2xl shadow-gray-200/50 border border-gray-100" data-aos="zoom-in">
                <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-4">No Services Available</h3>
                <p class="text-gray-400 text-lg">We are currently updating our service offerings. Please check back soon!</p>
            </div>
        @endif

        {{-- CTA Section --}}
        <div class="mt-24 md:mt-32 bg-blue-600 rounded-3xl md:rounded-[4rem] p-8 md:p-20 text-center relative overflow-hidden group" data-aos="zoom-in">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-1000"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-black/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-1000"></div>
            
            <div class="relative z-10">
                <h2 class="text-white/80 font-bold uppercase mb-4 md:mb-6 text-[10px] md:text-sm tracking-widest leading-relaxed px-4">Still have questions?</h2>
                <h1 class="text-3xl md:text-6xl font-bold text-white mb-8 md:mb-12 leading-tight px-4">We're here to help you <br class="hidden md:block">& your best friend</h1>
                <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-6 px-4">
                    <a href="{{ route('appointments.index') }}" class="bg-white text-blue-600 px-8 md:px-10 py-4 md:py-5 rounded-xl md:rounded-2xl font-bold hover:scale-105 transition-transform active:scale-95 shadow-xl text-sm md:text-base">
                        Book Appointment
                    </a>
                    <a href="{{ route('contact.index') }}" class="bg-blue-700/50 backdrop-blur-md text-white border-2 border-white/20 px-8 md:px-10 py-4 md:py-5 rounded-xl md:rounded-2xl font-bold hover:bg-blue-800 transition-all text-sm md:text-base">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection