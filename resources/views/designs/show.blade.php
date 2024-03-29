<x-app-layout>

    <div class="container">

        <div class="grid grid-cols-1 md:grid-cols-2  md:gap-6 mt-8">

            <div class="cols-1">

                <div class="flexslider">
                    <ul class="slides">

                      <li data-thumb="{{ $design->imageUrl() }}">
                        <img src="{{ $design->imageUrl() }}" />
                      </li>

                      <li data-thumb="{{ $design->product->imageUrl() }}">
                        <img src="{{ $design->product->imageUrl() }}" />
                      </li>

                    </ul>
                  </div>

            </div>

            <div class="cols-1 p2 md:p-8 mb-5">

                <h1 class="text-3xl tracking-widest">{{ $design->name }}</h1>

                <p class="tracking-widest font-light text-xl mb-5">{{ $design->product->name }}</p>

                <p class="text-xl tracking-widest font-light">{{ $design->product->description }}</p>

                <div class="mt-5">

                    @livewire('add-to-cart', ['design' => $design])

                </div>

                @foreach ($design->tags as $tag)

                    <a href="{{ route('search') . '?name=' . $tag->name }}" class="bg-black text-white px-2 py-1 rounded-full text-xs">{{ $tag->name }}</a>

                @endforeach

            </div>

        </div>

        <h3 class="uppercase tracking-wide font-light text-sm md:text-lg mt-2">tal vez te interese ver otros productos relacionados con {{ $design->name }}.</h3>

        @livewire('glider', ['designs' => $glider], key($design->id))

    </div>

    @push('scripts')

        <script>

            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });

        </script>

    @endpush

</x-app-layout>
