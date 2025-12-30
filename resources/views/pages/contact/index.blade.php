@extends('layouts.app')
@section('title', 'Get In Touch')

@section('content')
<div class="pt-40 pb-24 bg-gray-50 overflow-hidden relative">
    {{-- Background decorations --}}
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-blue-100/30 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-40 left-0 w-1/3 h-1/3 bg-indigo-100/30 rounded-full blur-[120px] -translate-x-1/2"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        {{-- Header --}}
        <div class="text-center mb-24" data-aos="fade-down">
            <h2 class="text-blue-600 font-black tracking-[0.4em] uppercase mb-6 text-sm">Contact Support</h2>
            <h1 class="text-6xl md:text-8xl font-black text-gray-900 mb-8 tracking-tighter leading-[0.9]">Let's Start <br>A Conversation</h1>
            <div class="w-48 h-2.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-20 items-stretch">
            
            {{-- Form Section --}}
            <div data-aos="fade-right">
                <div class="bg-white p-12 md:p-16 rounded-[4rem] shadow-2xl shadow-gray-300 border border-gray-100 h-full relative overflow-hidden">
                    <div class="mb-12">
                        <h3 class="text-3xl font-black text-gray-900 mb-4 tracking-tight">Send a Message</h3>
                        <p class="text-gray-500 font-medium">Have questions or want to book a custom service? Our team is ready to help you.</p>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-8 rounded-3xl mb-12 border border-green-100 flex items-center gap-6" data-aos="zoom-in">
                            <div class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0 animate-bounce shadow-lg shadow-green-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-black text-xl mb-1">Message Sent!</h4>
                                <p class="font-bold opacity-75">We'll get back to you soon.</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2 group">
                                <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Full Name</label>
                                <input type="text" name="name" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="e.g. John Doe" required>
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Email Address</label>
                                <input type="email" name="email" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="name@example.com" required>
                            </div>
                        </div>

                        <div class="space-y-2 group">
                            <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Phone Number</label>
                            <input type="text" name="phone" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="e.g. 08123456789">
                        </div>

                        <div class="space-y-2 group">
                            <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Your Message</label>
                            <textarea name="message" rows="5" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="What's on your mind?" required></textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white font-black py-6 rounded-3xl shadow-2xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-[0.98] uppercase tracking-[0.2em] text-sm flex items-center justify-center gap-4">
                            Send Message
                            <svg class="w-6 h-6 rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Visual/Map Section --}}
            <div data-aos="fade-left" class="h-full">
                <div class="bg-gray-900 rounded-[4rem] overflow-hidden h-full shadow-2xl shadow-gray-400 border-8 border-white relative group">
                    <iframe 
                        class="w-full h-full grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-1000 scale-110 group-hover:scale-100" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3434.5020123!2d106.8271528!3d-6.2240217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMnMjYuNSJTIDEwNiw0OScyNS43IkU!5e0!3m2!1sen!2sid!4v1625000000000!5m2!1sen!2sid" 
                        style="border:0; min-height: 600px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    
                    {{-- Floating Support Card --}}
                    <div class="absolute bottom-12 left-12 right-12 bg-white/10 backdrop-blur-xl border border-white/20 p-8 rounded-[2.5rem] shadow-2xl group-hover:bg-white group-hover:border-transparent transition-all duration-700">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-xl">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white group-hover:text-gray-900 font-black text-xl mb-1 transition-colors">Instant Support</h4>
                                <p class="text-white/60 group-hover:text-gray-400 font-bold transition-colors">Available 24/7 for urgent pet care.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection