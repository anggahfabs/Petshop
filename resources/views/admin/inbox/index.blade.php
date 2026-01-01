@extends('layouts.admin')

@section('title', 'Inbox - Contact Messages')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Inbox</h1>
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
                <th class="px-6 py-4 font-semibold text-gray-700">Name</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Email</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Phone</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Message</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Date</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($messages as $msg)
                <tr class="hover:bg-gray-50 transition {{ !$msg->is_read ? 'bg-blue-50' : '' }}">
                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $msg->name }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $msg->email }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $msg->phone ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ Str::limit($msg->message, 40) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full font-medium {{ $msg->is_read ? 'bg-gray-100 text-gray-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $msg->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600 text-sm">
                        {{ $msg->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <button 
                            onclick="openViewModal('{{ addslashes($msg->name) }}', '{{ addslashes($msg->email) }}', '{{ addslashes($msg->phone ?? '') }}', '{{ addslashes($msg->message) }}', '{{ $msg->created_at->format('M d, Y H:i') }}')"
                            class="text-blue-600 hover:text-blue-800 font-medium"
                        >
                            View
                        </button>
                        @if(!$msg->is_read)
                            <form action="{{ route('admin.inbox.read', $msg) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-600 hover:text-green-800 font-medium">Mark Read</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.inbox.destroy', $msg) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg">No messages found.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- View Modal --}}
<div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-lg p-6 shadow-xl">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Message Details</h2>
        
        <div class="space-y-3">
            <div>
                <label class="text-sm font-semibold text-gray-600">Name:</label>
                <p id="view_name" class="text-gray-800"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Email:</label>
                <p id="view_email" class="text-gray-800"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Phone:</label>
                <p id="view_phone" class="text-gray-800"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Date:</label>
                <p id="view_date" class="text-gray-800"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Message:</label>
                <p id="view_message" class="text-gray-800 whitespace-pre-wrap"></p>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <button type="button" onclick="document.getElementById('viewModal').classList.add('hidden')" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Close</button>
        </div>
    </div>
</div>

<script>
function openViewModal(name, email, phone, message, date) {
    document.getElementById('view_name').textContent = name;
    document.getElementById('view_email').textContent = email;
    document.getElementById('view_phone').textContent = phone || '-';
    document.getElementById('view_message').textContent = message;
    document.getElementById('view_date').textContent = date;
    
    document.getElementById('viewModal').classList.remove('hidden');
}

window.onclick = function(event) {
    if (event.target == document.getElementById('viewModal')) {
        document.getElementById('viewModal').classList.add('hidden');
    }
}
</script>
@endsection
