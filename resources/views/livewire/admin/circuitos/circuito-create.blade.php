<div>
    <form wire:submit="store">   

    <x-label class="text-xl text-bold mb-2">Fotografía del circuito</x-label>
    {{-- figure de la fotografia --}}
    <div class="card bg-gray-300 mb-6">
        <figure  class="mb-4">
            <div class="relative mb-4 justify-center w-full">
                <div class="absolute top-8 right-8">
                    <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                        <i class="fas fa-camera mr-2"> </i>
                        Agregar fotografía
                        <input type="file" accept="image/*" class="hidden" wire:model="image_path">
                    </label>
                </div>
                <img class="aspect-[3/2] w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                    src="{{ $image_path ? $image_path->temporaryUrl() : asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                    alt="">
            </div>
        </figure>
    </div>    
    <x-validation-errors class="mb-4" />

    <x-label class="text-xl text-bold mb-2">Sobre el circuito</x-label>
    <div class="card bg-gray-300 mb-6">
        {{-- INPUTS --}}
        <div class="mb-4">
            <x-label class="mb-1">Tipo de circuito</x-label>
            <x-select class="w-full" wire:model="circuito.type">

                <option value="" disabled> Seleccione un circuito</option>

                <option value="Frame Relay">Frame Relay</option>
                <option value="PPP">PPP</option>
                <option value="T-Lindus">T-Lindus</option>
                <option value="Metro Ethernet">Metro Ethernet</option>

            </x-select>
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Número de circuito
            </x-label>
            <x-input wire:model="circuito.circuito_num" class="w-full" placeholder="Ingrese el número del circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Ip wan </x-label>
            <x-input wire:model="circuito.ipwan" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Ip lan block </x-label>
            <x-input wire:model="circuito.iplan_bloq" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Switch IP</x-label>
            <x-input wire:model="circuito.ip_sw" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> VLAN </x-label>
            <x-input wire:model="circuito.vlan" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> IP Loopback </x-label>
            <x-input wire:model="circuito.ip_loopback" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Descripcion del circuito </x-label>
            <x-textarea wire:model="circuito.description" class="w-full resize-none h-60"
                placeholder="Ingrese una descripción sobre el circuito">
            </x-textarea>
        </div>
        <div class="mb-4">
            <x-label class="mb-1"> Descripcion corta del circuito </x-label>
            <x-input wire:model="circuito.short_description" class="w-full" placeholder="Ingrese una descripción corta del circuito" />
        </div>
        
    </div>
    <x-label class="text-xl text-bold mb-2">Sobre la pertenencia del circuito</x-label>
    <div class="card bg-gray-300 mb-6">

        {{-- Selects --}}
        <div class="mb-4">
            <x-label class="mb-1">
                Estados
            </x-label>
            <x-select class="w-full" wire:model.live="estado_id">

                <option value="" disabled> Seleccione un estado </option>

                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                @endforeach

            </x-select>
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Localidades
            </x-label>
            <x-select class="w-full" wire:model.live="localidad_id">

                <option value="" disabled> Seleccione una localidad </option>
                @foreach ($this->localidades as $localidad)
                    <option value="{{ $localidad->id }}">{{ $localidad->name }}</option>
                @endforeach

            </x-select>
        </div>

        <div class="mb-4">
            <x-label class="mb-1">
                Cuartos
            </x-label>
            <x-select class="w-full" wire:model.live="circuito.cuarto_id">

                <option value="" disabled> Seleccione un cuarto </option>
                @foreach ($this->cuartos as $cuarto)
                    <option value="{{ $cuarto->id }}">{{ $cuarto->name }}</option>
                @endforeach

            </x-select>
        </div>      

        <div class="flex justify-end w-full">
            <x-button>
                Crear Circuito
            </x-button>
        </div>
        
    </div>

    </form> 
</div>
