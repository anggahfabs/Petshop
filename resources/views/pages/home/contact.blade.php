{{-- Enhanced background with gradient for smooth transition from gallery section --}}
<section class="py-16 md:py-40 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 relative overflow-hidden">
    {{-- Enhanced decorative circles with more dramatic blur and glow effects --}}
    <div class="absolute -top-40 -left-40 w-96 md:w-[600px] h-96 md:h-[600px] bg-white/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute -bottom-40 -right-40 w-96 md:w-[600px] h-96 md:h-[600px] bg-white/5 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-blue-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <div data-aos="zoom-in">
            {{-- Added badge with glow effect for consistency --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-6 shadow-lg shadow-white/5">
                <div class="w-2 h-2 rounded-full bg-white animate-pulse shadow-lg shadow-white/50"></div>
                <span class="text-white font-bold uppercase text-xs md:text-sm tracking-wider">Need Assistance?</span>
            </div>
            
            {{-- Enhanced title with subtle gradient text effect --}}
            <h1 class="text-3xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-blue-50 to-white mb-6 md:mb-10 leading-tight drop-shadow-lg px-2">
                We're Here For Your Best Friend
            </h1>
            
            <p class="text-white/80 text-sm md:text-xl max-w-2xl mx-auto mb-10 md:mb-16 font-medium leading-relaxed px-4">
                Our team of experts is ready to answer any questions you have about pet care, products, or our exclusive services.
            </p>
            
            {{-- Enhanced buttons with glassmorphism and improved hover effects --}}
            <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-8 px-6">
                <a href="{{ route('appointments.index') }}" 
                   class="group relative bg-white text-blue-600 px-10 md:px-14 py-4 md:py-6 rounded-2xl md:rounded-3xl font-bold text-sm md:text-lg shadow-2xl hover:scale-105 transition-all duration-300">
                    <span class="relative z-10">Book Appointment</span>
                </a>
                
                <a href="{{ route('contact.index') }}" 
                   class="bg-white/10 backdrop-blur-md text-white px-10 md:px-14 py-4 md:py-6 rounded-2xl md:rounded-3xl font-bold text-sm md:text-lg hover:bg-white/20 border border-white/30 transition-all duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
