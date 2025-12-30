@if($articles->count())
<section>
    <h2>Articles</h2>

    @foreach($articles as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->excerpt }}</p>
        </div>
    @endforeach
</section>
@endif
