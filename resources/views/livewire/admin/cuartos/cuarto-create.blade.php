<div>
    <!-- Formulario -->
    <div class="card">
        <x-label class="font-semibold">Sobre el cuarto</x-label>
        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700 ">
            <div class="mb-4">
                <x-label class="mb-1"> Nombre </x-label>
                <x-input wire:model="cuarto.name" class="w-full" placeholder="Ingrese el nombre del cuarto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1"> Jefe del cuarto </x-label>
                <x-input wire:model="cuarto.jefe" class="w-full" placeholder="Ingrese el nombre del jefe del cuarto" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1"> Status del cuarto </x-label>
                <x-input wire:model="cuarto.status" class="w-full" placeholder="Ingrese el status del cuarto" />
            </div>

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

    </div>


    <!-- Seccion de registros fotográficos-->
    <div class="card">
        <figure class="mb-4 gap-5 p-4 ">      

            <div class="relative mb-4 justify-center w-full">
                <div class="absolute top-8 right-8">
                    <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                        <i class="fas fa-camera"> Actualizar</i>
                        <input type="file" 
                        accept="image/*"
                        class="hidden" wire:model="image_1">
                    </label>
                </div>
                <img class="aspect-[3/2]  object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                    src="{{ $image_1 ? $image_1->temporaryUrl() : asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                    alt="">
            </div>


            <div class="relative mb-4">
                <div class="absolute top-8 right-8">
                    <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                        <i class="fas fa-camera"> Actualizar</i>
                        <input type="file" 
                        accept="image/*"
                        class="hidden" wire:model="image_2">
                    </label>
                </div>
                <img class="aspect-[3/1] object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                    src="{{ $image_2 ? $image_2->temporaryUrl() : asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                    alt="">
            </div>

            <div class="relative mb-4">
                <div class="absolute top-8 right-8">
                    <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                        <i class="fas fa-camera"> Actualizar</i>
                        <input type="file" 
                        accept="image/*"
                        class="hidden" wire:model="image_3">
                    </label>
                </div>
                <img class="aspect-[3/1] object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                    src="{{ $image_3 ? $image_3->temporaryUrl() :asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                    alt="">
            </div>

            <div class="relative mb-4">
                <div class="absolute top-8 right-8">
                    <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                        <i class="fas fa-camera"> Actualizar</i>
                        <input type="file" 
                        accept="image/*"
                        class="hidden" wire:model="image_4">
                    </label>
                </div>
                <img class="aspect-[3/1] object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                    src="{{ $image_4 ? $image_4->temporaryUrl() : asset('img/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg') }}"
                    alt="">
            </div>            
        </figure>
    </div>
</div>
