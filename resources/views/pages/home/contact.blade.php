<section class="py-24 md:py-40 bg-blue-600 relative overflow-hidden">
    {{-- Decorative Circles --}}
    <div class="absolute -top-40 -left-40 w-96 md:w-[600px] h-96 md:h-[600px] bg-white flex items-center justify-center opacity-5 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 w-96 md:w-[600px] h-96 md:h-[600px] bg-black flex items-center justify-center opacity-10 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <div data-aos="zoom-in">
            <h2 class="text-white/70 font-black tracking-[0.3em] uppercase mb-6 text-xs md:text-sm">Need Assistance?</h2>
            <h1 class="text-4xl md:text-6xl lg:text-8xl font-black text-white mb-10 leading-[0.95] tracking-tighter">We're Here For <br class="hidden md:block"> Your Best Friend</h1>
            <p class="text-white/60 text-base md:text-xl max-w-2xl mx-auto mb-16 font-medium leading-relaxed">
                Our team of experts is ready to answer any questions you have about pet care, products, or our exclusive services.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-8">
                <a href="{{ route('appointments.index') }}" class="bg-white text-blue-600 px-10 md:px-14 py-5 md:py-6 rounded-2xl md:rounded-3xl font-black text-base md:text-lg shadow-2xl hover:scale-105 transition-transform active:scale-95 uppercase tracking-widest">
                    Book Appointment
                </a>
                <a href="{{ route('contact.index') }}" class="bg-blue-700/50 backdrop-blur-md text-white px-10 md:px-14 py-5 md:py-6 rounded-2xl md:rounded-3xl font-black text-base md:text-lg hover:bg-blue-800 border-2 border-white/20 transition-all uppercase tracking-widest">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
