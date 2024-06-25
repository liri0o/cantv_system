<x-app-layout>
    <x-container class="pt-5">

        <div class="grid md:grid-cols-2 gap-2">

            <div class="col-span-1 card bg-gray-300">
                <figure class="mb-2">
                    <img class="w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ Storage::url($servred['image_path']) }}" alt="">
                </figure>

                <div class="text-sm">
                    {{ $servred->description }}
                </div>
            </div>

            <div class="col-span-1 card bg-gray-300">

                 <div class="flex justify-center mb-4">
                    <h1 class=" text-xl text-bold">
                        Equipo de red: {{ $servred->equip_type }}
                    </h1>
                </div>

                <h2 class="mb-2 text-semi-bold">
                    Cuarto de voz y data: {{ $servred->cuarto->name }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Localidad: {{ $servred->cuarto->localidad->name }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Fecha de creación: {{ $servred->created_at }}
                </h2>
                
                <h2 class="mb-2 text-semi-bold">
                    Última modificación: {{ $servred->updated_at }}
                </h2> 

                <h2 class="mb-2 text-semi-bold">
                    Tipo: {{ $servred->equip_type }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Serial: {{ $servred->equip_serial }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Marca: {{ $servred->equip_marca }}
                </h2>

                <h2 class="mb-2 text-semi-bold">
                    Modelo: {{ $servred->equip_modelo }}
                </h2>
                
                <h2 class="mb-2 text-semi-bold">
                    Código de inventario: {{ $servred->code_inv }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Cantidad de puertos disponibles: {{ $servred->cant_puertos_dis }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Cantidad de puertos ocupados: {{ $servred->cant_ports_oc }}
                </h2>
                <h2 class="mb-2 text-semi-bold">
                    Cantidad de puertos totales: {{ $servred->cant_ports_total }}
                </h2>
                <div class="col-span-1 w-full flex justify-end ">
                    <x-button><a href="{{ route('servreds') }}"> Volver </a></x-button>
                </div>
            </div>         
        </div>

    </x-container>
</x-app-layout>
