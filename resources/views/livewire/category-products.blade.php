<div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-5">

        <aside>

            <button class="border border-gray-300  rounded-full text-black text-sm mb-3 uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out" wire:click="clean">Borrar Filtros</button>

            <h2 class="font-semibold mb-2">Productos</h2>

            <ul class="mb-3">

                @foreach ($categoryProduct->products as $producto)

                    <li
                        class=" ml-2 mb-1 text-sm cursor-pointer capitalize {{ $product == $producto->name ? 'font-semibold' : '' }}"
                        wire:click="$set('product', '{{ $producto->name }}')"
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

                            <a href="#" class="border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">Ver producto</a>

                        </article>

                    </li>

                @empty

                @endforelse

            </ul>

            <div class="mt-4">

                {{ $designs->links() }}

            </div>

        </div>

    </div>

</div>
