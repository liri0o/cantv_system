<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Circuitos',
        'route' => route('admin.circuitos.index'),
    ],
    [
        'name' => $circuito->type,
    ],
]">


    <div class="card">

        <div class="grid md:grid-cols-2 gap-6">

            <div class="col-span-1 card bg-gray-300">
                <figure class="mb-2">
                    <img class="w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ Storage::url($circuito['image_path']) }}" alt="">
                </figure>

                <div class="text-sm">
                    {{ $circuito->short_description }}
                </div>
            </div>


            <div class="col-span-1 card bg-gray-300">

                <div class="flex justify-center mb-4">
                    <h1 class="text-bold">
                        Circuito {{ $circuito->type }}
                    </h1>
                </div>

                <h2 class="mb-2 text-semi-bold">
                    Cuarto de Voz y Data: {{ $circuito->cuarto->name }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Localidad: {{ $circuito->cuarto->localidad->name }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Fecha de creación: {{ $circuito->created_at }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Última modificación: {{ $circuito->updated_at }}
                </h2>

                <h1 class="mb-2 text-semi-bold">
                    Tipo {{ $circuito->type }}
                </h1>

                <h1 class="mb-2 text-semi-bold">
                    Número de circuito: {{ $circuito->circuito_num }}
                </h1>
                <h1 class="mb-2 text-semi-bold">
                    IP WAN: {{ $circuito->ipwan }}
                </h1>
                <h1 class="mb-2 text-semi-bold">
                    BLOQUE IP LAN : {{ $circuito->iplan_bloq }}
                </h1>
                <h1 class="mb-2 text-semi-bold">
                    IP Switch: {{ $circuito->ip_sw }}
                </h1>
                <h1 class="mb-2 text-semi-bold">
                    VLan: {{ $circuito->vlan }}
                </h1>
                <h1 class="mb-2 text-semi-bold">
                    IP LoopBack: {{ $circuito->ip_loopback }}
                </h1>
                <h1 class="mb-2 text-semi-bold">
                    Descripción del circuito: {{ $circuito->description }}
                </h1>                
            </div>

            <div class="col-span"></div>
            <div class="col-span-1 w-full flex justify-end ">
                <x-button><a href="{{ route('admin.circuitos.index') }}"> Volver </a></x-button>
            </div>
        </div>
    </div>


</x-admin-layout>
