<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="grid  grid-cols-1 lg:grid-cols-2 gap-6">

                    <div class="bg-white rounded-lg shadow-xl p-6 ">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                            <div class="ml-4 flex-1">
                                <h2 class="text-lg font-semibold">Sea bienvenido al Sistema, estimad@ {{ auth()->user()->name }}</h2>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="text-sm hover:text-blue-500">Cerrar sesion</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6 flex justify-center items-center ">
                        <h2 class="text-xl font-semibold "> CANTV</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

   {{--  <x-container class="mb-5">
        <div>
            <h1>Número de usuarios en el sistema {{ $userz }}</h1>
        </div>
    </x-container> --}}


    <x-container class="mb-10">
        <h1 class="text-2xl font-bold text-gray-700 mb-2">
            Últimos cuartos registrados
        </h1>
        @if ($ultimosCuartos->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 card bg-gray-200 gap-6">

                @foreach ($ultimosCuartos as $cuarto)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <img src="{{ Storage::url($cuarto['photo_1']) }}"
                            class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0">
                        <div class="p-4">
                            <h1>Estado: {{ $cuarto->localidad->estado->name }}</h1>
                            <h1>Localidad: {{ $cuarto->localidad->name }}</h1>                            
                            <h1>Ubicación: {{ $cuarto->name }}</h1>
                            <h1>Status: {{ $cuarto->status }}</h1>

                            <div class="flex justify-end w-full">
                                <x-button class="w-full flex  justify-center items-end mt-2">
                                    <a href="{{ route('cuartos.show', $cuarto) }}">Ver detalles</a>
                                </x-button>
                            </div>
                        </div>
                    </article>
                @endforeach

                @if (count($ultimosCuartos) > 6)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <a href="{{ route('cuartos') }}">
                            <img src="/img/500px-Plus_symbol.svg.png"
                                class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0 mb-6">
                            <div class="pt-8 px-2 w-full flex justify-center items-end">
                                <x-button class="w-full flex  justify-center">
                                    <a href="{{ route('cuartos') }}">Ver todos</a>
                                </x-button>
                            </div>
                        </a>
                    </article>
                @endif

            </div>
        @else
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!!</span> Aun no hay cuartos registrados.
                </div>
            </div>
        @endif
    </x-container>

    <x-container class="mb-10">
        <h1 class="text-2xl font-bold text-gray-700 mb-2">
            Últimos circuitos registrados
        </h1>
        @if ($ultimosCircuitos->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 card bg-gray-200 gap-6">

                @foreach ($ultimosCircuitos as $circuito)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <img src="{{ Storage::url($circuito['image_path']) }}"
                            class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0">
                        <div class="p-4">
                            <h1>Localidad: {{ $circuito->cuarto->localidad->name }}</h1>
                            <h1>Ubicación: {{$circuito->cuarto->name}}</h1>
                            <h1>Descripción: {{$circuito->short_description}}</h1>
                            <h1>Tipo: {{$circuito->type}}</h1>
                            <h1>Nº del circuito: {{$circuito->circuito_num}}</h1>

                            <div class="flex justify-end w-full">
                                <x-button class="w-full flex  justify-center items-end mt-2">
                                    <a href="{{route('circuitos.show', $circuito)}}">Ver detalles</a>
                                </x-button>
                            </div>
                        </div>
                    </article>
                @endforeach

                @if (count($ultimosCircuitos) > 6)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <a href="{{ route('circuitos') }}">
                            <img src="/img/500px-Plus_symbol.svg.png"
                                class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0 mb-6">
                            <div class="pt-8 px-2 w-full flex justify-center items-end">
                                <x-button class="w-full flex  justify-center">
                                    <a href="{{ route('circuitos') }}">Ver todos</a>
                                </x-button>
                            </div>
                        </a>
                    </article>
                @endif



            </div>
        @else
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!!</span> Aun no hay circuitos registrados.
                </div>
            </div>
        @endif
    </x-container>

    <x-container class="mb-10">
        <h1 class="text-2xl font-bold text-gray-700 mb-2">
            Últimos equipos de red registrados
        </h1>
        @if ($ultimosRedequips->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 card bg-gray-200 gap-6">

                @foreach ($ultimosRedequips as $servred)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <img src="{{ Storage::url($servred['image_path']) }}"
                            class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0">

                        <div class="p-4">
                            <h1>Ubicación: {{$servred->cuarto->localidad->name}}</h1>                            
                            <h1>Ubicación: {{$servred->cuarto->name}}</h1>                            
                            <h1>Tipo: {{$servred->equip_type}}</h1>
                            <h1>Marca: {{$servred->equip_marca}}</h1>                            
                            <h1>Código de inventario: {{$servred->code_inv}}</h1>

                            <div class="pt-2 px-2 w-full flex justify-center items-end">
                                <x-button  class="w-full flex  justify-center items-end">
                                    <a href="{{route('servreds.show', $servred)}}">Ver detalles</a>
                                </x-button>
                            </div>
                        </div>
                    </article>
                @endforeach

                @if (count($ultimosRedequips) > 6)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <a href="{{ route('servreds') }}">
                            <img src="/img/500px-Plus_symbol.svg.png"
                                class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0 ">
                            <div class="pt-8 px-2 w-full flex justify-center items-end">
                                <x-button class="w-full flex  justify-center items-end mt-2">
                                    <a href="{{ route('servreds') }}">Ver todos</a>
                                </x-button>
                            </div>
                        </a>
                    </article>
                @endif

            </div>
        @else
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!!</span> Aun no hay equipos registrados.
                </div>
            </div>
        @endif
    </x-container>

</x-app-layout>
