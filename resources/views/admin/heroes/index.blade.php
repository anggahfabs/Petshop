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
            button_text: '',
            button_link: '',
            is_active: true,
        }
    }"
>

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Heroes</h1>
        <button
            @click="openCreate = true"
            class="px-4 py-2 bg-black text-white rounded"
        >
            Tambah Hero
        </button>
    </div>

    {{-- TABLE --}}
    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">Title</th>
                <th class="p-2">Subtitle</th>
                <th class="p-2">Button Text</th>
                <th class="p-2">Button Link</th>
                <th class="p-2">Image</th>
                <th class="p-2">Active</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($heroes as $hero)
            <tr class="border-t">
                <td class="p-2">{{ $hero->title }}</td>
                <td class="p-2">{{ Str::limit($hero->subtitle, 50) }}</td>
                <td class="p-2">{{ $hero->button_text ?? '-' }}</td>
                <td class="p-2">{{ $hero->button_link ?? '-' }}</td>
                <td class="p-2 text-center">
                    @if($hero->image)
                        <img
                            src="{{ asset('storage/'.$hero->image) }}"
                            class="h-10 mx-auto"
                        >
                    @endif
                </td>
                <td class="p-2 text-center">
                    {{ $hero->is_active ? 'Yes' : 'No' }}
                </td>
                <td class="p-2 text-center space-x-2">
                    <button
                        class="underline"
                        @click="
                            openEdit = true;
                            editData = {
                                id: {{ $hero->id }},
                                title: @js($hero->title),
                                subtitle: @js($hero->subtitle),
                                button_text: @js($hero->button_text),
                                button_link: @js($hero->button_link),
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
                        <button class="underline text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">
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
        class="fixed inset-0 bg-black/50 flex items-center justify-center"
    >
        <div class="bg-white w-full max-w-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Tambah Hero</h2>

            <form
                action="{{ route('admin.heroes.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-3"
            >
                @csrf

                <input
                    name="title"
                    placeholder="Title"
                    class="w-full border p-2"
                    required
                >

                <textarea
                    name="subtitle"
                    placeholder="Subtitle"
                    class="w-full border p-2"
                ></textarea>

                <input
                    name="button_text"
                    placeholder="Button Text"
                    class="w-full border p-2"
                >

                <input
                    name="button_link"
                    placeholder="Button Link"
                    class="w-full border p-2"
                >

                <input type="file" name="image">

                <label class="flex items-center gap-2">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked>
                    Active
                </label>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="openCreate=false">
                        Batal
                    </button>
                    <button class="px-4 py-2 bg-black text-white">
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
        class="fixed inset-0 bg-black/50 flex items-center justify-center"
    >
        <div class="bg-white w-full max-w-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Edit Hero</h2>

            <form
                :action="`${baseUrl}/${editData.id}`"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-3"
            >
                @csrf
                @method('PUT')

                <input
                    name="title"
                    x-model="editData.title"
                    class="w-full border p-2"
                    required
                >

                <textarea
                    name="subtitle"
                    x-model="editData.subtitle"
                    class="w-full border p-2"
                ></textarea>

                <input
                    name="button_text"
                    x-model="editData.button_text"
                    class="w-full border p-2"
                >

                <input
                    name="button_link"
                    x-model="editData.button_link"
                    class="w-full border p-2"
                >

                <input type="file" name="image">

                <label class="flex items-center gap-2">
                    <input type="hidden" name="is_active" value="0">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        :checked="editData.is_active"
                    >
                    Active
                </label>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="openEdit=false">
                        Batal
                    </button>
                    <button class="px-4 py-2 bg-black text-white">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
