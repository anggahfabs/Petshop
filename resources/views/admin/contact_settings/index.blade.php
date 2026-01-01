@extends('layouts.admin')

@section('title', 'Contact Information')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Contact Information</h1>
    <button onclick="document.getElementById('createModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
        + Add Contact Info
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
                <th class="px-6 py-4 font-semibold text-gray-700">Logo</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Title</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Description</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($contacts as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        @if($item->logo)
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="logo" class="h-12 w-auto object-contain">
                        @else
                            <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">No Logo</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $item->title }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ Str::limit($item->description, 50) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <button 
                            onclick="openEditModal({{ $item->id }}, '{{ addslashes($item->title) }}', '{{ addslashes($item->description ?? '') }}', {{ $item->is_active }})"
                            class="text-blue-600 hover:text-blue-800 font-medium"
                        >
                            Edit
                        </button>
                        <form action="{{ route('admin.contact_settings.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this contact info?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg">No contact information found.</p>
                        <p class="text-sm">Click the button above to add one.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Create Modal --}}
<div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md p-6 shadow-xl transform transition-all">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Add Contact Info</h2>
        <form action="{{ route('admin.contact_settings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-200 focus:outline-none" placeholder="e.g. Our Location" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-200 focus:outline-none" rows="3" placeholder="e.g. 123 Main St, City"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Logo/Icon</label>
                <input type="file" name="logo" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-200 focus:outline-none" accept="image/*">
            </div>
            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" value="1" id="create_active" checked class="w-4 h-4 text-blue-600 rounded mr-2">
                <label for="create_active" class="text-gray-700">Set as Active</label>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('createModal').classList.add('hidden')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Modal --}}
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md p-6 shadow-xl">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Contact Info</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="edit_title" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-200 focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Description</label>
                <textarea name="description" id="edit_description" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-200 focus:outline-none" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Change Logo/Icon</label>
                <p class="text-xs text-gray-500 mb-1">Leave empty to keep current</p>
                <input type="file" name="logo" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-200 focus:outline-none" accept="image/*">
            </div>
            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" value="1" id="edit_is_active" class="w-4 h-4 text-blue-600 rounded mr-2">
                <label for="edit_is_active" class="text-gray-700">Set as Active</label>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id, title, description, isActive) {
    const form = document.getElementById('editForm');
    form.action = `/admin/contact-settings/${id}`;
    
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_is_active').checked = isActive ? true : false;
    
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
