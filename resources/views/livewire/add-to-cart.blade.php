<div>

    <p class=" text-2xl mb-5">${{ number_format($total, 2) }}</p>

    <p class="uppercase tracking-widest text-lg font-light mb-2">Cantidad</p>

    <div class="  flex items-center mb-4">

        <button class=" px-1 h-full"
            wire:click="changeQuantity(1)"
            wire:loading.attr="disabled"
            wire:target="changeQuantity(1)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
        </button>

        <input
             type="number"
             min="1"
             class="w-20 bg-white rounded-full text-sm focus:border-black focus:ring-0 cursor-pointer text-center"
             wire:model.lazy="quantity"
        >

        <button class=" px-1 h-full"
             wire:click="changeQuantity(2)"
             wire:loading.attr="disabled"
             wire:target="changeQuantity(2)"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>

    </div>

    @if ($design->product->colors->count())

        <p class="uppercase tracking-widest text-lg font-light mb-2">Color:</p>

        @error('color') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

        <select class="bg-white rounded-full text-sm w-full mb-5 focus:border-black focus:ring-0 cursor-pointer" wire:model="color">

            <option value="">Seleccione un color</option>

            @foreach ($design->product->colors as $color)

                <option value="{{ $color->name }}">{{ $color->name }}</option>

            @endforeach

        </select>

    @endif

    @if ($design->product->sizes->count())

        <p class="uppercase tracking-widest text-lg font-light mb-2">Tamaño:</p>

        @error('size') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror

        <select class="bg-white rounded-full text-sm w-full mb-5 focus:border-black focus:ring-0 cursor-pointer" wire:model="size">

            <option value="">Seleccione un tamaño</option>

            @foreach ($design->product->sizes as $size)

                <option value="{{ $size }}">{{ $size->name }}</option>

            @endforeach

        </select>

    @endif

    <button
        class="rounded-full bg-black hover:bg-white text-white hover:text-black tracking-widest border-2 transition-all border-black uppercase font-light w-full py-3 mb-5"
        wire:click="addCart"
        wire:loading.attr="disabled"
        wire:target="addCart"
    >
        Agregar al carrito
    </button>

</div>
