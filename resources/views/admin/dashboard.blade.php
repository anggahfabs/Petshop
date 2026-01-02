@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Overview of your Petshop operations.</p>
</div>

{{-- Stats Grid --}}
<div class="flex gap-6 overflow-x-auto pb-4 mb-8 snap-x snap-mandatory">

    {{-- Products --}}
    <a href="{{ route('admin.products.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Products</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['products_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Categories --}}
    <a href="{{ route('admin.categories.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Categories</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['categories_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Services --}}
    <a href="{{ route('admin.services.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-green-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Services</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['services_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Appointments --}}
    <a href="{{ route('admin.appointments.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-purple-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Appointments</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['appointments_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Articles --}}
    <a href="{{ route('admin.articles.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-yellow-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 4v4h4"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Articles</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['articles_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Gallery --}}
    <a href="{{ route('admin.galleries.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-yellow-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 4v4h4"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Gallery</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['galleries_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Unread Messages --}}
    <a href="{{ route('admin.inbox.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-red-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Messages</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['messages_count'] }}</h3>
            </div>
        </div>
    </a>

    {{-- Subscribers --}}
    <a href="{{ route('admin.subscribers.index') }}"  class="min-w-[260px] snap-start bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 hover:shadow-md transition-all">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Subscribers</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $stats['subscribers_count'] }}</h3>
            </div>
        </div>
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    {{-- Recent Appointments --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-bold text-gray-800">Recent Appointments</h3>
            <a href="{{ route('admin.appointments.index') }}" class="text-blue-600 text-sm font-semibold hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-4">Pet / Owner</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($recent_appointments as $appointment)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800">{{ $appointment->pet_name }}</div>
                                <div class="text-xs text-gray-400">{{ $appointment->name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $appointment->appointment_date->format('d M, H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.appointments.index') }}" class="inline-flex items-center justify-center w-8 h-8 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">No recent appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Shortcuts / Quick Actions --}}
    <div class="space-y-6">
        <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-lg shadow-blue-200">
            <h3 class="text-xl font-bold mb-2">Petshop Management</h3>
            <p class="text-blue-100 mb-6 text-sm">Update your services, products, and articles to keep your customers engaged.</p>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.products.index') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md p-4 rounded-xl transition-all border border-white/10 flex flex-col gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <span class="text-xs font-bold uppercase tracking-widest">Manage Products</span>
                </a>
                <a href="{{ route('admin.articles.index') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md p-4 rounded-xl transition-all border border-white/10 flex flex-col gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span class="text-xs font-bold uppercase tracking-widest">Manage Articles</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <h3 class="font-bold text-gray-800 mb-4">System Overview</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                    <span class="text-sm font-medium text-gray-600">Storage Usage</span>
                    <span class="text-sm font-bold text-gray-800">Normal</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                    <span class="text-sm font-medium text-gray-600">Server Status</span>
                    <span class="text-sm font-bold text-green-600">Active</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
