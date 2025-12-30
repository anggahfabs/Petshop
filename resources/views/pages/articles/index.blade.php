@extends('layouts.app')
@section('title', 'Pet Professional Blog')

@section('content')
<div class="pt-40 pb-24 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-24" data-aos="fade-down">
            <h2 class="text-blue-600 font-black tracking-[0.4em] uppercase mb-4 text-sm">Our Journal</h2>
            <h1 class="text-6xl md:text-8xl font-black text-gray-900 mb-8 tracking-tighter">Insights & News</h1>
            <div class="w-48 h-2.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        @if($articles->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($articles as $index => $article)
                    <article 
                        class="group bg-white rounded-[4rem] overflow-hidden shadow-2xl shadow-gray-200/50 border border-gray-100 hover:-translate-y-4 transition-all duration-700"
                        data-aos="fade-up" 
                        data-aos-delay="{{ $index * 100 }}"
                    >
                        <div class="relative h-80 overflow-hidden">
                            @if($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center font-black text-gray-300">NO IMAGE</div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="absolute top-8 left-8">
                                <span class="bg-blue-600 text-white px-6 py-2.5 rounded-full text-[10px] font-black uppercase tracking-[0.3em] shadow-xl">
                                    Pet Care
                                </span>
                            </div>
                        </div>
                        <div class="p-12">
                            <div class="flex items-center gap-4 text-gray-400 text-xs font-black uppercase tracking-widest mb-8">
                                <span>{{ $article->created_at->format('M d, Y') }}</span>
                                <span class="w-6 h-[1px] bg-gray-200"></span>
                                <span>Published by Admin</span>
                            </div>
                            <h3 class="text-4xl font-black text-gray-900 mb-8 group-hover:text-blue-600 transition-colors line-clamp-2 leading-[1.1] tracking-tight">
                                {{ $article->title }}
                            </h3>
                            <p class="text-gray-500 text-xl mb-12 line-clamp-3 leading-relaxed font-medium">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-4 text-gray-900 font-black hover:gap-6 transition-all uppercase tracking-widest text-xs bg-gray-50 px-10 py-5 rounded-2xl group-hover:bg-blue-600 group-hover:text-white group-hover:shadow-xl group-hover:shadow-blue-200">
                                Read More
                                <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-24">
                {{ $articles->links() }}
            </div>
        @else
            <div class="text-center py-40 bg-white rounded-[5rem] shadow-2xl shadow-gray-200/50 border border-gray-100" data-aos="zoom-in">
                <h3 class="text-4xl font-black text-gray-900 mb-4">No Articles Yet</h3>
                <p class="text-gray-400 text-xl font-bold">Stay tuned for amazing pet stories!</p>
            </div>
        @endif
    </div>
</div>
@endsection