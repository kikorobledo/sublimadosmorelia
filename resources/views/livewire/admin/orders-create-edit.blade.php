<div>

    @if ($order)

        <h1 class="text-3xl font-thin text-gray-500 mb-3">Actualizar Pedido</h1>

    @else

        <h1 class="text-3xl font-thin text-gray-500 mb-3">Nuevo Pedido</h1>

    @endif

    <div class="grid md:grid-cols-2 grid-cols-1 sm:grid-cols-2 gap-4 w-full" x-data x-ref="p">

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
                            <input type="number" class="bg-white rounded text-sm w-full pl-7 " wire:model.lazy="anticipo" placeholder="0.00">
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

                                <th class="px-3 py-3 hidden lg:table-cell">Producto</th>

                                <th class="px-3 py-3 hidden lg:table-cell">Cantidad</th>

                                <th class="px-3 py-3 hidden lg:table-cell">Precio</th>

                                <th class="px-3 py-3 hidden lg:table-cell">total</th>

                                <th class="px-3 py-3 hidden lg:table-cell">Acciones</th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200 flex-1 sm:flex-none ">

                            @foreach($order->orderDetails as $orderDetail)

                                <tr class="text-sm font-medium text-gray-500 bg-white flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">

                                    <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Diseño</span>

                                        {{ $orderDetail->design->name}}

                                    </td>

                                    <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Producto</span>

                                        {{ $orderDetail->product->name}}

                                        @if ($orderDetail->color)

                                            <p>Color: {{ $orderDetail->color}}</p>

                                        @endif

                                        @if ($orderDetail->size)

                                            <p>Talla: {{ $orderDetail->size}}</p>

                                        @endif

                                    </td>

                                    <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Cantidad</span>

                                        <p class="text-sm font-medium">{{ $orderDetail->quantity }}</p>

                                    </td>

                                    <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Precio</span>

                                        <p class="text-sm font-medium">${{ number_format($orderDetail->total / $orderDetail->quantity, 2) }}</p>

                                    </td>

                                    <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b block lg:table-cell relative lg:static">

                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Total</span>

                                        <p class="text-sm font-medium">${{ number_format($orderDetail->total,2) }}</p>

                                    </td>

                                    <td class="px-3 py-3 w-full lg:w-auto p-3 text-center lg:text-left lg:border-0 border border-b lg:table-cell relative lg:static">

                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-300 px-2 py-1 text-xs text-white font-bold uppercase rounded-br-xl">Acciones</span>

                                        <div class="flex items-center space-x-2">

                                            <button
                                                wire:click="deleOrderDetail({{ $orderDetail->id }})"
                                                wire:loading.attr="disabled"
                                                wire:target="deleOrderDetail({{ $orderDetail->id }})"
                                                class="bg-red-400 hover:shadow-lg text-white mx-auto text-xs md:text-sm px-3 py-2 rounded-full hover:bg-red-700 flex focus:outline-none"
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

                        <p class="text-right text-2xl font-bold">Total: ${{ number_format($order->total,2) }}</p>

                    </div>

                    <div class="col-span-1 flex flex-col md:flex-row justify-between md:space-x-2">

                        @if ($order)

                            <button
                                wire:click="update"
                                wire:loading.attr="disabled"
                                wire:target="update"
                                class="rounded-full  text-white bg-green-500 my-2 py-2 px-4 float-right hover:bg-green-700 w-full"
                            > Actualizar Pedido
                            </button>

                            <span x-data="{ open: false }" class="w-full z-50">
                                <!-- Trigger -->
                                <span x-on:click="open = true">
                                    <button type="button" class="rounded-full  text-white bg-yellow-500 my-2 py-2 px-4 float-right hover:bg-yellow-700 w-full">
                                        Cobrar
                                    </button>
                                </span>

                                <!-- Modal -->
                                <div
                                    x-show="open"
                                    style="display: none"
                                    x-on:keydown.escape.prevent.stop="open = false"
                                    role="dialog"
                                    aria-modal="true"
                                    x-id="['modal-title']"
                                    :aria-labelledby="$id('modal-title')"
                                    class="fixed inset-0 overflow-y-auto"
                                >
                                    <!-- Overlay -->
                                    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

                                    <!-- Panel -->
                                    <div
                                        x-show="open" x-transition
                                        x-on:click="open = false"
                                        class="relative min-h-screen flex items-center justify-center p-4"
                                    >
                                        <div
                                            x-on:click.stop
                                            x-trap.noscroll.inert="open"
                                            class="relative max-w-md w-full bg-white border rounded-md p-8 overflow-y-auto"
                                        >
                                            <!-- Title -->
                                            <h2 class="text-3xl mb-2" :id="$id('modal-title')">Cobrar</h2>
                                            <!-- Content -->
                                            <div class="flex flex-col md:flex-row justify-between md:space-x-3">

                                                <div class="flex-auto mb-2">
                                                    <div>
                                                        <Label>Total</Label>
                                                    </div>
                                                    <div>
                                                        <div class="relative rounded-md shadow-sm">
                                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                <span class="text-gray-500 sm:text-sm">
                                                                $
                                                                </span>
                                                            </div>
                                                            <input type="number" class="bg-white rounded text-sm w-full pl-7 " value="{{ ($order->total - ($anticipo ? $anticipo : 0)) }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex-auto mb-2">
                                                    <div>
                                                        <Label>Recibido</Label>
                                                    </div>
                                                    <div>
                                                        <div class="relative rounded-md shadow-sm">
                                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                <span class="text-gray-500 sm:text-sm">
                                                                $
                                                                </span>
                                                            </div>
                                                            <input type="number" class="bg-white rounded text-sm w-full pl-7 " wire:model.lazy="recibido" placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex-auto mb-2">
                                                    <div>
                                                        <Label>Cambio</Label>
                                                    </div>
                                                    <div>
                                                        <div class="relative rounded-md shadow-sm">
                                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                <span class="text-gray-500 sm:text-sm">
                                                                $
                                                                </span>
                                                            </div>
                                                            <input type="number" class="bg-white rounded text-sm w-full pl-7 " value="{{ $cambio }}" placeholder="0.00" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div>
                                                @error('recibido') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                                            </div>
                                            <!-- Buttons -->
                                            <div class="mt-2 flex space-x-2 float-right">
                                                <button
                                                    type="button"
                                                    x-on:click="open = false"
                                                    wire:click="pay"
                                                    wire:loading.attr="disabled"
                                                    wire:target="pay"
                                                    class="rounded-full  text-white bg-green-500 my-2 py-1 px-4 float-right hover:bg-green-700">
                                                    Cobrar
                                                </button>
                                                <button type="button" x-on:click="open = false" class="rounded-full  text-white bg-red-500 my-2 py-1 px-4 float-right hover:bg-red-700">
                                                    Cancelar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>

                        @else

                            <button
                                wire:click="update"
                                wire:loading.attr="disabled"
                                wire:target="update"
                                class="rounded-full  text-white bg-green-500 my-2 py-2 px-4 float-right hover:bg-green-700 w-full"
                            > Crear Pedido
                            </button>

                        @endif

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                        <div class="col-span-1">

                            <div
                                wire:ignore
                                x-data
                                x-init="

                                    FilePond.setOptions({
                                        server: {
                                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                @this.upload('image_anticipo', file, load, error, progress);
                                            },
                                            revert: (filename, load) => {
                                                @this.removeUpload('image_anticipo', filename, load);
                                            }
                                        },
                                        labelIdle: 'Selecciona la imagen del anticipo'
                                    });

                                    FilePond.create($refs.input)
                                "
                            >

                                <input type="file" x-ref="input">

                            </div>

                            <div class=" mt-5">

                                @if($order->anticipo_image)

                                    <img class="w-full rounded" src="{{ $order->anticipoUrl() }}" alt="Imagen Diseño Final">

                                @endif

                            </div>

                        </div>

                        <div class="col-span-1">

                            <div
                                wire:ignore
                                x-data
                                x-init="() => {
                                    const post = FilePond.create($refs.input2);
                                    post.setOptions({
                                        server: {
                                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                @this.upload('image_design', file, load, error, progress);
                                            },
                                            revert: (filename, load) => {
                                                @this.removeUpload('image_design', filename, load);
                                            }
                                        },
                                        labelIdle: 'Selecciona la imagen del diseño final'
                                    });


                                }"
                            >

                                <input type="file" x-ref="input2">

                            </div>

                            <div class=" mt-5">

                                @if($order->design_image)

                                    <img class="w-full rounded" src="{{ $order->designUrl() }}" alt="Imagen Diseño Final">

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

                @else

                    <div class="border-b border-gray-300 bg-white text-gray-500 text-center p-5 w-full rounded-full text-lg">

                        No has solicitado productos.

                    </div>

            @endif

        </div>

        <div class="rounded-xl border-t-2 border-blue-500 bg-white p-3 shadow-lg col-span-2 lg:col-span-1">

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