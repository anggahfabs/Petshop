@extends('layouts.admin')

@section('title', 'Heroes Management')

@section('content')
<div
    x-data="{
        openCreate: false,
        openEdit: false,
        baseUrl: '{{ route('admin.heroes.index') }}',
        editData: {
            id: null,
            title: '',
            subtitle: '',
            is_active: true,
        }
    }"
>
    {{-- Updated header to match services design pattern with icon and smaller layout --}}
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Heroes Management</h1>
                <p class="text-sm text-slate-500">Kelola hero sections untuk homepage slider</p>
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
                Tambah Hero
            </button>
        </div>
    </div>

    {{-- Updated table styling to match services with slate colors and better spacing --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Subtitle</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($heroes as $hero)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <span class="font-medium text-slate-800">{{ $hero->title }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-slate-600">{{ Str::limit($hero->subtitle, 60) }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($hero->image)
                                <img
                                    src="{{ asset('storage/'.$hero->image) }}"
                                    class="h-12 w-12 object-cover rounded-lg mx-auto border border-slate-200"
                                    alt="{{ $hero->title }}"
                                >
                            @else
                                <span class="text-slate-400 text-sm">No image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{-- Updated status badges to match services with dot indicator --}}
                            @if($hero->is_active)
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
                            {{-- Updated action buttons to match services style with text labels --}}
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    @click="
                                        openEdit = true;
                                        editData = {
                                            id: {{ $hero->id }},
                                            title: @js($hero->title),
                                            subtitle: @js($hero->subtitle),
                                            is_active: {{ $hero->is_active ? 'true' : 'false' }}
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
                                    action="{{ route('admin.heroes.destroy', $hero) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Hapus hero ini?')"
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
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-slate-500 font-medium">Belum ada data hero</p>
                                <p class="text-sm text-slate-400">Klik tombol "Tambah Hero" untuk menambah data baru</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Updated CREATE modal to match services design with blue gradient header --}}
    <div
        x-show="openCreate"
        x-cloak
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
        @click.self="openCreate = false"
    >
        <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden" @click.stop>
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Tambah Hero Baru</h2>
            </div>

            <form
                action="{{ route('admin.heroes.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-4"
            >
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title</label>
                    <input 
                        name="title" 
                        placeholder="Masukkan judul hero"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                        required 
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Subtitle</label>
                    <textarea 
                        name="subtitle"
                        placeholder="Masukkan deskripsi hero"
                        rows="3" 
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Image</label>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:font-medium hover:file:bg-blue-100"
                    >
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
                        Hero aktif
                    </label>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                    <button 
                        type="button" 
                        @click="openCreate = false" 
                        class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 transition-all duration-200 font-medium"
                    >
                        Batal
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium"
                    >
                        Simpan Hero
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Updated EDIT modal to keep blue gradient header consistent --}}
    <div
        x-show="openEdit"
        x-cloak
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
        @click.self="openEdit = false"
    >
        <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden" @click.stop>
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">Edit Hero</h2>
            </div>

            <form
                :action="`${baseUrl}/${editData.id}`"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-4"
            >
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title</label>
                    <input 
                        name="title" 
                        x-model="editData.title" 
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                        required
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Subtitle</label>
                    <textarea 
                        name="subtitle" 
                        x-model="editData.subtitle" 
                        rows="3"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Image (Biarkan kosong jika tidak ingin mengubah)</label>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-600 file:font-medium hover:file:bg-blue-100"
                    >
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
                        Hero aktif
                    </label>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                    <button 
                        type="button" 
                        @click="openEdit = false" 
                        class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-xl hover:bg-slate-50 transition-all duration-200 font-medium"
                    >
                        Batal
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium"
                    >
                        Update Hero
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
