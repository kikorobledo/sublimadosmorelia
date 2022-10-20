<div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-5 relative" x-data="{'show':true}" id="div">

        <button @click="show = !show" class="border border-gray-300 mt-2 mx-2 rounded-full text-black text-sm mb-3 uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out md:hidden">Filtros</button>

        <div class="bg-white h-auto overflow-y-auto w-1/8 absolute space-y-4 px-6 inset-y-0 left-0 transform -translate-x-full duration-500 ease-in-out sidebar md:hidden " :class="{'-translate-x-full': show}">

            <aside>

                <div class="flex justify-between items-center mb-3">

                    <button class="mr-5 border border-gray-300  rounded-full text-black text-sm uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out" wire:click="clean" @click="show = !show">Borrar Filtros</button>

                    <span class="cursor-pointer font-semibold text-gray-400" @click="show = true">X</span>

                </div>

                <h2 class="font-semibold mb-2">Diseños</h2>

                <ul>

                    @foreach ($categoryDesigns as $categoryDesign)

                        <li
                            class=" ml-2 mb-1 text-sm capitalize font-semibold"

                            >{{ $categoryDesign->name }}
                        </li>

                        @foreach ($categoryDesign->subcategories as $subcategoryDesign)

                            <li
                                class=" ml-4 mb-1 text-sm cursor-pointer capitalize"
                                wire:click="$set('subcategoryDesignName', '{{ $subcategoryDesign->name }}')"
                                @click=" window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                }), show = !show"
                                >{{ $subcategoryDesign->name }}
                            </li>

                        @endforeach

                    @endforeach

                </ul>

            </aside>

        </div>

        <aside class="hidden md:block">

            <button type="button" class="border border-gray-300  rounded-full text-black text-sm mb-3 uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out" wire:click="clean">Borrar Filtros</button>

            <h2 class="font-semibold mb-2">Diseños</h2>

            <ul>

                @foreach ($categoryDesigns as $categoryDesign)

                    <li
                        class=" ml-2 mb-1 text-sm capitalize font-semibold"

                        >{{ $categoryDesign->name }}
                    </li>

                    @foreach ($categoryDesign->subcategories as $subcategoryDesign)

                        <li
                            class=" ml-4 mb-1 text-sm cursor-pointer capitalize"
                            wire:click="$set('subcategoryDesignName', '{{ $subcategoryDesign->name }}')"
                            @click=" window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });"
                            >{{ $subcategoryDesign->name }}
                        </li>

                    @endforeach

                @endforeach

            </ul>

        </aside>

        <div class="md:col-span-2 lg:col-span-4 mx-auto" @click="show = true">

            <p class="text-xl capitalize font-medium">{{ $subcategoryDesignName }}</p>

            <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                @forelse ($designs as $design)

                    <li class="">

                        <article class="text-center">

                            <figure class="mb-2 h-44 md:h-60 flex items-end overflow-hidden">

                                <img class="h-full mx-auto" src="{{ $design->thumbUrl() }}" alt="">

                            </figure>

                            <h1 class=" uppercase font-light truncate">{{ $design->name }}</h1>

                            <p class="mb-2">$ {{ $design->product->price }}</p>

                            <a href="{{ route('designs.show', $design->slug) }}" class="border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">Ver producto</a>

                        </article>

                    </li>

                @empty

                @endforelse

            </ul>

            <div class="mt-10">

                {{ $designs->links() }}

            </div>

        </div>

    </div>

</div>
