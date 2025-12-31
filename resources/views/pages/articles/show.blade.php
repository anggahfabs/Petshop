@extends('layouts.app')
@section('title', $article->title)

@section('content')
<article class="pt-32 md:pt-48 pb-16 md:pb-24 bg-white overflow-hidden">
    {{-- Hero Header --}}
    <div class="max-w-5xl mx-auto px-6 mb-12 md:mb-24 text-center" data-aos="fade-up">
        <div class="flex items-center justify-center gap-4 md:gap-6 text-blue-600 font-bold uppercase text-[10px] md:text-xs mb-8 md:mb-10 tracking-widest leading-relaxed">
            <span>{{ $article->created_at->format('M d, Y') }}</span>
            <div class="w-8 md:w-10 h-[2px] bg-blue-100"></div>
            <span>Pet Care Guide</span>
        </div>
        <h1 class="text-3xl md:text-6xl font-bold text-gray-900 mb-8 md:mb-12 leading-tight px-2">
            {{ $article->title }}
        </h1>
        <div class="flex items-center justify-center gap-6 md:gap-8">
            <div class="w-16 h-16 md:w-20 md:h-20 rounded-full overflow-hidden bg-gray-100 ring-4 md:ring-8 ring-blue-50 border-white border-2 md:border-4 shadow-xl">
                <img src="https://ui-avatars.com/api/?name=Admin&background=0284c7&color=fff" class="w-full h-full object-cover">
            </div>
            <div class="text-left">
                <p class="font-bold text-lg md:text-xl text-gray-900 leading-none mb-1 md:mb-2">Expert Admin</p>
                <p class="text-gray-400 text-[10px] md:text-xs font-semibold uppercase tracking-wider">Professional Pet Specialist</p>
            </div>
        </div>
    </div>

    {{-- Featured Image --}}
    <div class="max-w-7xl mx-auto px-6 mb-16 md:mb-32" data-aos="zoom-in">
        <div class="rounded-3xl md:rounded-[5rem] overflow-hidden shadow-2xl shadow-gray-200 aspect-video group border md:border-0 border-gray-100">
            @if($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
            @else
                <div class="w-full h-full bg-gray-50 flex items-center justify-center font-bold text-gray-200 text-xs italic">NO FEATURED IMAGE</div>
            @endif
        </div>
    </div>

    {{-- Body Content --}}
    <div class="max-w-4xl mx-auto px-6">
        <div class="prose prose-base md:prose-xl prose-gray font-medium leading-relaxed md:leading-[1.8] mb-16 md:mb-24 max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-strong:font-bold prose-a:text-blue-600 prose-img:rounded-2xl md:prose-img:rounded-[3rem]" data-aos="fade-up">
            {!! $article->content !!}
        </div>

        {{-- Footer/Author --}}
        <div class="border-y border-gray-100 py-10 md:py-16 flex flex-col md:flex-row items-center justify-between gap-8 md:gap-10" data-aos="fade-up">
            <div class="flex items-center gap-6 md:gap-8">
                <h4 class="font-bold text-gray-400 uppercase text-[10px] md:text-xs tracking-widest">Share:</h4>
                <div class="flex gap-3 md:gap-4">
                     <button class="w-10 h-10 md:w-14 md:h-14 bg-gray-50 rounded-xl md:rounded-2xl flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white hover:shadow-xl hover:shadow-blue-200 transition-all duration-300"><svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></button>
                     <button class="w-10 h-10 md:w-14 md:h-14 bg-gray-50 rounded-xl md:rounded-2xl flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white hover:shadow-xl hover:shadow-blue-200 transition-all duration-300"><svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path></svg></button>
                </div>
            </div>
            <a href="{{ route('articles.index') }}" class="font-bold text-gray-900 flex items-center gap-3 md:gap-5 hover:gap-8 transition-all text-xs md:text-sm group">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border border-gray-100 flex items-center justify-center group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5 md:w-6 md:h-6 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
                Return to Blog
            </a>
        </div>
    </div>
</article>
@endsection
