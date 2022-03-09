<div>

    <div class="grid grid-cols-1  md:grid-cols-3 lg:grid-cols-5 gap-6 mb-5 relative" x-data="{'show':true}" id="div">

        <button @click="show = !show" class="border border-gray-300 mt-2 mx-2 rounded-full text-black text-sm mb-3 uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out md:hidden">Filtros</button>

        <div class="bg-white h-auto overflow-y-auto w-2/8 absolute space-y-4 px-6 inset-y-0 left-0 transform -translate-x-full duration-500 ease-in-out sidebar md:hidden " :class="{'-translate-x-full': show}">

            <aside class="" >

                <div class="flex justify-between items-center mb-3">

                    <button class="mr-5 border border-gray-300  rounded-full text-black text-sm uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out" wire:click="clean" @click="show = !show">Borrar Filtros</button>

                    <span class="cursor-pointer font-semibold text-gray-400" @click="show = true">X</span>

                </div>

                <h2 class="font-semibold mb-2">Productos</h2>

                <ul class="mb-3">

                    @foreach ($categoryProduct->products as $producto)

                        <li
                            class=" ml-2 mb-1 text-sm cursor-pointer capitalize {{ $product == $producto->name ? 'font-semibold' : '' }}"
                            wire:click="$set('product', '{{ $producto->name }}')"
                            @click=" window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            }), show = !show"
                            >{{ $producto->name }}
                        </li>

                    @endforeach

                </ul>

                <h2 class="font-semibold mb-2">Diseños</h2>

                <ul>

                    @foreach ($listSubCategoryDesigns as $name)

                        <li
                            class=" ml-2 mb-1 text-sm cursor-pointer capitalize {{ $subcategoryDesign == $name ? 'font-semibold' : '' }}"
                            wire:click="$set('subcategoryDesign', '{{ $name }}')"
                            @click=" window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            }), show = !show"
                            >{{ $name }}
                        </li>

                    @endforeach

                </ul>

            </aside>
        </div>

        <aside class="hidden md:block">

            <button class="border border-gray-300  rounded-full text-black text-sm mb-3 uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out" wire:click="clean">Borrar Filtros</button>

            <h2 class="font-semibold mb-2">Productos</h2>

            <ul class="mb-3">

                @foreach ($categoryProduct->products as $producto)

                    <li
                        class=" ml-2 mb-1 text-sm cursor-pointer capitalize {{ $product == $producto->name ? 'font-semibold' : '' }}"
                        wire:click="$set('product', '{{ $producto->name }}')"
                        @click=" window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        })"
                        >{{ $producto->name }}
                    </li>

                @endforeach

            </ul>

            <h2 class="font-semibold mb-2">Diseños</h2>

            <ul>

                @foreach ($listSubCategoryDesigns as $name)

                    <li
                        class=" ml-2 mb-1 text-sm cursor-pointer capitalize {{ $subcategoryDesign == $name ? 'font-semibold' : '' }}"
                        wire:click="$set('subcategoryDesign', '{{ $name }}')"
                        @click=" window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        })"
                        >{{ $name }}
                    </li>

                @endforeach

            </ul>

        </aside>

        <div class="md:col-span-2 lg:col-span-4">

            <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">

                @forelse ($designs as $design)

                    <li class="">

                        <article class="text-center">

                            <figure class="mb-2">

                                <img class=" object-cover object-center" src="{{ asset('storage/img/logo.png') }}" alt="">

                            </figure>

                            <h1 class=" uppercase font-light truncate">{{ $design->name }}</h1>

                            <p class="mb-2">$ {{ $design->product->price }}</p>

                            <a href="{{ route('designs.show', $design->slug) }}" class="border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">Ver producto</a>

                        </article>

                    </li>

                @empty

                    <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 rounded-full text-lg w-full col-span-4">

                        No hay resultados.

                    </div>

                @endforelse

            </ul>

            <div class="mt-4">

                {{ $designs->links() }}

            </div>

        </div>

    </div>

</div>
