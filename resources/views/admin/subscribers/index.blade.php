@extends('layouts.admin')

@section('title', 'Newsletter Subscribers')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Newsletter Subscribers</h1>
    <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-lg font-bold">
        Total: {{ $subscribers->count() }}
    </div>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border border-green-200">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 font-semibold text-gray-700">Email Address</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Subscribed At</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($subscribers as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-800 font-medium">
                        {{ $item->email }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $item->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.subscribers.destroy', $item) }}" method="POST" onsubmit="return confirm('Remove this subscriber?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium flex items-center gap-2 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                             <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-lg font-bold">No subscribers yet.</p>
                        <p class="text-sm">Visitors who enter their email in the footer will appear here.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
