<div class="z-10">

    <x-jet-dropdown width="80">

        <x-slot name="trigger">

            <span class="relative  cursor-pointer">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>

                {{-- <span class=" absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">12</span> --}}

                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>

            </span>

        </x-slot>

        <x-slot name="content">

            <div class="py-6 px-4">

                <p class="text-center text-black">No tiene agreado articulos en el carrito.</p>

            </div>

        </x-slot>

    </x-jet-dropdown>

</div>
