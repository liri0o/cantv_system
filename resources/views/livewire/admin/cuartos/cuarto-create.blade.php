<div>
    <form wire:submit="store">
        <x-validation-errors class="mb-4" />
        <!-- Formulario -->
        <div>
            <x-label class="text-xl text-bold mb-2">Sobre la pertenencia del cuarto</x-label>

            <div class="card bg-gray-300 mb-6">
                {{-- Selects de region - estados - localidades --}}
                <div class="mb-4">
                    <x-label class="mb-1"> Regiones </x-label>
                    <x-select class="w-full" wire:model.live="region_id">

                        <option value="" disabled> Seleccione una region</option>

                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach

                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1"> Estados </x-label>
                    <x-select class="w-full" wire:model.live="estado_id">

                        <option value="" disabled> Seleccione un estado</option>

                        @foreach ($this->estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1"> Localidades </x-label>
                    <x-select class="w-full" wire:model.live="cuarto.localidad_id">

                        <option value="" disabled> Seleccione una localidad</option>

                        @foreach ($this->localidades as $localidad)
                            <option value="{{ $localidad->id }}">{{ $localidad->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <x-label class="text-xl text-bold mb-2">Sobre el cuarto</x-label>
            <div class="card bg-gray-300 mb-6">
                
                <div class="mb-4">
                    <x-label class="mb-1"> Ubicación </x-label>
                    <x-input wire:model="cuarto.name" class="w-full" placeholder="Ingrese la ubicación del cuarto" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-1"> Jefe del cuarto </x-label>
                    <x-input wire:model="cuarto.jefe" class="w-full"
                        placeholder="Ingrese el nombre del jefe del cuarto" />
                </div>
                <div class="mb-4">
                    <x-label class="mb-1"> Status del cuarto </x-label>

                    <x-select class="w-full" wire:model="cuarto.status">

                        <option value="" disabled> Seleccione el status</option>

                        <option value="Visitado">Visitado</option>
                        <option value="No Visitado">No Visitado</option>

                    </x-select>
                </div>

                <div class="mb-4">
                    <x-label class="mb-1"> Descripcion del cuarto </x-label>
                    <x-textarea wire:model="cuarto.description" class="w-full resize-none h-60"
                        placeholder="Ingrese una descripción sobre el cuarto">
                    </x-textarea>
                </div>

            </div>

            <x-label class="text-xl text-bold mb-2">Sobre los servicios de voz</x-label>
            <div class="card bg-gray-300 mb-6">
                <div class="mb-4">
                    <x-label class="mb-1"> Cantidad de pares telefónicos disponibles en la FXB de la localidad
                    </x-label>
                    <x-input wire:model="cuarto.cant_tlf_dis_fxb" class="w-full" placeholder="Ingrese la cantidad" />
                </div>
                <div class="mb-4">
                    <x-label class="mb-1">Cantidad de pares telefónicos ocupados en la FXB de la localidad</x-label>
                    <x-input wire:model="cuarto.cant_tlf_oc_fxb" class="w-full"
                        placeholder="Ingrese el serial del telefono" />
                </div>
                <div class="mb-4">
                    <x-label class="mb-1"> Cantidad total de pares telefónicos en la FXB de la localidad </x-label>
                    <x-input wire:model="cuarto.cant_tlf_total_fxb" class="w-full" placeholder="Ingrese la cantidad" />
                </div>
                <div class="mb-4">
                    <x-label class="mb-1"> Cantidad de lineas telefónicas en la FXB de la localidad </x-label>
                    <x-input wire:model="cuarto.cant_tlf_line" class="w-full" placeholder="Ingrese la cantidad " />
                </div>
            </div>
        </div>
        <!-- Seccion de registros fotográficos-->
        <x-label class="text-xl text-bold mb-2">Sobre los registros fotográficos del cuarto</x-label>
        <div class="card bg-gray-300 mb-6">            
            <figure class="mb-4 gap-5 p-4  ">
                {{-- Foto 1 --}}
                <div class="relative mb-4 justify-center w-full">
                    <div class="absolute top-8 right-8">
                        <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                            <i class="fas fa-camera mr-2"></i>
                            Agregar fotografía
                            <input type="file" accept="image/*" class="hidden" wire:model="photo_1">
                        </label>
                    </div>
                    <img class="aspect-[3/2] w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ $photo_1 ? $photo_1->temporaryUrl() : asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                        alt="">
                </div>
                {{-- Foto 2 --}}
                <div class="relative mb-4 justify-center w-full">
                    <div class="absolute top-8 right-8">
                        <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                            <i class="fas fa-camera mr-2"></i>
                            Agregar fotografía
                            <input type="file" accept="image/*" class="hidden" wire:model="photo_2">
                        </label>
                    </div>
                    <img class="aspect-[3/2] w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ $photo_2 ? $photo_2->temporaryUrl() : asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                        alt="">
                </div>
            </figure>
            <div class="flex justify-end w-full">
                <x-button>
                    Crear Cuarto
                </x-button>
            </div>
        </div>
    </form>
</div>
