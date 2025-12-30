@extends('layouts.admin')

@section('title', 'Inbox')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Visitor Messages</h1>
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
                <th class="px-6 py-4 font-semibold text-gray-700">From</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Message</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Date</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($messages as $item)
                <tr class="hover:bg-gray-50 transition {{ !$item->is_read ? 'bg-blue-50' : '' }}">
                    <td class="px-6 py-4 w-1/4">
                        <div class="font-bold text-gray-800">{{ $item->name }}</div>
                        <div class="text-sm text-gray-600">{{ $item->email }}</div>
                        <div class="text-xs text-gray-500">{{ $item->phone }}</div>
                    </td>
                    <td class="px-6 py-4 w-1/2">
                         <p class="text-gray-700 {{ !$item->is_read ? 'font-semibold' : '' }} line-clamp-2">{{ $item->message }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $item->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 flex items-center gap-3">
                         <button 
                            onclick="openViewModal('{{ addslashes($item->name) }}', '{{ addslashes($item->email) }}', '{{ addslashes($item->phone ?? '-') }}', '{{ addslashes($item->message) }}', '{{ $item->created_at->format('d M Y H:i') }}')"
                            class="text-blue-600 hover:text-blue-800 font-medium"
                        >
                            Read
                        </button>
                        
                        @if(!$item->is_read)
                            <form action="{{ route('admin.contact.read', $item) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-xs border border-blue-600 text-blue-600 px-2 py-1 rounded hover:bg-blue-50" title="Mark as Read">✓</button>
                            </form>
                        @endif

                        <form action="{{ route('admin.contact.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg">No messages found.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- View Modal --}}
<div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6 shadow-xl">
        <div class="flex justify-between items-start mb-4">
             <h2 class="text-xl font-bold text-gray-800" id="view_name">Sender Name</h2>
             <button onclick="document.getElementById('viewModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>
        
        <div class="mb-4 text-sm text-gray-600 bg-gray-50 p-3 rounded">
            <p><strong>Email:</strong> <span id="view_email"></span></p>
            <p><strong>Phone:</strong> <span id="view_phone"></span></p>
            <p><strong>Date:</strong> <span id="view_date"></span></p>
        </div>

        <div class="prose max-w-none">
            <p class="whitespace-pre-wrap text-gray-800" id="view_message"></p>
        </div>

        <div class="mt-6 flex justify-end">
            <button onclick="document.getElementById('viewModal').classList.add('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Close</button>
        </div>
    </div>
</div>

<script>
function openViewModal(name, email, phone, message, date) {
    document.getElementById('view_name').innerText = name;
    document.getElementById('view_email').innerText = email;
    document.getElementById('view_phone').innerText = phone;
    document.getElementById('view_message').innerText = message;
    document.getElementById('view_date').innerText = date;
    
    document.getElementById('viewModal').classList.remove('hidden');
}

window.onclick = function(event) {
    if (event.target == document.getElementById('viewModal')) {
        document.getElementById('viewModal').classList.add('hidden');
    }
}
</script>
@endsection
