@if($galleries->count())
<section>
    <h2>Gallery</h2>

    @foreach($galleries as $item)
        <img src="{{ asset('storage/'.$item->image) }}" alt="">
    @endforeach
</section>
@endif
