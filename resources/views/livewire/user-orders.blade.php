<div class="container py-8">

    @push('styles')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @endpush

    <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-2 md:gap-5 mb-10">

        <button
            class="flex items-center justify-center text-center bg-white border border-gray-500 hover:border-blue-500 text-black transition-all rounded-lg px-4 py-2 space-x-5 hover:shadow-2xl"
            wire:click="$set('filter','nueva')"
            wire:loading.attr="disabled"
            wire:target="$set('filter','nueva')"
        >

            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
            </svg>

            <div class="flex items-center justify-start md:justify-center space-x-10 md:space-x-0 md:block w-full ">

                <p class="text-3xl">{{ $status['nueva'] }}</p>

                <p class="text-xl uppercase ">Nuevos</p>

            </div>

        </button>

        <button
            class="flex items-center justify-center text-center bg-white border hover:border-green-500 border-gray-500 text-black transition-all rounded-lg px-4 py-2 space-x-5 hover:shadow-2xl"
            wire:click="$set('filter','aceptada')"
            wire:loading.attr="disabled"
            wire:target="$set('filter','aceptada')"
        >

            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-green-500" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
            </svg>

            <div class="flex items-center justify-start md:justify-center space-x-10  md:space-x-0 md:block w-full ">

                <p class="text-3xl">{{ $status['aceptada'] }}</p>

                <p class="text-xl uppercase ">Aceptados</p>

            </div>

        </button>

        <button
            class="flex items-center justify-center text-center bg-white border border-gray-500 hover:border-yellow-500 text-black transition-all rounded-lg px-4 py-2 space-x-5 hover:shadow-2xl"
            wire:click="$set('filter','terminada')"
            wire:loading.attr="disabled"
            wire:target="$set('filter','terminada')"
        >

            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>

            <div class="flex items-center justify-start md:justify-center space-x-10 md:space-x-0 md:block w-full ">
                <p class=" text-3xl">{{ $status['terminada'] }}</p>

                <p class="text-xl uppercase ">Terminados</p>
            </div>

        </button>

        <button
            class="flex items-center justify-center text-center bg-white border border-gray-500 hover:border-black text-black transition-all rounded-lg px-4 py-2 space-x-5 hover:shadow-2xl"
            wire:click="$set('filter','entregada')"
            wire:loading.attr="disabled"
            wire:target="$set('filter','entregada')"
        >

            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
            </svg>

            <div class="flex items-center justify-start md:justify-center space-x-10 md:space-x-0 md:block w-full ">
                <p class=" text-3xl">{{ $status['entregada'] }}</p>

                <p class="text-xl uppercase ">Entregados</p>
            </div>

        </button>

        <button
            class="flex items-center justify-center text-center bg-white border border-gray-500 hover:border-red-500 text-black transition-all rounded-lg px-4 py-2 space-x-5 hover:shadow-2xl"
            wire:click="$set('filter','cancelada')"
            wire:loading.attr="disabled"
            wire:target="$set('filter','cancelada')"
        >

            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-red-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>

            <div class="flex items-center justify-start md:justify-center space-x-10 md:space-x-0 md:block w-full ">
                <p class=" text-3xl">{{ $status['cancelada'] }}</p>

                <p class="text-xl uppercase ">Cancelados</p>
            </div>

        </button>

    </section>

    <div class="bg-white py-4 px-2 shadow-2xl">

        <h1 class="text-2xl mb-5">Pedidos recientes</h1>

        <div class="" x-data="{selected : null}">

            @foreach ($orders as $order)

                <div @click="selected != {{ $loop->iteration }} ? selected = {{ $loop->iteration }} : selected = null" class="w full flex items-center justify-between border-t border-gray-500 py-4 cursor-pointer" :class="selected == {{ $loop->iteration }} ? 'bg-gray-200' : ''">

                    <div class="flex items-center justify-center text-center  px-4 py-2 space-x-5 ">

                        @if($order->status == 'nueva')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                        @elseif($order->status == 'aceptada')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                            </svg>
                        @elseif($order->status == 'terminada')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        @elseif($order->status == 'entregada')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                        @elseif($order->status == 'cancelada')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        @endif

                        <div class=" md:justify-center space-x-10 md:space-x-0 md:block w-full ">

                            <p class="uppercase text-md  tracking-widest">Pedido # {{ $order->number }}</p>

                            <p class="uppercase ">{{ $order->created_at }}</p>

                        </div>

                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" :class="selected == {{ $loop->iteration }} ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </div>

                <div
                    class="text-center mb-2 overflow-hidden max-h-0 transition-all duration-300"
                    x-ref="tab-{{ $loop->iteration }}"
                    :style="selected == {{ $loop->iteration }} ? 'max-height: ' + $el.scrollHeight + 'px;' :  ''"
                >

                    {{-- Tabla de productos --}}
                    <div class="w-full p-1 rounded-md overflow-x-auto mb-2">

                        <table class="rounded-lg w-full overflow-hidden table-auto   lg:table-fixed">

                            <thead class="border-b border-gray-300 bg-gray-50 ">

                                <tr class="text-sm text-gray-500 uppercase tracking-widest text-center">

                                    <th class="px-3 py-3 w-1/3">Nombre</th>
                                    <th class="px-3 py-3">Cantidad</th>
                                    <th class="px-3 py-3">Precio</th>
                                    <th class="px-3 py-3">Total</th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @foreach ($order->orderDetails  as $orderDetail)

                                    <tr class="bg-white">

                                        <td class="px-3 py-3 w-full  text-gray-800 text-center">

                                            <div class="flex items-center space-x-4 w-full">

                                                <img class="h-8 md:h-8 object-cover" src="{{ $orderDetail->design->imageUrl() }}" alt="Imagen del diseño">

                                                <div class="text-left">

                                                    <h1 class="text-black">{{ $orderDetail->design->name }}</h1>

                                                    @if ($orderDetail->color)

                                                        <p class=" text-gray-600">Color: {{ $orderDetail->color }}</p>

                                                    @endif

                                                    @if ($orderDetail->size)

                                                        <p class=" text-gray-600">Tamaño: {{ $orderDetail->size }}</p>

                                                    @endif

                                                </div>

                                            </div>

                                        </td>

                                        <td class="px-3 py-3 w-full text-gray-800 text-center">

                                            {{ $orderDetail->quantity }}

                                        </td>

                                        <td class="px-3 py-3 w-full text-gray-800 text-center" >

                                            ${{ number_format( ($orderDetail->total / $orderDetail->quantity) , 2) }}

                                        </td>

                                        <td class="px-3 py-3 w-full text-gray-800 text-center">

                                            ${{ number_format($orderDetail->total, 2) }}

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    <div class=" grid grid-cols-1 md:grid-cols-2 bg-white shadow-2xl">

                        <div class=" px-2">

                            @if($order->description)

                                <label class="font-semibold">Comentarios:</label>

                                <p class="text-justify">{{ $order->description }}</p>

                            @endif

                            <label class="font-semibold text-sm">Cupones:</label>

                            <div class="flex space-x-3">

                                @foreach ($order->cupons as $cupon)

                                    <span class="rounded-full px-2 bg-black  text-white text-sm flex">

                                        <p class="">{{ $cupon->code }}</p>

                                    </span>

                                @endforeach

                            </div>

                        </div>

                        <div class="p-4">

                            <div class=" flex space-x-3 justify-around md:justify-end mb-3">

                                @if ($order->anticipo_image)

                                    <div>
                                        <p>Anticipo</p>
                                        <a href="{{ $order->anticipoUrl() }}" data-lightbox="{{ $order->id }}" data-title="Anticipo">
                                            <img class="h-20 object-cover rounded" src="{{ $order->anticipoUrl() }}" alt="Imagen">
                                        </a>
                                    </div>

                                @endif

                                @if ($order->design_image)

                                    <div>
                                        <p>Diseño</p>
                                        <a href="{{ $order->designUrl() }}" data-lightbox="{{ $order->id }}" data-title="Diseño">
                                            <img class="h-20 object-cover rounded" src="{{ $order->designUrl() }}" alt="Imagen">
                                        </a>
                                    </div>

                                @endif

                            </div>

                            <p class="text-center md:text-right text-2xl mr-4 mb-2"> TOTAL: ${{ $order->total }}</p>



                        </div>

                    </div>

                </div>

            @endforeach



        </div>

        <div>

            {{ $orders->links() }}

        </div>

    </div>

    @push('script')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @endpush

</div>
