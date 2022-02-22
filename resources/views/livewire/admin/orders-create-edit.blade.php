<div>

    @if ($order)

        <h1 class="text-3xl font-thin text-gray-500 mb-3">Actualizar Pedido</h1>

    @else

        <h1 class="text-3xl font-thin text-gray-500 mb-3">Nuevo Pedido</h1>

    @endif

    <div class="grid md:grid-cols-2 grid-cols-1 sm:grid-cols-2 gap-4 w-full">

        <div class="rounded-xl border-t-2 border-green-500 shadow-lg p-8 bg-white col-span-2 lg:col-span-1 text-gray-600">

            <div class="flex flex-col md:flex-row justify-between md:space-x-3 mb-5">

                <div class="flex-auto mb-5">

                    <div>

                        <Label>Cliente</Label>

                    </div>

                    <div x-data="selectSearch({{$clients}})" class=" bg-white rounded text-sm border border-gray-500 relative"
                        x-init="init('cliente')"
                        @click.away="closeSelect()"
                        @keydown.escape="closeSelect()">

                        <div class="flex w-full p-2  cursor-pointer" @click="open=true">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>

                                @if($order)
                                    <p class="truncate">{{ $order->client->name }}</p>
                                @else
                                    <p class="truncate" x-text="placeholder"></p>
                                @endif

                        </div>

                        <div class="mt-0.5 w-full bg-white border-gray-500 rounded-b-md border absolute top-full left-0 z-30" x-show="open">

                            <div class="relative z-30 w-full p-2 bg-white">

                                <input placeholder="Buscar.." type="text" x-model="search" x-on:click.prevent.stop="open=true" class="block w-full  border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5">

                            </div>

                            <ul class="h-96 p-2 w-full flex flex-col overflow-y-auto">
                                <template x-for="client in Object.values(options)">

                                    <span
                                        x-text="client.name"
                                        class="hover:bg-gray-100 py-1 px-4 rounded-xl cursor-pointer"
                                        x-on:click.prevent.stop="selected(client.name)"
                                        x-on:click="$wire.$set('client_id', client.id)">
                                    </span>

                                </template>
                            </ul>

                        </div>

                    </div>

                    <div>

                        @error('client_id') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

                    </div>

                </div>

                <div class="flex-auto mb-5">

                    <div>

                        <Label>Status</Label>
                    </div>

                    <div>

                        <select class="bg-white rounded text-sm w-full capitalize" wire:model.defer="status">
                            <option selected>Selecciona una opción</option>
                            <option  value="nueva">nueva</option>
                            <option  value="aceptada">aceptada</option>
                            <option  value="terminada">terminada</option>
                            <option  value="entregada">entregada</option>
                            <option  value="pagada">pagada</option>

                        </select>

                    </div>

                    <div>

                        @error('status') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

                    </div>

                </div>

                <div class="flex-auto mb-5">
                    <div>
                        <Label>Anticipo</Label>
                    </div>
                    <div>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">
                                $
                                </span>
                            </div>
                            <input type="number" class="bg-white rounded text-sm w-full pl-7 " wire:model.defer="anticipo" placeholder="0.00">
                        </div>
                    </div>
                    <div>
                        @error('anticipo') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>

            @if($order)

                    <div class="relative overflow-x-auto rounded-lg ">

                        <table class="rounded-lg w-full">

                            <thead class="border-b border-gray-300 bg-gray-50">

                                <tr class="text-xs font-medium text-gray-500 uppercase text-left traling-wider">

                                    <th class="px-3 py-3 hidden lg:table-cell">Diseño</th>

                                    <th class="px-3 py-3 hidden lg:table-cell">Cantidad</th>

                                    <th class="px-3 py-3 hidden lg:table-cell">total</th>

                                    <th class="px-3 py-3 hidden lg:table-cell">

                                        Nombre

                                    </th>

                                    <th class="px-3 py-3 hidden lg:table-cell">Acciones</th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-200 flex-1 sm:flex-none ">

                                @foreach($order->orderDetails as $orderDetail)

                                    <tr class="text-sm font-medium text-gray-500 bg-white flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">

                                        <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                            {{ $orderDetail->design->name}}

                                        </td>

                                        <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Nombre</span>

                                            <p class="text-sm font-medium">{{ $orderDetail->quantity }}</p>

                                        </td>

                                        <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Nombre</span>

                                            <p class="text-sm font-medium">${{ number_format($orderDetail->total,2) }}</p>

                                        </td>

                                        <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Nombre</span>

                                            <p class="text-sm font-medium">{{ $orderDetail->product->name }} (${{ number_format($orderDetail->product->price,2) }})</p>

                                        </td>

                                        <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b lg:table-cell relative lg:static">

                                            <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Acciones</span>

                                            <div class="flex items-center space-x-2">

                                                <button
                                                    wire:click="deleOrderDetail({{ $orderDetail->id }})"
                                                    wire:loading.attr="disabled"
                                                    wire:target="deleOrderDetail({{ $orderDetail->id }})"
                                                    class="bg-red-400 hover:shadow-lg text-white text-xs md:text-sm px-3 py-2 rounded-full hover:bg-red-700 flex focus:outline-none"
                                                >

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                        <div class="p-2 mb-2">

                            <p class="text-sm">Comentarios:</p>

                            <textarea  wire:model.defer="description" class="bg-white rounded text-sm w-full"></textarea>

                            <p class="text-right text-2xl font-bold">Total: ${{ number_format($total,2) }}</p>

                        </div>

                        <div class="flex justify-between">

                            <button
                                    wire:click="loadImage"
                                    wire:loading.attr="disabled"
                                    wire:target="loadImage"
                                    class="rounded-full  text-white bg-blue-500 my-2 py-2 px-4 float-right hover:bg-blue-700"
                                >Subir Imágen
                                </button>

                            @if ($content)

                                <button
                                    wire:click="create"
                                    wire:loading.attr="disabled"
                                    wire:target="create"
                                    class="rounded-full  text-white bg-green-500 my-2 py-2 px-4 float-right hover:bg-green-700"
                                > Actualizar Pedido
                                </button>

                            @else

                                <button
                                    wire:click="create"
                                    wire:loading.attr="disabled"
                                    wire:target="create"
                                    class="rounded-full  text-white bg-green-500 my-2 py-2 px-4 float-right hover:bg-green-700"
                                > Crear Pedido
                                </button>

                            @endif

                        </div>

                        <div>

                            @error('total') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

                            @error('content') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

                        </div>

                    </div>

                    @else

                        <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 w-full rounded-full text-lg">

                            No has solicitado artículos.

                        </div>

                @endif

        </div>

        <div class="rounded-xl border-t-2 border-blue-500 bg-white p-3 shadow-lg">

            <div class="overflow-x-auto">

                <input type="text" wire:model="search" placeholder="Buscar" class="bg-white rounded-full text-sm my-3 float-right mr-3">

                <table class="rounded-lg shadow-xl w-full overflow-hidden table-auto xl:table-fixed">

                    <thead class="border-b border-gray-300 bg-gray-50">

                        <tr class="text-xs font-medium text-gray-500 uppercase text-left traling-wider">
                            <th  class="px-2 py-3">
                                Diseño
                            </th>
                            <th  class="px-2 py-3 ">
                                Producto
                            </th>
                            <th class="px-2 py-3">
                                Cantidad
                            </th>
                            <th  class="px-2 py-3 ">
                                Acciones
                            </th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($designs as $design)

                            @livewire('admin.orders-add-product', ['design' => $design, 'products' => $products], key($design->id))

                        @empty

                            <tr>
                                <td class="p-4 text-center" colspan="10">No hay diseños para mostrar</td>
                            </tr>

                        @endforelse

                    </tbody>

                    <tfoot class="border-b border-gray-300 bg-gray-50">
                        <tr>
                            <td colspan="4" class="py-2 px-5 ">
                                {{ $designs->links() }}
                            </td>
                        </tr>
                    </tfoot>

                </table>

            </div>

        </div>

    </div>

    <script>

        function selectSearch(data){

            return{
                data:data,
                placeholder: "",
                open:false,
                search:'',
                options: {},
                limit:100,
                init(modelo){

                    if(modelo == "cliente")
                        this.placeholder ="Seleccione un cliente";
                    else if(modelo == "producto")
                        this.placeholder ="Seleccione un producto";
                    else
                        this.placeholder ="Seleccione una mesa";

                    this.resetOptions();

                    this.$watch('search', ((values) => {

                        if (!this.open || !values) {
                            this.resetOptions()
                            return
                        }
                        this.options = Object.keys(this.data)
                            .filter((key) => this.data[key].name.toLowerCase().includes(values.toLowerCase()))
                            .slice(0, this.limit)
                            .reduce((options, key) => {
                                options[key] = this.data[key]
                                return options
                            }, {})
                    }))
                },
                resetOptions: function() {
                    this.options = Object.keys(this.data)
                        .slice(0,this.limit)
                        .reduce((options, key) => {
                            options[key] = this.data[key]
                            return options
                        }, {})
                },
                closeSelect: function() {
                    this.open = false
                    this.search = ''
                },
                selected(name){
                    this.placeholder = name;
                    this.open = false;
                }
            }
        }

    </script>

</div>
