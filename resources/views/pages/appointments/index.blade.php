@extends('layouts.app')
@section('title', 'Exclusive Appointment')

@section('content')
<div class="pt-40 pb-24 bg-gray-50 overflow-hidden relative">
    {{-- Decorative backgrounds --}}
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-blue-100/30 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-1/2 h-1/2 bg-indigo-100/30 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-20 items-center">
            
            {{-- Text Content --}}
            <div class="w-full lg:w-1/2" data-aos="fade-right">
                <h2 class="text-blue-600 font-black tracking-[0.4em] uppercase mb-6 text-sm">Priority Booking</h2>
                <h1 class="text-6xl md:text-8xl font-black text-gray-900 mb-8 tracking-tighter leading-[0.9]">Book Your <br>V.I.P Visit</h1>
                <p class="text-xl text-gray-500 font-medium mb-12 leading-relaxed max-w-lg">
                    Give your pet the royal treatment they deserve. Our experts are ready to provide world-class care and attention.
                </p>
                
                <div class="grid grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100">
                        <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 text-white shadow-lg shadow-blue-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="font-black text-gray-900 mb-2">Fast Response</h4>
                        <p class="text-gray-400 text-sm font-bold">Confirmed in < 1hr</p>
                    </div>
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100">
                        <div class="w-12 h-12 bg-gray-900 rounded-2xl flex items-center justify-center mb-6 text-white shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="font-black text-gray-900 mb-2">Expert Staff</h4>
                        <p class="text-gray-400 text-sm font-bold">Certified Specialists</p>
                    </div>
                </div>
            </div>

            {{-- Booking Form Card --}}
            <div class="w-full lg:w-1/2" data-aos="fade-left">
                <div class="bg-white p-12 md:p-16 rounded-[4rem] shadow-2xl shadow-gray-300 border border-gray-100 relative overflow-hidden">
                    {{-- Form Background Decoration --}}
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-blue-50 rounded-full opacity-50"></div>

                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-8 rounded-3xl mb-10 border border-green-100 flex items-center gap-6" data-aos="zoom-in">
                            <div class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0 animate-bounce shadow-lg shadow-green-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-black text-xl mb-1">Booking Successful!</h3>
                                <p class="font-bold opacity-75">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-10 relative z-10">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2 group">
                                <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Owner Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="e.g. John Wick" required>
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="e.g. 0812..." required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2 group">
                                <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Pet Name</label>
                                <input type="text" name="pet_name" value="{{ old('pet_name') }}" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="e.g. Buddy" required>
                            </div>
                            <div class="space-y-2 group">
                                <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Pet Type</label>
                                <input type="text" name="pet_type" value="{{ old('pet_type') }}" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="e.g. Golden Retriever">
                            </div>
                        </div>

                        <div class="space-y-2 group">
                            <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Appointment Date & Time</label>
                            <input type="datetime-local" name="appointment_date" value="{{ old('appointment_date') }}" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" required>
                        </div>

                        <div class="space-y-2 group">
                            <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 ml-1 group-focus-within:text-blue-600 transition-colors">Special Notes</label>
                            <textarea name="note" rows="3" class="w-full bg-gray-50 border-none px-6 py-5 rounded-2xl focus:ring-2 focus:ring-blue-600 transition-all font-bold text-gray-900" placeholder="Let us know any special needs...">{{ old('note') }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white font-black py-6 rounded-3xl shadow-2xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-[0.98] uppercase tracking-[0.2em] text-sm">
                            Confirm Appointment
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
