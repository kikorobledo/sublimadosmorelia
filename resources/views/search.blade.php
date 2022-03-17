<x-app-layout>

    <figure class="mb-5">

        <img class="w-full h-80 object-cover object-center" src="https://picsum.photos/800/600" alt="">

    </figure>

    <div class="container">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 relative" x-data="{'show':true}" id="div">

            <div class=" hidden md:block mt-10">

                <div class="text-center">

                    <a href="#" class=" tracking-widest py-1 border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">bautizo</a>

                    <iframe class=" w-full mt-3" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F521609105622737%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>

                <div class="text-center">

                    <a href="#" class=" tracking-widest py-1 border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">primera comunión</a>

                    <iframe class=" w-full mt-3" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F169869817978594%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>

                <div class="text-center">

                    <a href="#" class=" tracking-widest py-1 border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">cumpleaños</a>

                    <iframe class=" w-full mt-3" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F650586145670366%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>

                <div class="text-center">

                    <a href="#" class=" tracking-widest py-1 border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">funebres</a>

                    <iframe class=" w-full mt-3" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FSublimadosmorelia%2Fvideos%2F180471400564132%2F&show_text=false&width=560&t=0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>

            </div>

            <div class="md:col-span-2 lg:col-span-4">

                <h1 class="text-3xl  mb-10">Resultados de busqueda para: "{{ $name }}"</h1>

                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4 w-full">

                    @forelse ($designs as $design)

                        <li class="">

                            <article class="text-center">

                                <figure class="mb-2">

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
