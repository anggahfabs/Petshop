@extends('layouts.admin')

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

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Heroes Management</h1>
        <button
            @click="openCreate = true"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
            Tambah Hero
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">Title</th>
                <th class="p-2 text-left">Subtitle</th>
                <th class="p-2 text-center">Image</th>
                <th class="p-2 text-center">Active</th>
                <th class="p-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($heroes as $hero)
            <tr class="border-t">
                <td class="p-2">{{ $hero->title }}</td>
                <td class="p-2">{{ Str::limit($hero->subtitle, 50) }}</td>
                <td class="p-2 text-center">
                    @if($hero->image)
                        <img
                            src="{{ asset('storage/'.$hero->image) }}"
                            class="h-10 mx-auto rounded"
                        >
                    @else
                        -
                    @endif
                </td>
                <td class="p-2 text-center">
                    <span class="px-2 py-1 rounded text-xs {{ $hero->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ $hero->is_active ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td class="p-2 text-center space-x-2">
                    <button
                        class="text-blue-600 hover:underline"
                        @click="
                            openEdit = true;
                            editData = {
                                id: {{ $hero->id }},
                                title: @js($hero->title),
                                subtitle: @js($hero->subtitle),
                                is_active: {{ $hero->is_active ? 'true' : 'false' }}
                            }
                        "
                    >
                        Edit
                    </button>

                    <form
                        action="{{ route('admin.heroes.destroy', $hero) }}"
                        method="POST"
                        class="inline"
                        onsubmit="return confirm('Hapus hero?')"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">
                    Belum ada data
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- CREATE MODAL --}}
    <div
        x-show="openCreate"
        x-cloak
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
    >
        <div class="bg-white w-full max-w-lg p-6 rounded shadow-lg" @click.away="openCreate = false">
            <h2 class="text-lg font-bold mb-4">Tambah Hero</h2>

            <form
                action="{{ route('admin.heroes.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-4"
            >
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input name="title" class="w-full border p-2 rounded" required placeholder="Main title">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Subtitle</label>
                    <textarea name="subtitle" class="w-full border p-2 rounded" rows="3" placeholder="Description content"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Image</label>
                    <input type="file" name="image" class="w-full border p-1 rounded">
                </div>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span class="text-sm">Active (tampil di slider)</span>
                </label>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" @click="openCreate = false" class="px-4 py-2 text-gray-600 border rounded hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div
        x-show="openEdit"
        x-cloak
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
    >
        <div class="bg-white w-full max-w-lg p-6 rounded shadow-lg" @click.away="openEdit = false">
            <h2 class="text-lg font-bold mb-4">Edit Hero</h2>

            <form
                :action="`${baseUrl}/${editData.id}`"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-4"
            >
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input name="title" x-model="editData.title" class="w-full border p-2 rounded" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Subtitle</label>
                    <textarea name="subtitle" x-model="editData.subtitle" class="w-full border p-2 rounded" rows="3"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Image</label>
                    <input type="file" name="image" class="w-full border p-1 rounded">
                    <p class="text-[10px] text-gray-400 mt-1">* Kosongkan jika tidak ingin mengubah gambar</p>
                </div>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        :checked="editData.is_active"
                    >
                    <span class="text-sm">Active</span>
                </label>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" @click="openEdit = false" class="px-4 py-2 text-gray-600 border rounded hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
