<div class="z-10">

    <x-jet-dropdown width="80">

        <x-slot name="trigger">

            <span class="relative  cursor-pointer">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>

                @if (Cart::count())

                    <span class=" absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>

                @else

                    <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>

                @endif

            </span>

        </x-slot>

        <x-slot name="content">

            <div class="overflow-y-auto h-menu">

            <ul class="p-2 space-y-2 divide-y">

                @forelse (Cart::content() as $item)

                    <li class="flex items-center py-2">

                        <img class="h-12 object-cover mr-4" src="{{ $item->options->image }}" alt="Imagen del diseño">

                        <article class="flex-1">

                            <h1 class="text-black">{{ $item->name }}</h1>

                            <p class="text-sm text-gray-600">Cant: {{ $item->qty }}</p>

                            <p class="text-sm text-gray-600">Precio: ${{ $item->price }}</p>

                            @if ($item->options->color)

                                <p class="text-sm text-gray-600">Color: {{ $item->options->color }}</p>

                            @endif

                            @if ($item->options->size)

                                <p class="text-sm text-gray-600">Tamaño: {{ $item->options->size }}</p>

                            @endif


                        </article>

                    </li>

                @empty

                    <li class="py-6 px-2">

                        <p class="text-center text-black">No tiene agreado articulos en el carrito.</p>

                    </li>

                @endforelse

            </ul>

            @if (Cart::count())

                <div class="p-4">

                    <p class="text-black text-lg font-normal text-right mr-4"><span class="font-semibold">Total:</span> ${{ Cart::subtotal() }}</p>

                    <a href="{{ route('order_management') }}" class="inline-block text-center rounded-full bg-black hover:bg-white text-white hover:text-black tracking-widest border-2 transition-all border-black uppercase font-light w-full  my-3">Ir al carrito</a>

                </div>

            @endif

        </div>

        </x-slot>

    </x-jet-dropdown>

</div>
