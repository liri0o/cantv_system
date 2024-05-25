<div>
    <form wire:submit="save">
        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">
                    Regiones
                </x-label>
                <x-select class="w-full" wire:model.live="localidadEdit.region_id">

                    <option value="" disabled>Seleccione una región</option>

                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">
                            {{ $region->name }}
                        </option>
                    @endforeach


                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Estado
                </x-label>
                <x-select name="estado_id" class="w-full" wire:model.live="localidadEdit.estado_id">

                    <option value="" disabled>Seleccione un estado</option>

                    @foreach ($this->estados as $estado)
                        <option value="{{ $estado->id }}" @selected(old('estado_id') == $estado->id)>
                            {{ $estado->name }}
                        </option>
                    @endforeach

                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la ruta" wire:model="localidadEdit.name" />
            </div>
            <div class="flex justify-end"> <x-button> Guardar cambios </x-button></div>
        </div>
    </form>

    

</div>
