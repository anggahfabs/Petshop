@extends('layouts.admin')

@section('title', 'Articles')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Articles</h1>
    <button onclick="document.getElementById('createModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
        + Add New Article
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
                <th class="px-6 py-4 font-semibold text-gray-700">Image</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Title</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($articles as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img" class="h-16 w-16 object-cover rounded border">
                        @else
                            <div class="h-16 w-16 bg-gray-200 rounded border flex items-center justify-center text-gray-400 text-xs">No Img</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">
                        {{ $item->title }}
                        <div class="text-xs text-gray-500 font-normal truncate w-64">{{ $item->excerpt }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <button 
                            onclick="openEditModal({{ $item->id }}, '{{ addslashes($item->title) }}', '{{ addslashes($item->content) }}', {{ $item->is_active }})"
                            class="text-blue-600 hover:text-blue-800 font-medium"
                        >
                            Edit
                        </button>
                        <form action="{{ route('admin.articles.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg">No articles found.</p>
                        <p class="text-sm">Click the button above to create one.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Create Modal --}}
<div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6 shadow-xl transform transition-all max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Add New Article</h2>
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Image</label>
                    <input type="file" name="image" class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" accept="image/*">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Content <span class="text-red-500">*</span></label>
                <textarea name="content" rows="6" class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required></textarea>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" value="1" id="create_active" checked class="w-4 h-4 text-blue-600 rounded mr-2">
                <label for="create_active" class="text-gray-700">Set as Active</label>
            </div>
            
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('createModal').classList.add('hidden')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Article</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Modal --}}
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6 shadow-xl max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Article</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="edit_title" class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Change Image</label>
                     <p class="text-xs text-gray-500 mb-1">Leave empty to keep current</p>
                    <input type="file" name="image" class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" accept="image/*">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2 font-medium">Content <span class="text-red-500">*</span></label>
                <textarea name="content" id="edit_content" rows="6" class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-200" required></textarea>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" value="1" id="edit_is_active" class="w-4 h-4 text-blue-600 rounded mr-2">
                <label for="edit_is_active" class="text-gray-700">Set as Active</label>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Article</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id, title, content, isActive) {
    const form = document.getElementById('editForm');
    form.action = `/admin/articles/${id}`;
    
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_content').value = content;
    document.getElementById('edit_is_active').checked = isActive ? true : false;
    
    document.getElementById('editModal').classList.remove('hidden');
}

// Close modals when clicking outside
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
