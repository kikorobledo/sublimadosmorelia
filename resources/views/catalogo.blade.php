<x-app-layout>

    <figure class="mb-5 hidden md:block">

        <img class="w-full h-80 object-cover object-center" src="{{ Storage::disk('images')->url($catalogoDesktop[0]->url) }}" alt="">

    </figure>

    <figure class="mb-5 md:hidden">

        <img class="w-full h-80 object-cover object-center" src="{{ Storage::disk('images')->url($catalogoMobile[0]->url) }}" alt="">

    </figure>

    <div class="container">

        <p class="text-2xl md:text-4xl uppercase font-bold mb-4 text-center" >Catálogo</p>

        @livewire('catalogo')

    </div>

</x-app-layout>
