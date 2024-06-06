<div>
    <form wire:submit="store">

    <x-validation-errors class="mb-4" />

    <x-label class="font-semibold">
        Fotografía del Circuito
    </x-label>

    <figure  class="mb-4">
        <div class="relative mb-4 justify-center w-full">
            <div class="absolute top-8 right-8">
                <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                    <i class="fas fa-camera mr-2"> </i>
                    Actualizar foto
                    <input type="file" accept="image/*" class="hidden" wire:model="image_path">
                </label>
            </div>
            <img class="aspect-[3/2] w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                src="{{ $image_path ? $image_path->temporaryUrl() : Storage::url($circuitoEdit['image_path']) }}"
                alt="">
        </div>
    </figure>
    <x-validation-errors class="mb-4" />
    <div class="card">

        <div class="mb-4">
            <x-label class="mb-1">Tipo de circuito</x-label>
            <x-select class="w-full" wire:model="circuitoEdit.type">

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
            <x-input wire:model="circuitoEdit.circuito_num" class="w-full" placeholder="Ingrese el número del circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Ip wan </x-label>
            <x-input wire:model="circuitoEdit.ipwan" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Ip lan block </x-label>
            <x-input wire:model="circuitoEdit.iplan_bloq" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Switch IP</x-label>
            <x-input wire:model="circuitoEdit.ip_sw" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> VLAN </x-label>
            <x-input wire:model="circuitoEdit.vlan" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> IP Loopback </x-label>
            <x-input wire:model="circuitoEdit.ip_loopback" class="w-full" placeholder="Ingrese el numero de circuito" />
        </div>

        <div class="mb-4">
            <x-label class="mb-1"> Descripcion del circuito </x-label>
            <x-textarea wire:model="circuitoEdit.description" class="w-full resize-none h-60"
                placeholder="Ingrese una descripción sobre el circuito">
            </x-textarea>
        </div>

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
                Cuarto
            </x-label>
            <x-select class="w-full" wire:model.live="circuitoEdit.cuarto_id">

                <option value="" disabled> Seleccione un cuarto </option>
                @foreach ($this->cuartos as $cuarto)
                    <option value="{{ $cuarto->id }}">{{ $cuarto->name }}</option>
                @endforeach

            </x-select>
        </div>
        <div class="flex justify-end space-x-2">

            <x-danger-button onclick="confirmDelete()">Eliminar Cuarto</x-danger-button>

            <x-button class="ml-2"> Guardar Cambios </x-button>

        </div>
    </div>    
    </form>

    <form action="{{ route('admin.circuitos.destroy', $circuito) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, bórralo!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
@endpush
</div>
