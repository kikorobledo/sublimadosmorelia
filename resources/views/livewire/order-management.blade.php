<div class="container my-10">

    <h1 class="tracking-widest uppercase text-2xl md:text-3xl mb-10">Resumen de tu pedido</h1>

    @if (Cart::count())

        <div>

            <button
                class="flex items-center justify-center space-x-4 rounded-full bg-black hover:bg-white text-white hover:text-black tracking-widest border-2 transition-all border-black uppercase font-light w-full  md:w-1/4 float-right my-3"
                wire:click="destroyCart"
                wire:loading.attr="disabled"
                wire:target="destroyCart"
            >

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>

                <p>
                    Borrar Carrito
                </p>

            </button>

        </div>

        <div class="w-full shadow-2xl p-4 rounded-md overflow-x-auto mb-8">

            <table class="rounded-lg w-full overflow-hidden table-auto   lg:table-fixed">

                <thead class="border-b border-gray-300 bg-gray-50 ">

                <tr class="text-sm text-gray-500 uppercase tracking-widest text-center">

                    <th class="px-3 py-3 w-1/3">Nombre</th>
                    <th class="px-3 py-3">Cantidad</th>
                    <th class="px-3 py-3">Precio</th>
                    <th class="px-3 py-3">Total</th>
                    <th></th>

                </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach (Cart::content() as $item)

                        <tr class="bg-white">

                            <td class="px-3 py-3 w-full  text-gray-800 text-center">

                                <div class="flex items-center space-x-4 w-full">

                                    <img class="h-10 md:h-20 object-cover" src="{{ $item->options->image }}" alt="Imagen del diseño">

                                    <div class="text-left">

                                        <h1 class="text-black">{{ $item->name }}</h1>

                                        <p>{{ $item->options->product_name }}</p>

                                        @if ($item->options->color)

                                            <p class=" text-gray-600">Color: {{ $item->options->color }}</p>

                                        @endif

                                        @if ($item->options->size)

                                            <p class=" text-gray-600">Tamaño: {{ $item->options->size }}</p>

                                        @endif

                                    </div>

                                </div>

                            </td>

                            <td class="px-3 py-3 w-full text-gray-800 text-center">

                                <div class="flex items-center mb-4 justify-center">

                                    <button class=" px-1 h-full"
                                        wire:click="changeQuantity(1, '{{ $item->rowId }}')"
                                        wire:loading.attr="disabled"
                                        wire:target="changeQuantity(1, '{{ $item->rowId }}')"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                    </button>

                                    <input
                                        type="number"
                                        min="1"
                                        class="w-20 bg-white rounded-full text-sm focus:border-black focus:ring-0 cursor-pointer text-center"
                                        readonly
                                        value="{{ $item->qty }}"
                                    >

                                    <button class=" px-1 h-full"
                                         wire:click="changeQuantity(2, '{{ $item->rowId }}')"
                                         wire:loading.attr="disabled"
                                         wire:target="changeQuantity(2, '{{ $item->rowId }}')"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>

                                </div>

                            </td>

                            <td class="px-3 py-3 w-full text-gray-800 text-center" >

                                ${{ number_format($item->price, 2) }}

                            </td>

                            <td class="px-3 py-3 w-full text-gray-800 text-center">

                                ${{ number_format(($item->price * $item->qty), 2) }}

                            </td>

                            <td class="px-3 py-3 w-full text-gray-800 text-center">

                                <button
                                        wire:click="deleteItem('{{ $item->rowId }}')"
                                        wire:loading.attr="disabled"
                                        wire:target="deleteItem('{{ $item->rowId }}')"
                                        class="bg-black hover:shadow-lg text-white text-xs md:text-sm px-3 py-2 rounded-full hover:bg-white hover:text-black border border-black flex focus:outline-none"
                                    >

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                                </button>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class=" grid grid-cols-1 md:grid-cols-2 bg-white shadow-2xl">

            <div class="p-4">

                <label class="font-semibold">Comentarios:</label>

                <textarea wire:model.defer="description" rows="3" class="bg-white rounded text-sm w-full focus:border-black focus:ring-0 cursor-pointer mb-4 md:mb-0"></textarea>

                @foreach (Cart::content() as $item)

                    @if (isset($item->options['cupon']))

                        <label class="font-semibold text-sm">Cupones:</label>

                    @endif

                    @break

                @endforeach

                <div class="flex space-x-3">

                    @foreach (Cart::content() as $item)

                        @if (isset($item->options['cupon']))

                            <span class="rounded-full px-2 bg-black  text-white text-sm flex">

                                <p class="mr-2">{{ $item->options->cupon }}</p>

                                <button class="text-xs"
                                    wire:click="removeCupon('{{ $item->options->cupon }}')"
                                    wire:loading.attr="disabled"
                                    wire:target="removeCupon('{{ $item->options->cupon }}')"
                                >
                                    X
                                </button>

                            </span>

                        @endif

                    @endforeach

                </div>

            </div>

            <div class="p-4 flex flex-col ">

                <p class="text-center md:text-right text-2xl mr-4"> TOTAL: ${{ Cart::subtotal() }}</p>

                <div class="mt-3">

                    @livewire('cupons')

                </div>

                <button
                    class="text-center rounded-full bg-black hover:bg-white text-white hover:text-black tracking-widest border-2 transition-all border-black uppercase font-light w-full py-1 md:w-1/2 ml-auto my-3"
                    wire:click="createOrder"
                    wire:loading.attr="disabled"
                    wire:target="createOrder"
                >
                    Generar pedido
                </button>

            </div>

        </div>

    @else

        <div class="text-center">

            <p class="uppercase text-center font-light text-2xl py-6 px-4">No hay artículos en tu carrito</p>

            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>

            <a href="{{ route('home') }}" class="inline-block text-center rounded-full bg-black hover:bg-white text-white hover:text-black tracking-widest border-2 transition-all border-black uppercase font-light w-full py-1 md:w-1/2 my-3">Ver Catálogo</a>

        </div>

    @endif

</div>
