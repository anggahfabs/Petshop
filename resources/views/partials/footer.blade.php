<footer class="bg-gray-900 pt-16 md:pt-24 pb-8 md:pb-12 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-16 mb-16 md:mb-20">
            {{-- Column 1 --}}
            <div data-aos="fade-up">
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-6 md:mb-8 justify-center md:justify-start">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zM5 10a5 5 0 1110 0 5 5 0 01-10 0z"></path></svg>
                    </div>
                    <span class="text-xl md:text-2xl font-bold text-white tracking-tight">OVI<span class="text-blue-600"> PETSHOP</span></span>
                </a>
                <p class="text-gray-400 text-sm md:text-lg leading-relaxed mb-8 text-center md:text-left">
                    {{ $siteSettings->footer_description ?? 'Providing the best care and products for your beloved pets since 2010. Your pet\'s happiness is our priority.' }}
                </p>
                {{-- Social Icons (Commented out by user previously, but I'll make them clean) --}}
                <!-- <div class="flex gap-4">
                    @foreach(['facebook', 'instagram', 'whatsapp', 'youtube'] as $social)
                        <a href="#" class="w-12 h-12 bg-gray-800 rounded-2xl flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                             <span class="sr-only">{{ $social }}</span>
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12c0-5.523-4.477-10-10-10z"></path></svg>
                        </a>
                    @endforeach
                </div> -->
            </div>

            {{-- Column 2 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="text-center md:text-left">
                <h4 class="text-white text-base md:text-lg font-bold mb-6 md:mb-8 uppercase tracking-widest">Navigation</h4>
                <ul class="grid grid-cols-2 md:grid-cols-1 gap-x-4 gap-y-3 md:gap-4">
                    @foreach(['Home' => 'home', 'Services' => 'services.index', 'Products' => 'products.index', 'Articles' => 'articles.index', 'Gallery' => 'gallery.index', 'Contact' => 'contact.index'] as $label => $route)
                        <li>
                            <a href="{{ route($route) }}" class="text-gray-400 hover:text-blue-500 transition-colors flex items-center justify-center md:justify-start gap-2 group text-sm md:text-base font-medium">
                                <span class="w-1.5 h-1.5 bg-blue-600 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="text-center md:text-left">
                <h4 class="text-white text-base md:text-lg font-bold mb-6 md:mb-8 uppercase tracking-widest">Connect</h4>
                <div class="space-y-6">
                    @forelse($footerContacts as $contact)
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-3 md:gap-4">
                            @if($contact->logo)
                                <div class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center flex-shrink-0 border border-white/5">
                                    <img src="{{ asset('storage/'.$contact->logo) }}" class="w-5 h-5 object-contain grayscale invert opacity-50">
                                </div>
                            @endif
                            <div class="min-w-0">
                                <h5 class="text-white font-bold text-sm md:text-base mb-1">{{ $contact->title }}</h5>
                                <p class="text-gray-400 text-[10px] md:text-sm leading-relaxed">{{ $contact->description }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No contact info available.</p>
                    @endforelse
                </div>
            </div>

            {{-- Column 4 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="text-center md:text-left">
                <h4 class="text-white text-base md:text-lg font-bold mb-6 md:mb-8 uppercase tracking-widest">Newsletter</h4>
                <p class="text-gray-400 mb-6 font-medium text-xs md:text-sm">Join our mailing list for exclusive pet tips.</p>
                
                @if(session('success_newsletter'))
                    <div class="bg-blue-600/20 text-blue-400 p-4 rounded-xl mb-4 border border-blue-600/30 text-[10px] md:text-xs font-bold">
                        {{ session('success_newsletter') }}
                    </div>
                @endif
                @error('email')
                    <div class="bg-red-600/20 text-red-400 p-4 rounded-xl mb-4 border border-red-600/30 text-[10px] md:text-xs font-bold">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('newsletter.store') }}" method="POST" class="relative group">
                    @csrf
                    <input type="email" name="email" required placeholder="Email Address" class="w-full bg-gray-800 border-none rounded-2xl p-4 md:p-5 text-white focus:ring-2 focus:ring-blue-600 transition-all font-bold text-xs md:text-sm pr-16 md:pr-20">
                    <button type="submit" class="absolute right-1.5 md:right-2 top-1.5 md:top-2 bottom-1.5 md:top-2 h-[calc(100%-12px)] md:h-[calc(100%-16px)] bg-blue-600 text-white px-4 md:px-6 rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-600/20">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-white/5 pt-8 md:pt-12 flex flex-col md:flex-row justify-between items-center gap-6 md:gap-8">
            <p class="text-gray-500 font-medium text-[10px] md:text-sm text-center md:text-left">
                &copy; {{ date('Y') }} <span class="text-white font-bold text-base md:text-lg">OVI<span class="text-blue-600"> PETSHOP</span></span>. All rights reserved.
            </p>
            <div class="flex gap-6 md:gap-8 text-gray-400 font-medium text-[10px] md:text-sm">
                <a href="#" class="hover:text-blue-500 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-blue-500 transition-colors">Terms</a>
            </div>
        </div>
    </div>
</footer>
