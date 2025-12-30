@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Appointments</h1>
    <button onclick="document.getElementById('createModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
        + Manually Book Appointment
    </button>
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
                <th class="px-6 py-4 font-semibold text-gray-700">Client / Pet</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Date & Time</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($appointments as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $item->name }}</div>
                        <div class="text-sm text-gray-500">{{ $item->pet_name }} ({{ $item->pet_type }})</div>
                        <div class="text-xs text-gray-400 mt-1">{{ $item->phone }}</div>
                    </td>
                    <td class="px-6 py-4">
                         {{ $item->appointment_date->format('d M Y, H:i') }}
                         @if($item->note)
                            <div class="text-xs text-gray-500 italic mt-1 bg-yellow-50 p-1 rounded">Note: {{ $item->note }}</div>
                         @endif
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $colors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'confirmed' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-red-100 text-red-800',
                            ];
                        @endphp
                        <span class="px-2 py-1 text-xs rounded-full font-medium {{ $colors[$item->status] ?? 'bg-gray-100' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <button 
                            onclick="openEditModal({{ $item->id }}, '{{ $item->status }}', '{{ addslashes($item->note ?? '') }}')"
                            class="text-blue-600 hover:text-blue-800 font-medium"
                        >
                            Update
                        </button>
                        <form action="{{ route('admin.appointments.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this appointment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg">No appointments found.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Create Modal --}}
<div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-lg p-6 shadow-xl transform transition-all max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Book Appointment</h2>
        <form action="{{ route('admin.appointments.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                   <label class="block text-gray-700 mb-2 font-medium">Client Name <span class="text-red-500">*</span></label>
                   <input type="text" name="name" class="w-full border p-2 rounded" required>
                </div>
                <div>
                   <label class="block text-gray-700 mb-2 font-medium">Phone <span class="text-red-500">*</span></label>
                   <input type="text" name="phone" class="w-full border p-2 rounded" required>
                </div>
            </div>
             <div class="mb-4">
                   <label class="block text-gray-700 mb-2 font-medium">Email</label>
                   <input type="email" name="email" class="w-full border p-2 rounded">
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                 <div>
                   <label class="block text-gray-700 mb-2 font-medium">Pet Name <span class="text-red-500">*</span></label>
                   <input type="text" name="pet_name" class="w-full border p-2 rounded" required>
                </div>
                 <div>
                   <label class="block text-gray-700 mb-2 font-medium">Pet Type</label>
                   <input type="text" name="pet_type" class="w-full border p-2 rounded" placeholder="e.g. Dog, Cat">
                </div>
            </div>
            
             <div class="mb-4">
                   <label class="block text-gray-700 mb-2 font-medium">Date & Time <span class="text-red-500">*</span></label>
                   <input type="datetime-local" name="appointment_date" class="w-full border p-2 rounded" required>
            </div>
            
             <div class="mb-4">
                   <label class="block text-gray-700 mb-2 font-medium">Note</label>
                   <textarea name="note" class="w-full border p-2 rounded" rows="2"></textarea>
            </div>
            
            <input type="hidden" name="status" value="confirmed">

            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('createModal').classList.add('hidden')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Book Now</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Modal --}}
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-sm p-6 shadow-xl">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Update Status</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Status <span class="text-red-500">*</span></label>
                <select name="status" id="edit_status" class="w-full border p-2 rounded bg-white">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            
             <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Note</label>
                <textarea name="note" id="edit_note" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id, status, note) {
    const form = document.getElementById('editForm');
    form.action = `/admin/appointments/${id}`;
    
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_note').value = note;
    
    document.getElementById('editModal').classList.remove('hidden');
}

window.onclick = function(event) {
    if (event.target == document.getElementById('createModal')) {
        document.getElementById('createModal').classList.add('hidden');
    }
    if (event.target == document.getElementById('editModal')) {
        document.getElementById('editModal').classList.add('hidden');
    }
}
</script>
@endsection
