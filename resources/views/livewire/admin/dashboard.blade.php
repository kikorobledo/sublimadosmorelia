<div>

    <div class=" mb-10">

        <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 font-semibold mb-6  bg-white">Pedidos</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-6 gap-4">

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-blue-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-bold text-2xl text-blueGray-600 mb-2">

                        @php
                            $flag = 0;
                        @endphp

                        @foreach ($orders as $order)
                            @if($order->status === 'nueva')
                                {{ $order->count }}
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                        @endforeach

                        <p>{{ $flag ? '' : 0 }}</p>

                        @php
                            $flag = 0;
                        @endphp

                    </span>

                    <h5 class="text-blueGray-400 uppercase font-semibold text-center  tracking-widest md:tracking-normal">Nuevos</h5>

                </div>

                <a href="{{ route('admin.orders.index') . "?search=nueva" }}" class="mx-auto rounded-full border border-blue-600 py-1 px-4 text-blue-500 hover:bg-blue-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-green-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-bold text-2xl text-blueGray-600 mb-2">

                        @foreach ($orders as $order)
                            @if($order->status === 'aceptada')
                                {{ $order->count }}
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                        @endforeach

                        <p>{{ $flag ? '' : 0 }}</p>

                        @php
                            $flag = 0;
                        @endphp

                    </span>

                    <h5 class="text-blueGray-400 uppercase font-semibold text-center  tracking-widest md:tracking-normal">Aceptados</h5>

                </div>

                <a href="{{ route('admin.orders.index') . "?search=aceptada" }}" class="mx-auto rounded-full border border-green-600 py-1 px-4 text-green-500 hover:bg-green-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-indigo-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-bold text-2xl text-blueGray-600 mb-2">

                        @foreach ($orders as $order)
                            @if($order->status === 'pagada')
                                {{ $order->count }}
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                        @endforeach

                        <p>{{ $flag ? '' : 0 }}</p>

                        @php
                            $flag = 0;
                        @endphp

                    </span>

                    <h5 class="text-blueGray-400 uppercase font-semibold text-center  tracking-widest md:tracking-normal">Pagados</h5>

                </div>

                <a href="{{ route('admin.orders.index') . "?search=pagada" }}" class="mx-auto rounded-full border border-indigo-600 py-1 px-4 text-indigo-500 hover:bg-indigo-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-yellow-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-bold text-2xl text-blueGray-600 mb-2">

                        @foreach ($orders as $order)
                            @if($order->status === 'terminada')
                                {{ $order->count }}
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                        @endforeach

                        <p>{{ $flag ? '' : 0 }}</p>

                        @php
                            $flag = 0;
                        @endphp

                    </span>

                    <h5 class="text-blueGray-400 uppercase font-semibold text-center  tracking-widest md:tracking-normal">Terminados</h5>

                </div>

                <a href="{{ route('admin.orders.index') . "?search=terminada" }}" class="mx-auto rounded-full border border-yellow-600 py-1 px-4 text-yellow-500 hover:bg-yellow-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-gray-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-bold text-2xl text-blueGray-600 mb-2">

                        @foreach ($orders as $order)
                            @if($order->status === 'entregada')
                                {{ $order->count }}
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                        @endforeach

                        <p>{{ $flag ? '' : 0 }}</p>

                        @php
                            $flag = 0;
                        @endphp

                    </span>

                    <h5 class="text-blueGray-400 uppercase font-semibold text-center  tracking-widest md:tracking-normal">Entregados</h5>

                </div>

                <a href="{{ route('admin.orders.index') . "?search=entregada" }}" class="mx-auto rounded-full border border-gray-600 py-1 px-4 text-gray-500 hover:bg-gray-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

            <div class="flex md:block justify-evenly items-center space-x-2 border-t-4 border-red-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white text-center">

                <div class="  mb-2 items-center">

                    <span class="font-bold text-2xl text-blueGray-600 mb-2">

                        @foreach ($orders as $order)
                            @if($order->status === 'cancelada')
                                {{ $order->count }}
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                        @endforeach

                        <p>{{ $flag ? '' : 0 }}</p>

                        @php
                            $flag = 0;
                        @endphp

                    </span>

                    <h5 class="text-blueGray-400 uppercase font-semibold text-center  tracking-widest md:tracking-normal">Cancelados</h5>

                </div>

                <a href="{{ route('admin.orders.index') . "?search=cancelada" }}" class="mx-auto rounded-full border border-red-600 py-1 px-4 text-red-500 hover:bg-red-600 hover:text-white transition-all ease-in-out"> Ver solicitudes</a>

            </div>

        </div>

    </div>

    <div class="mb-10">

        <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 font-semibold mb-6 bg-white">Gráfica de entradas</h2>

        <div class="bg-white rounded-lg p-2 shadow-lg">

            <canvas id="entriesChart" style="width: 100%; height: 400px;"></canvas>

        </div>

    </div>

    <div class="mb-10">

        <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 font-semibold mb-6 bg-white">Estadisticas</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

            <div class=" border-t-4 border-red-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white">

                <div class="flex  mb-2 items-center">

                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">

                        <h5 class="text-blueGray-400 uppercase font-semibold   tracking-widest ">Total de entradas</h5>

                    </div>

                    <div class="relative w-auto  flex-initial overflow-hidden">

                        <div class="text-white  text-center inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-500">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </div>

                    </div>

                </div>

                <span class="font-bold text-3xl text-blueGray-600">

                    <span>
                    $ {{ number_format($totalEntries, 2) }}
                    </span>

                </span>

            </div>

            <div class=" border-t-4 border-blue-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white">

                <div class="flex  mb-2 items-center">

                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">

                        <h5 class="text-blueGray-400 uppercase font-semibold   tracking-widest ">Total de pedidos</h5>

                    </div>

                    <div class="relative w-auto  flex-initial overflow-hidden">

                        <div class="text-white  text-center inline-flex items-center justify-center w-12 h-12 rounded-full bg-blue-500">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </div>

                    </div>

                </div>

                <span class="font-bold text-2xl text-blueGray-600">

                    <span class="text-3xl">
                        $ {{ number_format($totalOrders, 2) }}
                    </span>

                </span>

            </div>

            <div class=" border-t-4 border-green-400 p-4 shadow-xl text-gray-600 rounded-xl bg-white">

                <div class="flex  mb-2 items-center">

                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">

                        <h5 class="text-blueGray-400 uppercase font-semibold   tracking-widest ">Ganancias</h5>

                    </div>

                    <div class="relative w-auto  flex-initial overflow-hidden">

                        <div class="text-white  text-center inline-flex items-center justify-center w-12 h-12 rounded-full bg-green-500">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </div>

                    </div>

                </div>

                <span class="font-bold text-3xl text-blueGray-600">

                    <span>
                        $ {{ number_format(($totalOrders - $totalEntries), 2) }}
                    </span>

                </span>

            </div>

        </div>

    </div>

    <div class="mb-10">

        <h2 class="text-2xl tracking-widest py-3 px-6 text-gray-600 rounded-xl border-b-2 border-gray-500 font-semibold mb-6 bg-white">Gráfica de ganancias</h2>

        <div class="bg-white rounded-lg p-2 shadow-lg">

            <canvas id="ordersChart" style="width: 100%; height: 400px;"></canvas>

        </div>

    </div>

    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            const colors = [
                ['#985F99', '#9684A1'],
                ['#595959', '#808F85'],
                ['#918868', '#CBD081'],
                ['#F7934C', '#CC5803'],
                ['#273043', '#9197AE'],
                ['#F02D3A', '#EFF6EE'],
                ['#000000', '#695B5C'],
                ['#4A5043', '#8AA1B1'],
                ['#A5B452', '#C8D96F'],
                ['#14591D', '#99AA38'],
                ['#003459', '#00A8E8'],
                ['#5C7457', '#C1BCAC'],
                ['#FF8360', '#E8E288'],
                ['#B96AC9', '#E980FC'],
                ['#63768D', '#8AC6D0'],
                ['#56445D', '#548687'],
                ['#8FBC94', '#C5E99B']
            ]

            const aux = {!! json_encode($data) !!}

            const aux3 = {!! json_encode($data2) !!}

            let dataArray = new Array();

            let dataArray2 = new Array();

            let aux2 = new Array();

            let aux4 = new Array();

            for(let key in aux){
                for (let key2 in aux[key]) {
                    aux2.push(aux[key][key2])
                }

                var color = colors[Math.floor(Math.random()*colors.length)]

                dataArray.push(
                    {
                        label: key,
                        data: aux2,
                        borderColor: color[0],
                        backgroundColor: color[1],
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    }
                )

                aux2 = new Array();
            }

            for(let key in aux3){
                for (let key2 in aux3[key]) {
                    aux4.push(aux3[key][key2])
                }

                var color = colors[Math.floor(Math.random()*colors.length)]

                dataArray2.push(
                    {
                        label: key,
                        data: aux4,
                        borderColor: color[0],
                        backgroundColor: color[1],
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    }
                )

                aux4 = new Array();
            }

            const labels=  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

            const data = {
                labels: labels,
                datasets:dataArray
            }

            const data2 = {
                labels: labels,
                datasets:dataArray2
            }

            const config = {
                type: 'line',
                data: data,
                options: {
                    locale:'es-MX',
                    responsive: true,
                    scales:{
                        y:{
                            ticks:{
                                callback:(value, index, values) => {
                                    return new Intl.NumberFormat('es-MX', {
                                        style: 'currency',
                                        currency: 'MXN',
                                    }).format(value);
                                }
                            },
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Gráfica de entradas'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context){
                                    return `${context.dataset.label}: $${context.formattedValue}`;
                                }
                            }
                        }
                    }
                },
            };

            const config2 = {
                type: 'line',
                data: data2,
                options: {
                    locale:'es-MX',
                    responsive: true,
                    scales:{
                        y:{
                            ticks:{
                                callback:(value, index, values) => {
                                    return new Intl.NumberFormat('es-MX', {
                                        style: 'currency',
                                        currency: 'MXN',
                                    }).format(value);
                                }
                            },
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Gráfica de ganancias'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context){
                                    return `${context.dataset.label}: $${context.formattedValue}`;
                                }
                            }
                        }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('entriesChart'),
                config
            );

            const myChart2 = new Chart(
                document.getElementById('ordersChart'),
                config2
            );

        </script>

    @endpush

</div>
