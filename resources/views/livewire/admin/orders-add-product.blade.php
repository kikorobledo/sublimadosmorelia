<tr class="text-xs text-gray-500 bg-white">

    <td class="p-3 text-center">

        <div class="flex items-center justify-center lg:justify-start ">
            <div class="flex-shrink">
                @if($design->image)
                    <img class="w-10 lg:w-10 rounded" src="/storage/{{ $design->image }}" alt="{{ $design->name }}">
                @else
                    <img class="w-10 lg:w-10 rounded" src="{{ asset('storage/img/logo2.png') }}" alt="{{ $design->name }}">
                @endif
            </div>
            <div class="ml-4">
                <div class="text-sm text-left font-medium mb-1">
                    {{ $design->name }}
                </div>
            </div>
        </div>

    </td>

    <td class=" w-full p-3 text-center ">

        <select wire:model.defer="product"  class="bg-white rounded text-sm w-full">

            <option value="">Seleccione un producto</option>

            @foreach($products as $product)

                <option value="{{ $product }}">{{ $product->name }}</option>

            @endforeach

        </select>

        <div>

            @error('product') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

        </div>

    </td>

    <td class=" w-full p-3 text-center">

        <input type="number" min="1" wire:model.defer="quantity" class="bg-white rounded-full w-2/3" placeholder="0">
        <div>

            @error('quantity') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

        </div>

    </td>

    <td class=" w-full p-3 text-center ">

        <div class="flex justify-center lg:justify-start">

            <button
                wire:loading.attr="disabled"
                wire:click="addProduct"
                wire:target="addProduct"
                class="bg-green-400 hover:shadow-lg text-white  text-xs md:text-sm px-3 py-2 rounded-full mr-2 hover:bg-green-700 flex focus:outline-none"
            >

                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                Agregar

            </button>

        </div>

    </td>

</tr>
