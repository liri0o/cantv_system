<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Cuartos',
        'route' => route('admin.cuartos.index'),
    ],
    [
        'name' => $cuarto->name,
    ],
]">

    <div class="card">
        <div class="grid md:grid-cols-2 gap-2">

            <div class="col-span-1 card bg-gray-300">
                <figure class="gap-10">
                    <img class="aspect-[3/2] w-full object-cover object-center border-2 mb-4 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ Storage::url($cuarto['photo_1']) }}" alt="">

                    <img class="aspect-[3/2] w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ Storage::url($cuarto['photo_2']) }}" alt="">
                </figure>

                <div class="text-sm">
                    {{ $cuarto->description }}
                </div>
            </div>

            <div class="col-span-1 card bg-gray-300">

                <div class="flex justify-center mb-4">
                    <h1 class=" text-xl text-bold">
                        Cuarto de Voz y Data: {{ $cuarto->name }}
                    </h1>
                </div>

                <h1 class="mb-2 text-semi-bold">
                    Localidad: {{ $cuarto->localidad->name }}
                </h1>

                <h2 class="mb-2 text-semi-bold">
                    Jefe del cuarto: {{ $cuarto->jefe }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Status del cuarto: {{ $cuarto->status }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Fecha de creación: {{ $cuarto->created_at }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Última modificación: {{ $cuarto->updated_at }}
                </h2>


                <h2 class="mb-2 text-semi-bold">
                    Cantidad de aparatos telefónicos disponibles en la FXB: {{ $cuarto->cant_tlf_dis_fxb }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Cantidad de aparatos telefónicos ocupados en la FXB: {{ $cuarto->cant_tlf_oc_fxb }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Cantidad de aparatos telefónicos totales en la FXB: {{ $cuarto->cant_tlf_total_fxb }}
                </h2>

                <h1 class="mb-2 text-semi-bold">
                    Circuitos del cuarto:
                </h1>

                @if (count($circuitos) > 0)
                    @foreach ($circuitos as $circuito)
                        <div class="card mb-2">
                            <h2 class="mb-2 ">Datos del circuito:</h2>
                            <h2 class="mb-1 text-semi-bold">
                                Tipo de circuito: {{ $circuito->type }}
                            </h2>
                            <h2 class=" text-semi-bold mb-2 ">
                                Número de circuito: {{ $circuito->circuito_num }}
                            </h2>
                            <div class="flex justify-end w-full">
                                <x-button>
                                    <a href="{{ route('admin.circuitos.show', $circuito) }}">Ver detalles</a>
                                </x-button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Info alert!!</span> Este cuarto no tiene ningún circuito
                            relacionado.
                        </div>
                    </div>
                @endif




                <h1 class="mb-2 text-semi-bold">
                    Equipos de red del cuarto:
                </h1>
                @if (count($servreds) > 0)
                    @foreach ($servreds as $servred)
                        <div class="card mb-2">
                            <h2 class="mb-2 ">Datos del equipo de red:</h2>
                            <h2 class="mb-1 text-semi-bold">
                                Tipo del equipo: {{ $servred->equip_type }}
                            </h2>
                            <h2 class=" text-semi-bold mb-2">
                                Serial del equipo: {{ $servred->equip_serial }}
                            </h2>
                            <div class="flex justify-end w-full">
                                <x-button>
                                    <a href="{{ route('admin.servreds.show', $servred) }}">Ver detalles</a>
                                </x-button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Info alert!!</span> Este cuarto no tiene ningún equipo de red
                            relacionado.
                        </div>
                    </div>

                @endif

                <h1 class="mb-2 text-semi-bold">
                    Necesidades del cuarto:
                </h1>

                @if (count($necesidads) > 0)                   
               
                @foreach ($necesidads as $necesidad)
                    <div class="card mb-2">
                        <h2 class="mb-2 ">Necesidad del cuarto {{ $necesidad->cuarto->name }}</h2>
                        <div class="flex justify-end w-full">
                            <x-button>
                                <a href="{{ route('admin.necesidads.show', $necesidad) }}">Ver detalles</a>
                            </x-button>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Info alert!!</span> Este cuarto no tiene ninguna necesidad
                        relacionada.
                    </div>
                </div>
                @endif

            </div>
            <div class="col-span"></div>
            <div class="col-span-1 w-full flex justify-end ">
                <x-button><a href="{{ route('admin.cuartos.index') }}"> Volver </a></x-button>
            </div>
        </div>
    </div>


</x-admin-layout>
