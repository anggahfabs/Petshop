@if($heroes->count())
<section
    x-data="{
        active: 0,
        total: {{ $heroes->count() }},
        start() {
            setInterval(() => {
                this.active = (this.active + 1) % this.total
            }, 5000)
        }
    }"
    x-init="start"
    class="relative overflow-hidden"
>
    {{-- Slides --}}
    <div class="relative h-[500px]">
        @foreach($heroes as $index => $hero)
            <div
                x-show="active === {{ $index }}"
                x-transition.opacity.duration.500ms
                class="absolute inset-0"
            >
                <img
                    src="{{ asset('storage/' . $hero->image) }}"
                    alt="{{ $hero->title }}"
                    class="w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-black/50 flex items-center">
                    <div class="container mx-auto text-white">
                        <h1 class="text-4xl font-bold">
                            {{ $hero->title }}
                        </h1>

                        @if($hero->subtitle)
                            <p class="mt-4 max-w-xl">
                                {{ $hero->subtitle }}
                            </p>
                        @endif

                        @if($hero->button_text)
                            <a
                                href="{{ $hero->button_link }}"
                                class="inline-block mt-6 px-6 py-3 bg-primary text-white"
                            >
                                {{ $hero->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Dots --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2">
        @foreach($heroes as $index => $hero)
            <button
                @click="active = {{ $index }}"
                class="w-3 h-3 rounded-full transition"
                :class="active === {{ $index }} ? 'bg-white' : 'bg-white/50'"
            ></button>
        @endforeach
    </div>
</section>
@endif
