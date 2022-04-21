<header class="bg-black sticky top-0 z-10" x-data="{ show: true }" @click.away="show = true">

    {{-- Sidebar --}}
    <div class="bg-white min-h-screen overflow-y-auto w-1/8 absolute space-y-4 px-6 inset-y-0 left-0 transform -translate-x-full duration-500 ease-in-out sidebar z-50 shadow-2xl" :class="{'-translate-x-full': show}">

        <div class="flex items-center justify-center space-x-6  border-b border-gray-300 py-4">

            <img class="h-10 w-auto" src="{{ asset('storage/img/logo2.png') }}" alt="Logo">

            <p class="text-xl ">Sublimados Morelia</p>

            <span class="cursor-pointer font-semibold text-gray-400" @click="show = true">X</span>

        </div>

        <nav
            class=""
            x-show="!show"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 transform scale-50"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-1000"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-50"
        >

            <ul class="mt-5  text-xl uppercase font-light text-center space-y-2">

                <li class="border-t border-gray-300 hover:bg-gray-100 rounded-full transition duration-200">

                    <a href="{{ route('catalogo') }}" class="block w-full py-4">Catálogo</a>

                </li>

                @foreach ($categories as $category)

                    <li class="border-t border-gray-300 hover:bg-gray-100 rounded-full transition duration-200">

                        <a href="{{ route('categories.show', $category->slug ) }}" class="block w-full py-4">{{ $category->name }}</a>

                    </li>

                @endforeach

            </ul>

        </nav>

        <div class="flex justify-center space-x-4 items-center py-3">

            <a href="https://www.facebook.com/Sublimadosmorelia" class="">
                <svg class="h-10 w-10 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px"  viewBox="0 0 50 50" style="null" >    <path d="M40,0H10C4.486,0,0,4.486,0,10v30c0,5.514,4.486,10,10,10h30c5.514,0,10-4.486,10-10V10C50,4.486,45.514,0,40,0z M39,17h-3 c-2.145,0-3,0.504-3,2v3h6l-1,6h-5v20h-7V28h-3v-6h3v-3c0-4.677,1.581-8,7-8c2.902,0,6,1,6,1V17z" fill="#4267B2"></path></svg>
            </a>

            <a href="https://www.instagram.com/sublimados_morelia/?hl=es">
                <svg class="h-10 w-10" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                        <path class="logo" id="XMLID_17_" fill="#FD1D1D" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>

                        <path id="XMLID_81_" fill="#FD1D1D" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/>

                        <circle id="XMLID_83_" fill="#E1306C" cx="418.306" cy="134.072" r="34.149" x="0px" y="0px"/>

                </svg>
            </a>

            <a href="https://api.whatsapp.com/send?phone=+5214431992866">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="#128c7e" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            </a>

        </div>

    </div>

    {{-- Search component --}}
    @livewire('search')

    <div class="container text-white flex justify-between items-center h-16">

        {{-- Categories link --}}
        <a @click="show = !show"  class="h-full flex flex-col items-center cursor-pointer justify-center px-4">

            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path  class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6h16M4 12h16M4 18h16" />
                {{-- <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /> --}}
            </svg>

            <span class="font-extralight text-sm">Categorías</span>

        </a>

        {{-- Logo --}}
        <a href="/">

            <img class="h-12 w-auto" src="{{ asset('storage/img/logo.png') }}" alt="Logo">

        </a>

        {{-- Right links --}}
        <div class="flex justify-between space-x-4 mr-1">

            {{-- Search --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7 cursor-pointer"
                fill="none" viewBox="0 0 24 24"
                stroke="currentColor"
                x-data
                @click="Livewire.emitTo('search', 'open')"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>

            {{-- Account dropdown --}}
            <x-jet-dropdown align="right" width="48">

                <x-slot name="trigger">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>

                </x-slot>

                <x-slot name="content">

                    @auth

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('user_orders') }}">
                            Mis Pedidos
                        </x-jet-dropdown-link>

                        @if(auth()->user()->role == 'admin')

                            <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                Administración
                            </x-jet-dropdown-link>

                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>

                    @else

                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                    @endauth

                </x-slot>

            </x-jet-dropdown>

            {{-- Cart dropdown --}}
            @livewire('dropdown-cart')

        </div>

    </div>

</header>
