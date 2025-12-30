@if(isset($products) && $products->count())
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-8">
            Produk Kami
        </h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="border p-6">
                    @if($product->image)
                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="w-full h-40 object-cover mb-4"
                        >
                    @endif

                    <h3 class="text-lg font-medium mb-2">
                        {{ $product->name }}
                    </h3>

                    <p class="text-sm font-semibold mb-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    @if($product->description)
                        <p class="text-sm text-gray-600">
                            {{ $product->description }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
