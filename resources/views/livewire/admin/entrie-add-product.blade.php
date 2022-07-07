<tr class="text-sm font-medium text-gray-500 bg-white">
    <td class="px-3 py-3 p-3 text-gray-800 text-left ">

        {{ $product->name }}

    </td>
    <td class="p-3 text-gray-800 text-center">

        <input type="number" min="0" wire:model.defer="quantity" class="bg-white rounded-full text-sm w-20">
        <br>
        @error('quantity') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

    </td>
    <td class="p-3 text-gray-800 text-center">

        <input type="number" min="0" wire:model.defer="price" class="bg-white rounded-full text-sm w-20">
        <br>
        @error('price') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

    </td>
    <td class="p-3 text-gray-800 text-center ">
        <button
            wire:click="create"
            wire:loading.attr="disabled"
            wire:target="create"
            class="bg-green-400 hover:shadow-lg text-white text-xs md:text-sm px-3 py-2 rounded-full mr-2 hover:bg-green-700 flex focus:outline-none"
        >

            <svg xmlns="http://www.w3.org/2000/svg"  class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

        </button>
    </td>
</tr>
