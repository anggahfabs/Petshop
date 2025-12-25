<nav class="border-b px-6 py-4">
    <div class="flex items-center justify-between">
        <div>
            <strong>Petshop Logo</strong>
        </div>

        <ul class="flex gap-6">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('services.index') }}">Services</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li><a href="{{ route('articles.index') }}">Articles</a></li>
            <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
            <li><a href="{{ route('contact.index') }}">Contact</a></li>
        </ul>
    </div>
</nav>
