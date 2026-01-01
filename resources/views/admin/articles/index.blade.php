@extends('layouts.admin')

@section('title', 'Articles')

@section('content')
<div
    x-data="{
        openCreate: false,
        openEdit: false,
        baseUrl: '{{ route('admin.articles.index') }}',
        editData: {
            id: null,
            title: '',
            content: '',
            is_active: true,
        }
    }"
>
    {{-- Header matching heroes design --}}
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Articles</h1>
                <p class="text-sm text-slate-500">Kelola artikel dan konten blog</p>
            </div>
        </div>

        <div class="flex justify-end">
            <button
                @click="openCreate = true"
                class="px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-medium hover:shadow-lg hover:scale-105 transition-all duration-200 flex items-center gap-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Article
            </button>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-green-700 font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Table matching heroes design --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Title & Excerpt</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $item)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-6 py-4 text-center">
                            @if($item->thumbnail)
                                <img
                                    src="{{ asset('storage/' . $item->thumbnail) }}"
                                    class="h-16 w-16 object-cover rounded-lg mx-auto border border-slate-200"
                                    alt="{{ $item->title }}"
                                >
                            @else
                                <div class="h-16 w-16 bg-slate-100 rounded-lg flex items-center justify-center mx-auto border border-slate-200">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-medium text-slate-800">{{ $item->title }}</span>
                                @if($item->excerpt)
                                    <span class="text-sm text-slate-500 mt-1 line-clamp-2">{{ $item->excerpt }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->is_active)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full mr-1.5"></span>
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    @click="
                                        openEdit = true;
                                        editData = {
                                            id: {{ $item->id }},
                                            title: @js($item->title),
                                            content: @js($item->content),
                                            is_active: {{ $item->is_active ? 'true' : 'false' }}
                                        }
                                    "
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-150 text-sm font-medium"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </button>

                                <form
                                    action="{{ route('admin.articles.destroy', $item) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Delete this article?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors duration-150 text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-slate-500 font-medium">No articles found</p>
                                <p class="text-sm text-slate-400">Click "Add New Article" button to create one</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- CREATE Modal --}}
    <div
        x-show="openCreate"
        x-cloak
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
        @click.self="openCreate = false"
    >
        <div class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col" @click.stop>
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Add New Article</h2>
            </div>

            <form
                action="{{ route('admin.articles.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-4 overflow-y-auto"
            >
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Article Title <span class="text-red-500">*</span>
                        </label>
                        <input 
                            name="title" 
                            placeholder="Enter article title"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                            required 
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Thumbnail Image</label>
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:font-medium hover:file:bg-blue-100"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="content"
                        placeholder="Enter article content"
                        rows="8" 
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-y"
                        required
                    ></textarea>
                </div>

                <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl">
                    <input type="hidden" name="is_active" value="0">
                    <input 
                        type="checkbox" 
                        name="is_active" 
                        value="1" 
                        checked
                        class="w-5 h-5 text-blue-600 border-slate-300 rounded focus:ring-2 focus:ring-blue-500"
                        id="is_active_create"
                    >
                    <label for="is_active_create" class="text-sm font-medium text-slate-700 cursor-pointer">
                        Set as Active
                    </label>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                    <button 
                        type="button" 
                        @click="openCreate = false" 
                        class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 transition-all duration-200 font-medium"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium"
                    >
                        Save Article
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT Modal --}}
    <div
        x-show="openEdit"
        x-cloak
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
        @click.self="openEdit = false"
    >
        <div class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col" @click.stop>
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Edit Article</h2>
            </div>

            <form
                :action="`${baseUrl}/${editData.id}`"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-4 overflow-y-auto"
            >
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Article Title <span class="text-red-500">*</span>
                        </label>
                        <input 
                            name="title" 
                            x-model="editData.title" 
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                            required
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Change Thumbnail</label>
                        <p class="text-xs text-slate-500 mb-2">Leave empty to keep current image</p>
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*"
                            class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:font-medium hover:file:bg-blue-100"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="content" 
                        x-model="editData.content" 
                        rows="8"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-y"
                        required
                    ></textarea>
                </div>

                <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl">
                    <input type="hidden" name="is_active" value="0">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        :checked="editData.is_active"
                        class="w-5 h-5 text-blue-600 border-slate-300 rounded focus:ring-2 focus:ring-blue-500"
                        id="is_active_edit"
                    >
                    <label for="is_active_edit" class="text-sm font-medium text-slate-700 cursor-pointer">
                        Set as Active
                    </label>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                    <button 
                        type="button" 
                        @click="openEdit = false" 
                        class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 transition-all duration-200 font-medium"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium"
                    >
                        Update Article
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection