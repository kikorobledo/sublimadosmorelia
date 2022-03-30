<div class="">

    <div class="flex justify-end mb-2">

        <input type="text" wire:model.defer="code" class="bg-white rounded-l-full focus:border-black focus:ring-0 text-xs w-1/2 md:w-auto" placeholder="CUPÓN">

        <button
            class="rounded-r-full bg-black hover:bg-white text-white hover:text-black tracking-widest px-2 border-2 transition-all border-black uppercase font-light w-1/2 md:w-1/6 text-xs"
            wire:click="applyCupon"
            wire:loading.attr="disabled"
            wire:target="applyCupon"
        >Aplicar</button>

    </div>

    <div class="flex justify-between">

        @if ($order && $order->cupons->count())

            <p>Cupones:</p>

        @endif

        <p class="text-red-500 ml-auto">{{ $message }}</p>

    </div>

    <div class="flex space-x-3">

        @if($order)

            @foreach ($order->cupons as $cupon)

                <span class="rounded-full px-2 bg-black  text-white text-sm flex">

                    <p class="mr-2">{{ $cupon->code }}</p>

                    <button class="text-xs"
                        wire:click="removeCupon({{ $cupon->id }})"
                        wire:loading.attr="disabled"
                        wire:target="removeCupon({{ $cupon->id }})"
                    >
                        X
                    </button>

                </span>

            @endforeach

        @endif

    </div>

</div>
