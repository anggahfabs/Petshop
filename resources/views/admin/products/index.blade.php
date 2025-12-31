@extends('layouts.admin')

@section('content')
<div
    x-data="{
        openCreate: false,
        openEdit: false,
        baseUrl: '{{ route('admin.products.index') }}',
        editData: {
            id: null,
            name: '',
            category_id: '',
            brand_id: '',
            description: '',
            price: 0,
            is_active: true,
        }
    }"
>

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Products</h1>
        <button
            @click="openCreate = true"
            class="px-4 py-2 bg-black text-white rounded"
        >
            Tambah Product
        </button>
    </div>

    {{-- TABLE --}}
    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">Name</th>
                <th class="p-2">Category</th>
                <th class="p-2">Brand</th>
                <th class="p-2">Price</th>
                <th class="p-2">Description</th>
                <th class="p-2">Image</th>
                <th class="p-2">Active</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-t">
                <td class="p-2">{{ $product->name }}</td>
                <td class="p-2">{{ $product->category->name ?? '-' }}</td>
                <td class="p-2">{{ $product->brand->name ?? '-' }}</td>
                <td class="p-2">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </td>
                <td class="p-2">{{ $product->description }}</td>
                <td class="p-2 text-center">
                    @if($product->image)
                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="h-10 mx-auto"
                        >
                    @endif
                </td>
                <td class="p-2 text-center">
                    {{ $product->is_active ? 'Yes' : 'No' }}
                </td>
                <td class="p-2 text-center space-x-2">
                    <button
                        class="underline"
                        @click="
                            openEdit = true;
                            editData = {
                                id: {{ $product->id }},
                                name: '{{ $product->name }}',
                                category_id: '{{ $product->category_id }}',
                                brand_id: '{{ $product->brand_id }}',
                                description: @js($product->description),
                                price: {{ $product->price }},
                                is_active: {{ $product->is_active ? 'true' : 'false' }}
                            }
                        "
                    >
                        Edit
                    </button>

                    <form
                        action="{{ route('admin.products.destroy', $product) }}"
                        method="POST"
                        class="inline"
                        onsubmit="return confirm('Hapus product?')"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="underline text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="p-4 text-center text-gray-500">
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
            <h2 class="text-lg font-semibold mb-4">Tambah Product</h2>

            <form
                action="{{ route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-3"
            >
                @csrf

                <input name="name" placeholder="Name" class="w-full border p-2" required>
                
                <div class="grid grid-cols-2 gap-2">
                    <select name="category_id" class="w-full border p-2 bg-white">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <select name="brand_id" class="w-full border p-2 bg-white">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input name="price" type="number" min="0" step="0.01" placeholder="Price" class="w-full border p-2" required>

                <textarea name="description" placeholder="Description" class="w-full border p-2"></textarea>

                <input type="file" name="image">

                <label class="flex items-center gap-2">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked>
                    Active
                </label>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="openCreate=false">Batal</button>
                    <button class="px-4 py-2 bg-black text-white">Simpan</button>
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
            <h2 class="text-lg font-semibold mb-4">Edit Product</h2>

            <form
                :action="`${baseUrl}/${editData.id}`"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-3"
            >
                @csrf
                @method('PUT')

                <input name="name" x-model="editData.name" class="w-full border p-2" required>
                
                <div class="grid grid-cols-2 gap-2">
                    <select name="category_id" x-model="editData.category_id" class="w-full border p-2 bg-white">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                     <select name="brand_id" x-model="editData.brand_id" class="w-full border p-2 bg-white">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input name="price" type="number" min="0" step="0.01" x-model="editData.price" class="w-full border p-2" required>

                <textarea name="description" x-model="editData.description" class="w-full border p-2"></textarea>

                <input type="file" name="image">

                <label class="flex items-center gap-2">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" :checked="editData.is_active">
                    Active
                </label>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="openEdit=false">Batal</button>
                    <button class="px-4 py-2 bg-black text-white">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
