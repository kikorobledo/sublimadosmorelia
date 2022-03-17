<div class="glider-wrap">
<div wire:init="loadDesigns" class="glider-contain">

    @if($uuid)

        <ul class="glider-{{  $this->uuid }} mb-2">

            @foreach ($designs as $design)

                <li class="{{ $loop->last ?  '' : 'mr-4' }}">

                    <article class="text-center">

                        <figure class="mb-2">

                            <img class=" object-cover object-center" src="{{ asset('storage/img/logo.png') }}" alt="">

                        </figure>

                        <h1 class=" uppercase font-light truncate">{{ $design['name'] }}</h1>

                        <p class="mb-2">$ {{ $design['product']['price'] }}</p>

                        <a href="{{ route('designs.show', $design['slug']) }}" class="border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">Ver producto</a>

                    </article>

                </li>

            @endforeach

        </ul>

        <div role="tablist" class="dots-{{  $this->uuid }}"></div>

    @else

        <ul class="flex w-full mb-2 overflow-hidden">

            @for($i = 0; $i < 5; $i++)

            <li class="mr-4">

                <div class="p-4 max-w-sm w-full mx-auto">

                    <div class="animate-pulse flex flex-col justify-center space-y-2">

                      <div class="rounded bg-gray-300 h-48 w-48"></div>

                      <div class="h-4 bg-gray-300 rounded w-full mx-auto"></div>

                      <div class="h-4 bg-gray-300 rounded w-1/2 mx-auto"></div>

                      <div class="h-4 bg-gray-300 rounded w-1/2 mx-auto"></div>

                    </div>

                  </div>

            </li>

            @endfor

        </ul>

    @endif


</div>
</div>
