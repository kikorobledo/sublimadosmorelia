<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('storage/img/logo2.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Glider --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        @stack('styles')

        {{-- FlexSlider --}}
        <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        {{-- Jquery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- Glider --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.js" integrity="sha512-RidPlemZ+Xtdq62dXb81kYFycgFQJ71CKg+YbKw+deBWB0TLIqCraOn6k0CWDH2rGvE1a8ruqMB+4E4OLVJ7Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- SweetAlert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

        {{-- FlexSlider --}}
        <script src="{{ asset('vendor/flexslider/jquery.flexslider-min.js') }}"></script>

    </head>

    <body class="antialiased font-ibm">

        <x-jet-banner />

        <div class="min-h-screen bg-white">

            @livewire('navigation')

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>

        </div>

        <div class="uppercase text-center font-extralight text-lg py-2">
            <p>cualquier producto puede llevar cualquiera de nuestros diseños.</p>
        </div>

        <footer class="py-3  bg-black  static bottom-0 w-full tracking-wide">

            {{-- Mobile Footer --}}
            <div class="container md:hidden" x-data="{selected : null}">

                <div class="flex justify-center items-center  text-white mb-3">

                    <img class="h-10 mr-2" src="{{ asset('storage/img/logo.png') }}" alt="Logo">

                    <p class="font-thin text-xl">Sublimados Morelia</p>

                </div>

                <div @click="selected != 1 ? selected = 1 : selected = null" class="w full flex items-center border-t border-gray-700 py-4">

                    <p class="uppercase text-white text-sm font-thin tracking-widest mx-auto">Contacto</p>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" :class="selected == 1 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </div>

                <div
                    class="text-center mb-2 overflow-hidden max-h-0 transition-all duration-300"
                    x-ref="tab1"
                    :style="selected == 1 ? 'max-height: ' + $refs.tab1.scrollHeight + 'px;' :  ''"
                >

                    <p class="uppercase text-white text-xs tracking-widest mx-auto font-semibold">Email:</p>

                    <p class="lowercase text-white text-xs tracking-widest mx-auto font-semibold">graphics_morelia@outlook.com</p>

                </div>

                <div @click="selected != 2 ? selected = 2 : selected = null" class="w full flex items-center border-t border-gray-700 py-4">

                    <p class="uppercase text-white text-sm font-thin tracking-widest mx-auto">Información</p>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" :class="selected == 2 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </div>

                <div
                    class="text-center mb-2 overflow-hidden max-h-0 transition-all duration-300"
                    x-ref="tab2"
                    :style="selected == 2 ? 'max-height: ' + $refs.tab2.scrollHeight + 'px;' :  ''"
                >

                    <a href="{{ route('preguntas_frecuentes') }}" class="uppercase text-white text-xs tracking-widest mx-auto font-semibold">Preguntas Frecuentes</a>

                </div>

                <div @click="selected != 3 ? selected = 3 : selected = null" class="w full flex items-center border-t border-gray-700 py-4">

                    <p class="uppercase text-white text-sm font-thin tracking-widest mx-auto">Politicas y Privacidad</p>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-right" :class="selected == 3 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </div>

                <div
                    class="text-center mb-2 overflow-hidden max-h-0 transition-all duration-300 flex flex-col"
                    x-ref="tab3"
                    :style="selected == 3 ? 'max-height: ' + $refs.tab3.scrollHeight + 'px;' :  ''"
                >

                    <a class="uppercase text-white text-xs tracking-widest mx-auto font-semibold mb-3" href="{{ route('aviso_de_privacidad') }}">Aviso de privacidad</a>

                    <a class="uppercase text-white text-xs tracking-widest mx-auto font-semibold" href="{{ route('terminos_y_condiciones') }}">Terminos y condiciones de uso</a>

                </div>

                <div class="w full flex justify-center items-center border-t border-gray-700 ">

                    <div class="flex justify-center space-x-4 items-center py-3">

                        <a href="https://www.facebook.com/Sublimadosmorelia" >
                            <svg class="h-8 w-8 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px"  viewBox="0 0 50 50" style="null" >    <path d="M40,0H10C4.486,0,0,4.486,0,10v30c0,5.514,4.486,10,10,10h30c5.514,0,10-4.486,10-10V10C50,4.486,45.514,0,40,0z M39,17h-3 c-2.145,0-3,0.504-3,2v3h6l-1,6h-5v20h-7V28h-3v-6h3v-3c0-4.677,1.581-8,7-8c2.902,0,6,1,6,1V17z" fill="#ffffff"></path></svg>
                        </a>

                        <a href="https://www.instagram.com/sublimados_morelia/?hl=es">
                            <svg class="h-8 w-8" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                                    <path class="logo" id="XMLID_17_"  fill="#ffffff" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>
                                    <path id="XMLID_81_"  fill="#ffffff" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/>
                                    <circle id="XMLID_83_"  fill="#ffffff" cx="418.306" cy="134.072" r="34.149" x="0px" y="0px"/>
                            </svg>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=+5214431992866">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="#ffffff" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>

                    </div>

                </div>

                <div>
                    <p class="py-2 text-white font-thin text-center text-xs">© 2022 Sublimados Morelia. Todos los derechos reservados.</p>
                </div>

            </div>

            {{-- Fotter --}}
            <div class="container md:block hidden">

                <div class="flex -mx-2 text-white items-center mb-6">

                    <img class="h-12 mr-2" src="{{ asset('storage/img/logo.png') }}" alt="Logo">

                    <p class="font-thin text-xl">Sublimados Morelia</p>

                </div>

                <div class="grid grid-cols-3">

                    <div>

                        <p class="uppercase text-white text-sm font-thin tracking-widest mx-auto mb-3">Contacto</p>

                        <div class="mb-2 text-left">

                            <p class="capitalize text-white text-xs tracking-widest mx-auto ">Email:</p>

                            <p class="lowercase text-white text-xs tracking-widest mx-auto ">graphics_morelia@outlook.com</p>

                        </div>

                    </div>

                    <div>

                        <p class="uppercase text-white text-sm font-thin tracking-widest mx-auto mb-3">Información</p>

                        <div class="mb-2 text-left">

                            <a href="{{ route('preguntas_frecuentes') }}" class="uppercase text-white text-xs tracking-widest mx-auto">Preguntas Frecuentes</a>

                        </div>

                    </div>

                    <div>

                        <p class="uppercase text-white text-sm font-thin tracking-widest mx-auto mb-3">Politicas y Privacidad</p>

                        <div class="mb-2 flex flex-col text-left">

                            <a class="uppercase text-white text-xs tracking-widest mb-3" href="{{ route('aviso_de_privacidad') }}">Aviso de privacidad</a>

                            <a class="uppercase text-white text-xs tracking-widest" href="{{ route('terminos_y_condiciones') }}">Terminos y condiciones de uso</a>

                        </div>

                    </div>


                </div>

                <div class="flex flex-col text-center text-white ">

                    <div class="flex justify-center space-x-4 items-center py-3">

                        <a href="https://www.facebook.com/Sublimadosmorelia" >
                            <svg class="h-8 w-8 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px"  viewBox="0 0 50 50" style="null" >    <path d="M40,0H10C4.486,0,0,4.486,0,10v30c0,5.514,4.486,10,10,10h30c5.514,0,10-4.486,10-10V10C50,4.486,45.514,0,40,0z M39,17h-3 c-2.145,0-3,0.504-3,2v3h6l-1,6h-5v20h-7V28h-3v-6h3v-3c0-4.677,1.581-8,7-8c2.902,0,6,1,6,1V17z" fill="#ffffff"></path></svg>
                        </a>

                        <a href="https://www.instagram.com/sublimados_morelia/?hl=es">
                            <svg class="h-8 w-8" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                                    <path class="logo" id="XMLID_17_"  fill="#ffffff" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>
                                    <path id="XMLID_81_"  fill="#ffffff" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/>
                                    <circle id="XMLID_83_"  fill="#ffffff" cx="418.306" cy="134.072" r="34.149" x="0px" y="0px"/>
                            </svg>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=+5214431992866">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="#ffffff" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>

                    </div>

                </div>

                <div>
                    <p class="py-2 text-white font-thin dark:text-white sm:py-0 text-center">© 2022 Sublimados Morelia. Todos los derechos reservados.</p>
                </div>

            </div>

            </div>

        </footer>

        @stack('modals')

        @livewireScripts

        @stack('scripts')

        <script>

            window.addEventListener('glider', event=>{

                new Glider(document.querySelector('.glider-' + event.detail), {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                draggable: true,
                                dots: '.dots-' + event.detail,
                                responsive: [
                                        {
                                            breakpoint: 640,
                                            settings: {
                                                slidesToScroll: 2.5,
                                                slidesToShow: 2,
                                            }
                                        },
                                        {
                                            breakpoint: 768,
                                            settings: {
                                                slidesToScroll: 3.5,
                                                slidesToShow: 3,
                                            }
                                        },
                                        {
                                            breakpoint: 1024,
                                            settings: {
                                                slidesToScroll: 4.5,
                                                slidesToShow: 4,
                                            }
                                        },
                                        {
                                            breakpoint: 1280,
                                            settings: {
                                                slidesToScroll: 5.5,
                                                slidesToShow: 5,
                                            }
                                        }
                                    ]
                                });

            });

            /* SweetAlert */
            window.addEventListener('showMessage', event => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: event.detail[0],
                    title: event.detail[1]
                })
            })

        </script>

    </body>

</html>
