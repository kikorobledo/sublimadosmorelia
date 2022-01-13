<div class="absolute border-b w-full bg-white h-16 {{ $show ? '' : 'hidden'}} z-20">

    <div class="container space-y-4 flex items-center flex-col px-4 " x-data @click.away="$wire.show = false">

        <div class="flex items-center justify-between space-x-4 text-black w-full mt-3">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>

            <input wire:model="search" type="text" class="border-none mr-auto w-full rounded-lg outline-none focus:ring-1 focus:ring-black inline-block" autofocus placeholder="Buscar..">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" wire:click="$set('show', false)">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>

        </div>

        @if($search)

            <div class="w-full bg-white border shadow-2xl overflow-y-auto h-menu">

                @forelse ($designs as $design)

                    <div class="flex px-4 py-3 items-center space-x-6 hover:bg-gray-100">

                        <img src="{{ asset('storage/img/logo.png') }}" class="w-20 object-cover" alt="Imagen del designo">

                        <p>{{ $design->name }}</p>

                    </div>

                @empty

                    <p class="uppercase text-center font-light text-2xl py-6 px-4">No hay resultados para la busqueda</p>

                @endforelse

            </div>

        @endif

    </div>

</div>
