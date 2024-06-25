<x-app-layout>   

    <x-container class="pt-5">
        <x-label class="text-xl text-bold mb-2">
            Sobre el mantenimiento del cuarto de cableado de {{ $necesidad->cuarto->name }}
        </x-label>

        <div class="card bg-gray-300 mb-6">

            <h1 class="text-bold mb-2">
                Eliminar cable innecesario (jumper-voz-data) del rack de V/D: {{$necesidad->cable_elim}}
            </h1>

            <h1 class="text-bold mb-2">
                Eliminar Cajas y material de desecho: {{$necesidad->cajas_des_elim}}
            </h1>

            <h1 class="text-bold mb-2">
                Eliminar y desincorporar equipos de comunicación obsoletos: {{$necesidad->elim_desin_equip_com}}
            </h1>

            <h1 class="text-bold mb-2">
                Inventariar y etiquetar equipos de comunicación (Router-SW-centrales): {{$necesidad->inv_etq_equip_com}}
            </h1>

            <h1 class="text-bold mb-2">
                Organizar cableado de voz y data: {{$necesidad->cable_vd_org}}
            </h1>

            <h1 class="text-bold mb-2">
                Organizar cableado de electricidad:  {{$necesidad->bable_elec_org}}
            </h1>
            
        </div>

        <x-label class="text-xl text-bold mb-2">
            Sobre la adecuación del cuarto de cableado de {{ $necesidad->cuarto->name }}
        </x-label>
        <div class="card bg-gray-300 mb-6">

            <h1 class="text-bold mb-2">
                Mantenimiento General:  {{$necesidad->mtto_general}}
            </h1>
            <h1 class="text-bold mb-2">
                Rack de piso:  {{$necesidad->rack_piso}}
            </h1>
            <h1 class="text-bold mb-2">
                Rack de pared:  {{$necesidad->rack_pared}}
            </h1>
            <h1 class="text-bold mb-2">
                Bandeja para equipos no raqueables:  {{$necesidad->bandeja_equip_norack}}
            </h1>
            <h1 class="text-bold mb-2">
                Panel de distribución:  {{$necesidad->panel_dis}}
            </h1>
            <h1 class="text-bold mb-2">
                Conector Rojo:  {{$necesidad->conector_rojo}}
            </h1>
            <h1 class="text-bold mb-2">
                Conector Gris:  {{$necesidad->conector_gris}}
            </h1>
            <h1 class="text-bold mb-2">
                Path cord Rojo (pathpanel):  {{$necesidad->pathcord_rojo}}
            </h1>
            <h1 class="text-bol mb-2">
                Path cord Azul (puesto):  {{$necesidad->pathcord_azul}}
            </h1>
            <h1 class="text-bold mb-2">
                Path cord (interconexión Router-SW):  {{$necesidad->pathcord_router_sw}}
            </h1>
            <h1 class="text-bold mb-2">
                Faceplate:  {{$necesidad->faceplate}}
            </h1>
            <h1 class="text-bold mb-2">
                Wallbox:  {{$necesidad->wallbox}}
            </h1>
            <h1 class="text-bold mb-2">
                Organizador Horizontal (Front-Back):  {{$necesidad->front_back_x}}
            </h1>
            <h1 class="text-bold mb-2">
                Organizador Horizontal (Front):  {{$necesidad->front}}
            </h1>
            <h1 class="text-bold mb-2">
                Organizador Vertical (Front-Back):  {{$necesidad->front_back_y}}
            </h1>
            <h1 class="text-bold mb-2">
                Regleta 110 Telefonía:  {{$necesidad->regleta_tlf}}
            </h1>
            <h1 class="text-bold mb-2">
                Regleta 110 para Rack con pasacables:  {{$necesidad->regleta_rack}}
            </h1>
            <h1 class="text-bold mb-2">
                Conetores 110 de 4 pares:  {{$necesidad->conectores_4pares}}
            </h1>
            <h1 class="text-bold mb-2">
                Conector 110 de 5 pares:  {{$necesidad->conectores_5pares}}
            </h1>
            <h1 class="text-bold mb-2">
                Cable multipar para telefonía:  {{$necesidad->cable_multipar_tlf}}
            </h1>
            <h1 class="text-bold mb-2">
                Switch:  {{$necesidad->switch}}
            </h1>
            <h1 class="text-bold mb-2">
                Router:  {{$necesidad->router}}
            </h1>
            <h1 class="text-bold mb-2">
                Multitoma 110 voltios:  {{$necesidad->miltitoma}}
            </h1>
            <h1 class="text-bold">
                UPS:  {{$necesidad->ups}}
            </h1>    
        </div>

        <x-label class="text-xl text-bold mb-2">
            Sobre la construcción del cuarto de cableado de {{ $necesidad->cuarto->name }}
        </x-label>
        <div class="card bg-gray-300 mb-6">

            <h1 class="text-bold mb-2">
                Cantidad de Puntos de Datos:  {{$necesidad->cant_punt_datos}}
            </h1>
            <h1 class="text-bold">
                Cantidad de Puntos de Voz:  {{$necesidad->cant_punt_voz}}
            </h1>

        </div>

        <div class="col-span-1 w-full flex justify-end ">
            <x-button>
                <a href="{{ route('necesidads') }}"> Volver </a>
            </x-button>
        </div>

    </x-container>

</x-app-layout>