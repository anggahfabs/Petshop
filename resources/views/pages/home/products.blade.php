@if($products->count())
<section>
    <h2>Products</h2>

    @foreach($products as $product)
        <div>
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }}</p>
        </div>
    @endforeach
</section>
@endif
