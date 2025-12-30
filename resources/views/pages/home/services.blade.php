@if($services->count())
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-8">
            Layanan Kami
        </h2>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($services as $service)
                <div class="border p-6">
                    @if($service->image)
                        <img
                            src="{{ asset('storage/'.$service->image) }}"
                            class="w-full h-40 object-cover mb-4"
                        >
                    @endif

                    <h3 class="text-lg font-medium mb-2">
                        {{ $service->name }}
                    </h3>

                    @if($service->description)
                        <p class="text-sm text-gray-600">
                            {{ $service->description }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
