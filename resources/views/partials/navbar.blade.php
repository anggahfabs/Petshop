<nav 
    x-data="{ 
        scrolled: false,
        mobileMenuOpen: false,
        isHome: {{ Route::is('home') ? 'true' : 'false' }} 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="(scrolled || !isHome || mobileMenuOpen) ? 'bg-white/95 backdrop-blur-md shadow-xl py-4' : 'bg-transparent py-6'"
    class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500 px-6 md:px-12"
>
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="group flex items-center gap-3 relative z-[110]">
            <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform duration-500">
                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zM5 10a5 5 0 1110 0 5 5 0 01-10 0z"></path></svg>
            </div>
            <span :class="(scrolled || !isHome || mobileMenuOpen) ? 'text-gray-900' : 'text-white'" class="text-2xl md:text-3xl font-black tracking-tighter transition-colors duration-500">PET<span class="text-blue-600">SHOP</span></span>
        </a>

        {{-- Desktop Menu --}}
        <ul class="hidden lg:flex items-center gap-10">
            @php $links = ['Home' => 'home', 'Services' => 'services.index', 'Products' => 'products.index', 'Articles' => 'articles.index', 'Gallery' => 'gallery.index', 'Contact' => 'contact.index']; @endphp
            @foreach($links as $name => $route)
                <li>
                    <a href="{{ route($route) }}" 
                       :class="(scrolled || !isHome) ? 'text-gray-700 hover:text-blue-600' : 'text-white hover:text-white'"
                       class="font-black text-sm uppercase tracking-[0.1em] transition-all duration-300 relative group py-2"
                    >
                        {{ $name }}
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-500 group-hover:w-full"></span>
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Action Buttons --}}
        <div class="flex items-center gap-4 relative z-[110]">
            <a href="{{ route('appointments.index') }}" 
               class="hidden md:flex bg-blue-600 text-white px-8 py-3.5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300">
                Book Visit
            </a>
            
            {{-- Mobile Toggle --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-12 h-12 flex flex-col items-center justify-center gap-1.5 transition-all outline-none">
                <span class="w-8 h-1 bg-current transition-all duration-300" :class="{'rotate-45 translate-y-2.5': mobileMenuOpen, 'text-gray-900': (scrolled || !isHome || mobileMenuOpen), 'text-white': (!scrolled && isHome && !mobileMenuOpen)}"></span>
                <span class="w-8 h-1 bg-current transition-all duration-300" :class="{'opacity-0': mobileMenuOpen, 'text-gray-900': (scrolled || !isHome || mobileMenuOpen), 'text-white': (!scrolled && isHome && !mobileMenuOpen)}"></span>
                <span class="w-8 h-1 bg-current transition-all duration-300" :class="{'-rotate-45 -translate-y-2.5': mobileMenuOpen, 'text-gray-900': (scrolled || !isHome || mobileMenuOpen), 'text-white': (!scrolled && isHome && !mobileMenuOpen)}"></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div 
        x-show="mobileMenuOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-20px]"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-[-20px]"
        class="absolute top-full left-0 right-0 bg-white border-t border-gray-100 shadow-2xl lg:hidden max-h-screen overflow-y-auto"
        @click.away="mobileMenuOpen = false"
    >
        <div class="p-8 space-y-4">
            @foreach($links as $name => $route)
                <a href="{{ route($route) }}" class="block text-2xl font-black text-gray-900 hover:text-blue-600 transition-colors py-2 border-b border-gray-50">
                    {{ $name }}
                </a>
            @endforeach
            <div class="pt-6">
                <a href="{{ route('appointments.index') }}" class="block w-full bg-blue-600 text-white text-center py-5 rounded-2xl font-black uppercase tracking-widest">
                    Book Appointment Now
                </a>
            </div>
        </div>
    </div>
</nav>
