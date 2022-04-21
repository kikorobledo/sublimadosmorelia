<x-app-layout>

    <figure class="mb-5 hidden md:block">

        <img class="w-full h-80 object-cover object-center" src="{{ Storage::disk('images')->url($searchDesktop[0]->url) }}" alt="">

    </figure>

    <figure class="mb-5 md:hidden">

        <img class="w-full h-80 object-cover object-center" src="{{ Storage::disk('images')->url($searchMobile[0]->url) }}" alt="">

    </figure>

    <div class="container">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 relative" x-data="{'show':true}" id="div">

            <div class=" hidden md:block mt-10 space-y-3">

                @foreach ($videos  as $video)

                    <div class="text-center">

                        <a href="{{ route('search'). "?name=" . $video->name }}" class=" tracking-widest py-1 border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">{{  $video->name }}</a>

                        <iframe class=" w-full mt-3" src="{{ $video->url }}" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                    </div>

                @endforeach

            </div>

            <div class="md:col-span-2 lg:col-span-4">

                <h1 class="text-3xl  mb-10">Resultados de busqueda para: "{{ $name }}"</h1>

                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4 w-full">

                    @forelse ($designs as $design)

                        <li class="">

                            <article class="text-center">

                                <figure class="mb-2 h-44 md:h-60 flex items-end overflow-hidden">

                                    <img class=" object-cover object-center" src="{{ $design->imageUrl() }}" alt="">

                                </figure>

                                <h1 class=" uppercase font-light truncate">{{ $design->name }}</h1>

                                <p class="mb-2">$ {{ $design->product->price }}</p>

                                <a href="{{ route('designs.show', $design->slug) }}" class="border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">Ver producto</a>

                            </article>

                        </li>

                    @empty

                        <div class="border-b border-gray-300 bg-white  text-2xl text-center p-5 rounded-full col-span-4 tracking-widest">

                            No hay resultados.

                        </div>

                    @endforelse

                </ul>

                <div class="mt-10">

                    {{ $designs->links() }}

                </div>

            </div>

        </div>

        <h3 class="uppercase tracking-wide font-light mb-5 text-sm md:text-lg mt-10">tal vez te interese ver otros productos relacionados.</h3>

        @livewire('glider', ['designs' => $latestDesigns], key('latest'))

    </div>

</x-app-layout>
