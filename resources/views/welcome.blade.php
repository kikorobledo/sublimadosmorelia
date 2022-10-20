<x-app-layout>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v13.0&appId=1009774999918061&autoLogAppEvents=1" nonce="OvKjACLI"></script>

    {{-- GliderJs --}}
    <div class="glider-wrap hidden md:block">

        <div class=" glider-contain relative w-full">

            <div class="glider h-menu">

                @foreach ($encabezadoDesktop as $image)

                    <div class="bg-black"><img class="w-full object-cover object-center " src="{{ Storage::disk('images')->url($image->url) }}" alt=""></div>

                @endforeach

            </div>

            <div class="w-full absolute text-center top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2  hero-text" >

                {{-- <p class=" md:text-6xl text-white uppercase font-bold md:mb-4">Has regalos para</p>
                <p class="md:text-4xl text-white uppercase md:mb-6">tus fiestas</p> --}}
                <a href="{{ route('catalogo') }}" class="border border-gray-400 rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest text-xl ">catálogo</a>

            </div>

            <div class="w-full absolute text-center top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden hero-text" >

                {{-- <p class="md:text-6xl text-white uppercase font-bold md:mb-4">Personaliza tu regalo</p>
                <p class="md:text-4xl text-white uppercase md:mb-6">ponle tu foto favorita</p> --}}
                <a href="{{ route('catalogo') }}" class="border border-gray-400  rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest text-xl ">catálogo</a>

            </div>

            <div class="w-full absolute text-center top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden hero-text" >

                {{-- <p class="md:text-6xl text-white uppercase font-bold md:mb-4">Haz un regalo memorable</p>
                <p class="md:text-4xl text-white uppercase md:mb-6">a esa persona especial</p> --}}
                <a href="{{ route('catalogo') }}" class="border border-gray-400  rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest text-xl ">catálogo</a>

            </div>

            <div class="border border-white mx-auto rounded-full md:absolute md:bottom-10 md:left-1/2 md:transform md:-translate-x-1/2 bg-white bg-opacity-20 ">

                <div role="tablist"  id="dots"></div>

            </div>

        </div>

    </div>

    <div class="glider-wrap md:hidden">

        <div class=" glider-contain relative w-full">

            <div class="glider2">

                @foreach ($encabezadoMobile as $image)

                    <div class="bg-black"><img class="w-full h-full object-cover object-center" src="{{ Storage::disk('images')->url($image->url) }}" alt=""></div>

                @endforeach

            </div>

            <div class="w-full absolute text-center top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2  hero-text2" >

               {{--  <p class=" md:text-6xl text-white uppercase font-bold md:mb-4">Compra 2 y llevate 3</p>
                <p class="md:text-4xl text-white uppercase md:mb-6">playeras</p> --}}
                <a href="{{ route('catalogo') }}" class="border border-gray-400 rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest">catálogo</a>

            </div>

            <div class="w-full absolute text-center top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden hero-text2" >

               {{--  <p class="md:text-6xl text-white uppercase font-bold md:mb-4">Personaliza tu regalo</p>
                <p class="md:text-4xl text-white uppercase md:mb-6">ponle tu foto favorita</p> --}}
                <a href="{{ route('catalogo') }}" class="border border-gray-400  rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest">catálogo</a>

            </div>

            <div class="w-full absolute text-center top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden hero-text2" >

                {{-- <p class="md:text-6xl text-white uppercase font-bold md:mb-4">Haz un regalo memorable</p>
                <p class="md:text-4xl text-white uppercase md:mb-6">a esa persona especial</p> --}}
                <a href="{{ route('catalogo') }}" class="border border-gray-400  rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest">catálogo</a>

            </div>

            <div class="border border-white mx-auto rounded-full md:absolute md:bottom-10 md:left-1/2 md:transform md:-translate-x-1/2 bg-white bg-opacity-20 ">

                <div role="tablist"  id="dots2"></div>

            </div>

        </div>

    </div>

    {{-- Latest Designs --}}
    <div class="container md:mt-8 px-2 mb-8">

        <div class="text-center tracking-widest mb-4">

            <p class="text-2xl md:text-4xl uppercase font-bold mb-4">Los mas nuevos</p>

            <a href="{{ route('catalogo') }}" class="border border-gray-300  rounded-full text-black uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out">Ver todos</a>

        </div>

        @livewire('glider', ['designs' => $latestDesigns], key('latest'))

    </div>

    {{-- Promo --}}
    <div class="relative mb-8">

        <div class="bg-black hidden md:block"><img class="w-full h-96 object-cover object-center opacity-60" src="{{ Storage::disk('images')->url($banner1Desktop[0]['url']) }}" alt=""></div>

        <div class="bg-black md:hidden"><img class="w-full h-40 object-cover object-center opacity-60" src="{{ Storage::disk('images')->url($banner1Mobile[0]['url']) }}" alt=""></div>

        <div class="w-full absolute text-center top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" >

            <p class=" md:text-5xl text-white uppercase font-bold md:mb-4">Personaliza cualquier producto</p>
            <p class="md:text-4xl text-white uppercase md:mb-6">con tu diseño o foto</p>
            <a href="{{ route('catalogo') }}" class="border border-gray-400 rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest text-xs md:text-base">catálogo</a>

        </div>

    </div>

    {{-- Video --}}
    <div class="mb-8 container flex flex-col md:flex-row  items-center">

        <div class="text-center mb-4">

            <p class="text-2xl font-bold uppercase md:text-5xl md:font-light md:capitalize mb-2 md:mb-5">Tazas mágicas</p>

            <p class="text-xl md:text-3xl capitalize font-extralight mb-5 md:ml-5">personalizalas con lo que mas te guste</p>

            <a href="{{ route('categories.show', 'ceramica' . '?product=Taza+mágica')  }}" class="mx-auto border border-gray-300 rounded-full text-black uppercase font-light px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out">catálogo</a>

        </div>

        <div class="fb-video mx-auto" data-href="https://www.facebook.com/Sublimadosmorelia/videos/407845304686592/" data-allowfullscreen="false" data-width="350" data-show-text="false"></div>

    </div>

    {{-- Latest Designs Textil --}}
    <div class="container md:mt-8 px-2 mb-8">

        <div class="text-center tracking-widest mb-4">

            <p class="text-2xl md:text-4xl uppercase font-bold mb-4">Textiles</p>

            <a href="{{ route('categories.show', 'textiles') }}" class="border border-gray-300  rounded-full text-black uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out">Ver todos</a>

        </div>

        @livewire('glider', ['designs' => $latestDesignsTextil], key('textiles'))

    </div>

    {{-- Printing --}}
    <div class="relative mb-8">

        <div class="bg-black hidden md:block"><img class="w-full h-96 object-cover object-center opacity-60" src="{{ Storage::disk('images')->url($banner2Desktop[0]['url']) }}" alt=""></div>

        <div class="bg-black md:hidden"><img class="w-full h-40 object-cover object-center opacity-60" src="{{ Storage::disk('images')->url($banner2Mobile[0]['url']) }}" alt=""></div>

        <div class="w-full absolute text-center top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" >

            <p class="md:text-5xl text-white uppercase font-bold md:mb-4">Servicio de impresión</p>

            <p class="md:text-3xl text-white uppercase md:mb-6">Volantes - Lonas - Tarjetas de presentación</p>

            <a href="{{ route('categories.show', 'impresiones') }}" class="border border-gray-400 rounded-full bg-black text-white uppercase font-bold px-4 py-1 md:py-2 tracking-widest text-xs md:text-base">catálogo</a>

        </div>

    </div>

    {{-- Video --}}
    <div class="mb-8 container px-2">

        <div class="text-center mb-8">

            <p class="text-2xl uppercase md:text-4xl font-bold mb-5 md:ml-5 md:tracking-widest">Recuerdos para cualquier tipo de evento</p>

        </div>

        <div class="glider-wrap">

            <div class=" glider-contain relative w-full">

                <div class="glider3 h-96 md:h-auto sm:auto">

                    @foreach ($videos as $video)

                        <div class="flex flex-col">

                            <div class="fb-video mx-auto" data-href="{{ $video->url }}" data-width="450" data-show-text="false" data-allowfullscreen="false"></div>

                            <a href="{{ route('search'). "?name=" . $video->name }}" class="tracking-widest py-1 mt-2 mx-auto border border-gray-300  rounded-full text-black uppercase font-light text-sm px-2 hover:border-black transition duration-500 ease-in-out">{{ $video->name }}&nbsp;</a>

                        </div>

                    @endforeach

                </div>

                <div role="tablist"  id="dots3"></div>

            </div>

        </div>

    </div>

    {{-- Latest Designs Metals --}}
    <div class="container px-2 mb-8">

        <div class="text-center tracking-widest mb-4">

            <p class="text-2xl md:text-4xl uppercase font-bold mb-4">Latas metalicas</p>

            <a href="{{ route('categories.show', 'aceros') }}" class="border border-gray-300  rounded-full text-black uppercase font-light  px-4 py-1 md:py-2 hover:border-black transition duration-500 ease-in-out">Ver todos</a>

        </div>

        @livewire('glider', ['designs' => $metalDesigns], key('metals'))

    </div>

    @push('scripts')

    <script>

        var slider = new Glider(document.querySelector('.glider'), {
                                    rewind:true,
                                    slidesToScroll: 1,
                                    slidesToShow: 1,
                                    dots: '#dots',
                                    autoplay: true
                                });

        var slider2 = new Glider(document.querySelector('.glider2'), {
                                    rewind:true,
                                    slidesToScroll: 1,
                                    slidesToShow: 1,
                                    dots: '#dots2',
                                    autoplay: true
                                });

        new Glider(document.querySelector('.glider3'), {
                            rewind:true,
                            slidesToScroll: 1,
                            slidesToShow: 1,
                            dots: '#dots3',
                            autoplay: false,
                            draggable: true,
                            responsive: [
                                            {
                                                breakpoint: 640,
                                                settings: {
                                                    slidesToScroll: 2.5,
                                                    slidesToShow: 1,
                                                }
                                            },
                                            {
                                                breakpoint: 768,
                                                settings: {
                                                    slidesToScroll: 3.5,
                                                    slidesToShow: 1,
                                                }
                                            },
                                            {
                                                breakpoint: 1024,
                                                settings: {
                                                    slidesToScroll: 4.5,
                                                    slidesToShow: 1,
                                                }
                                            },
                                            {
                                                breakpoint: 1280,
                                                settings: {
                                                    slidesToScroll: 5.5,
                                                    slidesToShow: 2,
                                                }
                                            }
                                        ]
                            });

        slideAutoPaly(slider, '.glider', '.hero-text');

        slideAutoPaly(slider2, '.glider2', '.hero-text2');

        function slideAutoPaly(glider, selector, text, delay = 5000, repeat = true) {
            let autoplay = null;
            const slidesCount = glider.track.childElementCount;
            let nextIndex = 1;
            let pause = true;
            const heroTexts = document.querySelectorAll(text);
            const dots = document.querySelectorAll('.glider-dot');

            function slide() {

                for (let index = 0; index < dots.length; index++) {

                    dots[index].addEventListener("click", function(){

                        heroTexts.forEach(element => {
                            element.classList.add("hidden");
                        });

                        heroTexts[dots[index].getAttribute('data-index')].classList.toggle("hidden");
                    });

                }

                autoplay = setInterval(() => {

                    heroTexts.forEach(element => {
                        element.classList.add("hidden");
                    });

                    if (nextIndex >= slidesCount) {
                        if (!repeat) {
                            clearInterval(autoplay);
                        } else {
                            nextIndex = 0;
                        }
                    }

                    glider.scrollItem(nextIndex++);

                    heroTexts[nextIndex - 1].classList.toggle("hidden");

                }, delay);

            }

            slide();/*

            var element = document.querySelector(selector);
            element.addEventListener('mouseover', (event) => {
                if (pause) {
                    clearInterval(autoplay);
                    pause = false;
                }
            }, 300);

            element.addEventListener('mouseout', (event) => {
                if (!pause) {
                    slide();
                    pause = true;
                }
            }, 300); */

        }

    </script>

    @endpush

</x-app-layout>
