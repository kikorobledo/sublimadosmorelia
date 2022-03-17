<x-app-layout>

    <div class=" glider-contain pb-4">

        <div class="glider">

          <div class="bg-black "><img class="w-full h-96 object-cover object-center opacity-100" src="{{ asset('storage/img/bg.jpg') }}" alt=""></div>
          <div class="bg-black "><img class="w-full h-96 object-cover object-center opacity-100" src="{{ asset('storage/img/bg2.jpg') }}" alt=""></div>
          <div class="bg-black "><img class="w-full h-96 object-cover object-center opacity-100" src="{{ asset('storage/img/bg3.jpg') }}" alt=""></div>


        </div>

        <div role="tablist" class="dots" id="dots"></div>

    </div>

    <div class="container flex" x-data="{ show: true }">

        <aside class="w-1/5 border-t border-gray-300 overflow-y-auto h-menu px-4 py-6">

            <div
                class="flex justify-between items-center cursor-pointer mb-4"
                @click="show = !show"
            >

                <p class="text-xl">Diseños</p>

                <span class="">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="{'hidden' : show}"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="{'hidden' : !show}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                      </svg>

                </span>

            </div>

            <ul

                class="space-y-2"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
            >

                @foreach ($categoriesDesign as $categoryDesing)

                    <li class="capitalize px-2 cursor-pointer font-semibold">{{ $categoryDesing->name }}</li>

                    @foreach($categoryDesing->subcategories as $subcategoryDesign)

                        <li class="capitalize px-4 cursor-pointer">{{ $subcategoryDesign->name }}</li>

                    @endforeach

                @endforeach

            </ul>

        </aside>

        <div class="w-4/5 border border-green-400">

        </div>

    </div>

    <script>

            var slider = new Glider(document.querySelector('.glider'), {
                rewind:true,
                hoverpause:true,
                slidesToScroll: 1,
                slidesToShow: 1,
                dots: '#dots',
                draggable: true,
                autoplay: true
            });

            slideAutoPaly(slider, '.glider');

            function slideAutoPaly(glider, selector, delay = 5000, repeat = true) {
                let autoplay = null;
                const slidesCount = glider.track.childElementCount;
                let nextIndex = 1;
                let pause = true;

                function slide() {
                    autoplay = setInterval(() => {
                        if (nextIndex >= slidesCount) {
                            if (!repeat) {
                                clearInterval(autoplay);
                            } else {
                                nextIndex = 0;
                            }
                        }
                        glider.scrollItem(nextIndex++);
                    }, delay);
                }

                slide();

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
                }, 300);
            }

    </script>

</x-app-layout>
