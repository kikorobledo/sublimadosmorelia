<x-app-layout>

    <div class="my-5 p-4 bg-white md:shadow-xl md:w-3/4  mx-auto rounded-lg">

        <h1 class=" text-center font-bold uppercase md:text-3xl md:font-light md:capitalize mb-2 md:mb-10 tracking-widest">Preguntas Frecuentes</h1>

        <div class="w-full" x-data="{selected : null}">

            <div @click="selected != 1 ? selected = 1 : selected = null">

                <h2 class="text-2xl tracking-widest px-6 py-3 font-light rounded-xl border-b-2 border-black cursor-pointer">

                    ¿Como hacer un pedido?

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 float-right" :class="selected == 1 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </h2>

            </div>

            <div
                class="my-5 overflow-hidden max-h-0 transition-all duration-500"
                x-ref="tab1"
                :style="selected == 1 ? 'max-height: ' + $refs.tab1.scrollHeight + 'px;' :  ''"
            >

                <div class="md:flex md:space-x-6">

                    <div class="my-3">
                        <span class="bg-black text-white rounded-full py-1 px-3 text-2xl font-light ">1</span>
                    </div>

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            Selecciona los productos que deseas pedir, puedes revisarlos por categorías en el botón superior izquierdo. Al hacer click
                            en el botón "AGREGAR AL CARRITO", el carrito se actualizara agregando los productos.
                        </p>

                        <img src="{{ asset('storage/img/preguntas_frecuentes/paso1.jpg') }}" alt="Paso 1">

                    </div>

                </div>

                <div class="md:flex md:space-x-6 ">

                    <div class="mb-3">
                        <span class="bg-black text-white rounded-full py-1 px-3 text-2xl font-light">2</span>
                    </div>

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            Cuando termines de seleccionar los productos que quieres ve al carrito. En el puedes cambiar la cantidad de los productos, eliminarlos del carrito, agregar
                            un comentario a tu pedido también puedes agregar cupones. Al dar click en "GENERAR PEDIDO", su pedido se registrará redireccionando al área Mis Pedidos.
                        </p>

                        <img src="{{ asset('storage/img/preguntas_frecuentes/paso2.jpg') }}" alt="Paso 2">

                    </div>

                </div>

                <div class="md:flex md:space-x-6 ">

                    <div class="mb-3">
                        <span class="bg-black text-white rounded-full py-1 px-3 text-2xl font-light">3</span>
                    </div>

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            Para comenzar a hacer los pedidos es necesario su anticipo del 50% del total, puede llevarlo a Jesus Romero Flores #457 Col. Felicitas del Rio ó hacer una
                            transferencia, puede hacer click en el botón "Enviar aviso por whatsapp" para pedir información necesaria. Una vez que se ha aceptado y terminado su pedido
                            puede recogerlo en la dirección mencionada anteriormente  apartir de los siguientes 3 días habiles en un horario de Lunes a Viernes de 6 pm a 9 pm.
                        </p>

                    </div>

                </div>

            </div>

            <div @click="selected != 2 ? selected = 2 : selected = null">

                <h2 class="text-2xl tracking-widest px-6 py-3 font-light rounded-xl border-b-2 border-black cursor-pointer">

                    ¿Donde recoger mi pedido?

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 float-right" :class="selected == 2 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </h2>

            </div>

            <div
                class="my-5 overflow-hidden max-h-0 transition-all duration-500"
                x-ref="tab2"
                :style="selected == 2 ? 'max-height: ' + $refs.tab2.scrollHeight + 'px;' :  ''"
            >

                <div class="md:flex md:space-x-6">

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            En la sección de Mis Pedidos puedes ver es estado de tu pedido, si tu pedido esta en la sección "Terminados" puedes pasar a recogerlo a la dirección
                            Jesus Romero Flores 457 Col. Felicitas del Rio en el horario de Lunes a Viernes de 6pm a 9pm.
                        </p>

                        <div class="">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.5592321958575!2d-101.20057128526012!3d19.68880128673936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842d0dd7aa9bda8d%3A0x3ab51b5220fc76e3!2sJes%C3%BAs%20Romero%20Flores%20457%2C%20Fel%C3%ADcitas%20del%20R%C3%ADo%2C%2058040%20Morelia%2C%20Mich.!5e0!3m2!1sen!2smx!4v1659991945279!5m2!1sen!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>

                    </div>

                </div>

            </div>

            <div @click="selected != 3 ? selected = 3 : selected = null">

                <h2 class="text-2xl tracking-widest px-6 py-3 font-light rounded-xl border-b-2 border-black cursor-pointer">

                    ¿Puedo dar yo el material?

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 float-right" :class="selected == 3 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </h2>

            </div>

            <div
                class="my-5 overflow-hidden max-h-0 transition-all duration-500"
                x-ref="tab3"
                :style="selected == 3 ? 'max-height: ' + $refs.tab3.scrollHeight + 'px;' :  ''"
            >

                <div class="md:flex md:space-x-6">

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            Si, para los productos sublimables debe ser material especial para sublimación, en el caso de los textiles unicamente se puede sublimar en poliester con colores claros.
                            Para los textiles de color (DTF) puede ser sobre cualquier tipo de tela. El descuento del precio es dependiendo del producto.
                        </p>

                    </div>

                </div>

            </div>

            <div @click="selected != 5 ? selected = 5 : selected = null">

                <h2 class="text-2xl tracking-widest px-6 py-3 font-light rounded-xl border-b-2 border-black cursor-pointer">

                    ¿Puedo dar yo el diseño?

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 float-right" :class="selected == 5 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </h2>

            </div>

            <div
                class="my-5 overflow-hidden max-h-0 transition-all duration-500"
                x-ref="tab5"
                :style="selected == 5 ? 'max-height: ' + $refs.tab5.scrollHeight + 'px;' :  ''"
            >

                <div class="md:flex md:space-x-6">

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            Si, los productos pueden llevar cualquier diseño, debe proporcionarlo en formato PDF al tamaño necesario.
                        </p>

                    </div>

                </div>

            </div>

            <div @click="selected != 4 ? selected = 4 : selected = null">

                <h2 class="text-2xl tracking-widest px-6 py-3 font-light rounded-xl border-b-2 border-black cursor-pointer">

                    ¿Que diferencia hay entre sublimación y DTF?

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 float-right" :class="selected == 4 ? 'transform rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                    </svg>

                </h2>

            </div>

            <div
                class="my-5 overflow-hidden max-h-0 transition-all duration-500"
                x-ref="tab4"
                :style="selected == 4 ? 'max-height: ' + $refs.tab4.scrollHeight + 'px;' :  ''"
            >

                <div class="md:flex md:space-x-6">

                    <div class="mb-5">

                        <p class="font-light text-lg mb-3">
                            En la sublimación sobre telas, la tinta se integra totalmente a los hilos del tejido, es decir pasa a formar parte del mismo tejido, por eso es tan duradera y proporciona colores tan vivos y nítidos, dando a la playera y a su diseño una apariencia verdaderamente atractiva.
                            Otra ventaja de la sublimación es que la tinta, al ser literalmente fusionada con la tela, no deja ningún rastro o sensación al tacto tal como sucede con el bordado, la serigrafía, el vinil textil o el transfer. Esto hace que la comodidad original de la playera se mantenga y la experiencia de uso sea más satisfactoria.
                            DTF viene de las siglas en inglés Direct Transfer to Film, o lo que es lo mismo, impresión directa sobre film para crear una especie de transfer digital que se puede aplicar sobre camisetas de algodón, poliéster y mezcla de cualquier color ya que incorpora tinta blanca.
                        </p>

                    </div>

                </div>

            </div>


        </div>



    </div>

</x-app-layout>
