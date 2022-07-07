<div class="">

    <div class="mb-5">

        <h1 class="titulo-seccion text-3xl font-thin text-gray-500 mb-3">Entradas</h1>

        <div class="flex justify-between">

            <div>

                <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar" class="bg-white rounded-full text-sm">

                <select class="bg-white rounded-full text-sm" wire:model="pagination">

                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>

                </select>

            </div>

            <button wire:click="openModalCreate" class="bg-gray-500 hover:shadow-lg hover:bg-gray-700 float-right mb-5 text-sm py-2 px-4 text-white rounded-full focus:outline-none hidden md:block">Agregar nueva Entrada</button>

            <button wire:click="openModalCreate" class="bg-gray-500 hover:shadow-lg hover:bg-gray-700 float-right mb-5 text-sm py-2 px-4 text-white rounded-full focus:outline-none md:hidden">+</button>

        </div>

    </div>

    @if($entries->count())

        <div class="relative overflow-x-auto rounded-lg shadow-xl">

            <table class="rounded-lg w-full">

                <thead class="border-b border-gray-300 bg-gray-50">

                    <tr class="text-xs font-medium text-gray-500 uppercase text-left traling-wider">

                        <th wire:click="order('number')" class="cursor-pointer px-3 py-3 hidden lg:table-cell">

                            #

                            @if($sort == 'number')

                                @if($direction == 'asc')

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                                    </svg>

                                @else

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                    </svg>

                                @endif

                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>

                            @endif

                        </th>

                        <th wire:click="order('quantity')" class="cursor-pointer px-3 py-3 hidden lg:table-cell">

                            Cantidad

                            @if($sort == 'quantity')

                                @if($direction == 'asc')

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                                    </svg>

                                @else

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                    </svg>

                                @endif

                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>

                            @endif

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">

                            Productos

                        </th>

                        <th wire:click="order('price')" class="cursor-pointer px-3 py-3 hidden lg:table-cell">

                            Precio

                            @if($sort == 'price')

                                @if($direction == 'asc')

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                                    </svg>

                                @else

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                    </svg>

                                @endif

                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>

                            @endif

                        </th>

                        <th wire:click="order('created_at')" class="cursor-pointer px-3 py-3 hidden lg:table-cell">

                            Registro

                            @if($sort == 'created_at')

                                @if($direction == 'asc')

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                                    </svg>

                                @else

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                    </svg>

                                @endif

                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>

                            @endif

                        </th>

                        <th wire:click="order('updated_at')" class="cursor-pointer px-3 py-3 hidden lg:table-cell">

                            Actualizado

                            @if($sort == 'updated_at')

                                @if($direction == 'asc')

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                                    </svg>

                                @else

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                    </svg>

                                @endif

                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>

                            @endif

                        </th>

                        <th class="px-3 py-3 hidden lg:table-cell">Acciones</th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-200 flex-1 sm:flex-none ">

                    @foreach($entries as $entrie)

                        <tr class="text-sm font-medium text-gray-500 bg-white flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Número</span>

                                <div class="flex items-center justify-center lg:justify-start">

                                    {{ $entrie->number }}

                                </div>

                            </td>

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Cantidad</span>

                                <div class="flex items-center justify-center lg:justify-start">

                                    {{ $entrie->quantity }} Productos

                                </div>

                            </td>

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Productos</span>

                                <div class="flex items-center justify-center lg:justify-start">

                                    @forelse ($entrie->products as $product)

                                        {{ $product->name }} <br>
                                        {{ $product->pivot->quantity }} - ${{ $product->pivot->price }}
                                        <br>
                                    @empty

                                    @endforelse

                                </div>

                            </td>

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Precio</span>

                                ${{ $entrie->price }}

                            </td>

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Registrado</span>

                                @if($entrie->created_by != null)

                                    <span class="font-semibold">Registrado por: {{$entrie->createdBy->name}}</span> <br>

                                @endif

                                {{ $entrie->created_at }}

                            </td>

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Actualizado</span>

                                @if($entrie->updated_by != null)

                                    <span class="font-semibold">Actualizado por: {{$entrie->updatedBy->name}}</span> <br>

                                @endif

                                {{ $entrie->updated_at }}

                            </td>

                            <td class="px-3 py-3 w-full lg:w-auto p-3 text-gray-800 text-center lg:text-left lg:border-0 border border-b lg:table-cell relative lg:static">

                                <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Acciones</span>

                                <div class="flex justify-center lg:justify-start">

                                    <button
                                        wire:click="openModalEdit({{$entrie}})"
                                        wire:loading.attr="disabled"
                                        wire:target="openModalEdit({{$entrie}})"
                                        class="bg-blue-400 hover:shadow-lg text-white text-xs md:text-sm px-3 py-2 rounded-full mr-2 hover:bg-blue-700 flex focus:outline-none"
                                    >


                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>

                                        <p>Editar</p>

                                    </button>

                                    <button
                                        wire:click="openModalDelete({{$entrie}})"
                                        wire:loading.attr="disabled"
                                        wire:target="openModalDelete({{$entrie}})"
                                        class="bg-red-400 hover:shadow-lg text-white text-xs md:text-sm px-3 py-2 rounded-full hover:bg-red-700 flex focus:outline-none"
                                    >

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                                        <p>Eliminar</p>

                                    </button>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot class="border-gray-300 bg-gray-50">

                    <tr>

                        <td colspan="8" class="py-2 px-5">
                            {{ $entries->links()}}
                        </td>

                    </tr>

                </tfoot>

            </table>

            <div class="h-full w-full rounded-lg bg-gray-200 bg-opacity-75 absolute top-0 left-0" wire:loading wire:target="search">

                <img class="mx-auto h-16" src="{{ asset('storage/img/loading.svg') }}" alt="">

            </div>

        </div>

    @else

        <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 rounded-full text-lg">

            No hay resultados.

        </div>

    @endif

    <x-jet-dialog-modal wire:model="modal">

        <x-slot name="title">

            @if($create)
                Nueva Entrada
            @elseif($edit)
                Editar Entrada
            @endif

        </x-slot>

        <x-slot name="content">

            @if($step == 1)

                <div class="flex flex-col md:flex-row justify-between md:space-x-3 mb-5">

                    <div class="flex-auto ">

                        <div>

                            <Label>Cantidad de productos</Label>
                        </div>

                        <div>

                            <input type="text" class="bg-white rounded text-sm w-full" wire:model.defer="quantity">

                        </div>

                        <div>

                            @error('quantity') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

                        </div>

                    </div>

                    <div class="flex-auto ">

                        <div>

                            <Label>Costo</Label>
                        </div>

                        <div>

                            <input type="text" class="bg-white rounded text-sm w-full" wire:model.defer="price">

                        </div>

                        <div>

                            @error('price') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

                        </div>

                    </div>

                </div>

                @if($edit)

                <div class="flex flex-col md:flex-row justify-between md:space-x-3 mb-5">

                    <div class="flex-auto ">

                        <div class="">

                            @if ($productsEntrie)

                                <div>

                                    <Label>Productos</Label>
                                </div>

                                <div >

                                    <table class="rounded-lg w-full table-fixed">

                                        <thead class="border-b border-gray-300 bg-gray-50">

                                            <tr class="text-xs font-medium text-gray-500 uppercase text-left traling-wider">

                                                <th class="px-3 py-3">Nombre</th>

                                                <th class="px-3 py-3">Cantidad</th>

                                                <th class="px-3 py-3">Precio</th>

                                                <th class="px-3 py-3"></th>

                                            </tr>

                                        </thead>

                                        <tbody class="divide-y divide-gray-200">

                                            @foreach ($productsEntrie as $product)

                                                <tr class="text-sm text-gray-500 bg-white">

                                                    <td class="px-2 py-3 w-full text-gray-800 text-sm">
                                                        {{ $product['name'] }}
                                                    </td>

                                                    <td class="px-2 py-3 w-full text-gray-800 text-sm text-center">
                                                        {{ $product['pivot']['quantity'] }}
                                                    </td>

                                                    <td class="px-2 py-3 w-full text-gray-800 text-sm text-center">
                                                        ${{ $product['pivot']['price'] }}
                                                    </td>

                                                    <td class="px-2 py-3 w-full text-gray-800 text-sm">
                                                        <button
                                                            wire:click="deleteProduct({{ $product['id'] }})"
                                                            wire:loading.attr="disabled"
                                                            wire:target="deleteProduct({{ $product['id'] }})"
                                                            class="bg-red-400 hover:shadow-lg text-white text-xs md:text-sm px-3 py-2 rounded-full hover:bg-red-700 flex focus:outline-none"
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

                            @endif

                        </div>

                    </div>

                </div>

                @endif

            @endif

            @if($step == 2)

                <input type="text" wire:model.debounce.500ms="searchProducts" placeholder="Buscar" class="bg-white rounded-full text-sm mb-2">

                @if (count($products))

                    <div class="relative overflow-x-auto">

                        <table class="rounded-lg table-auto w-full">

                            <thead class="border-b border-gray-300 bg-gray-50">

                                <tr class="text-xs font-medium text-gray-500 uppercase text-left">

                                    <th class="px-3 py-3">

                                        Producto

                                    </th>

                                    <th class="px-3 py-3">

                                        Cantidad

                                    </th>

                                    <th class="px-3 py-3">

                                        Precio

                                    </th>

                                    <th class="px-3 py-3">Acciones</th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-200 ">

                                @foreach($products as $product)

                                     @livewire('admin.entrie-add-product', ['product' => $product], key($product->id))

                                @endforeach

                            </tbody>

                            <tfoot class="border-gray-300 bg-gray-50">

                                <tr>

                                    <td colspan="8" class="py-2 px-5">
                                        {{ $products->links()}}
                                    </td>

                                </tr>

                            </tfoot>

                        </table>

                        <div class="h-full w-full rounded-lg bg-gray-200 bg-opacity-75 absolute top-0 left-0" wire:loading wire:target="searchProducts">

                            <img class="mx-auto h-16" src="{{ asset('storage/img/loading.svg') }}" alt="">

                        </div>

                    </div>

                @else

                    <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 rounded-full text-lg w-full">

                        No hay resultados.

                    </div>

                @endif

            @endif

        </x-slot>

        <x-slot name="footer">

            <div class="flex justify-between">

                @if($create && $step == 1)

                    <button
                        wire:click="changeStep(1)"
                        wire:loading.attr="disabled"
                        wire:target="changeStep(1)"
                        class="bg-blue-400 hover:shadow-lg text-white font-bold px-4 py-2 rounded-full text-sm mb-2 hover:bg-blue-700 flaot-left mr-1 focus:outline-none">
                        Siguiente
                    </button>

                @elseif($edit && $step == 1)

                    <button
                        wire:click="changeStep(2)"
                        wire:loading.attr="disabled"
                        wire:target="changeStep(2)"
                        class="bg-blue-400 hover:shadow-lg text-white font-bold px-4 py-2 rounded-full text-sm mb-2 hover:bg-blue-700 flaot-left mr-1 focus:outline-none">
                        Siguiente
                    </button>

                @endif

                <button
                    wire:click="closeModal"
                    wire:loading.attr="disabled"
                    wire:target="closeModal"
                    type="button"
                    class="bg-red-400 hover:shadow-lg text-white font-bold px-4 py-2 rounded-full text-sm mb-2 hover:bg-red-700 ml-auto focus:outline-none">
                    Finalizar
                </button>

            </div>

        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="modalDelete">

        <x-slot name="title">
            Eliminar Entrada
        </x-slot>

        <x-slot name="content">
            ¿Esta seguro que desea eliminar la entrada? No sera posible recuperar la información.
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button
                wire:click="$toggle('modalDelete')"
                wire:loading.attr="disabled"
            >
                No
            </x-jet-secondary-button>

            <x-jet-danger-button
                class="ml-2"
                wire:click="delete()"
                wire:loading.attr="disabled"
                wire:target="delete"
            >
                Borrar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-confirmation-modal>

</div>
