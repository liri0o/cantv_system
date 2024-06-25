<div>
    <form wire:submit="store">

        <x-label class="text-xl text-bold mb-2">Fotografía del equipo de red</x-label>

        <div class="card bg-gray-300 mb-6">
            {{-- figure de la fotografia --}}
            <figure class="mb-4">
                <div class="relative mb-4 justify-center w-full">
                    <div class="absolute top-8 right-8">
                        <label class="flex items-center text-sm px-4 py-2 rounded-lg bg-gray-300 cursor-pointer">
                            <i class="fas fa-camera mr-2"> </i>
                            Actualizar foto
                            <input type="file" accept="image/*" class="hidden" wire:model="image_path">
                        </label>
                    </div>
                    <img class="aspect-[3/2] w-full object-cover object-center border-2 border-gray-200 border-solid rounded-lg dark:border-gray-300"
                        src="{{ $image_path ? $image_path->temporaryUrl() : Storage::url($servredEdit['image_path']) }}"
                        alt="">
                </div>
            </figure>

        </div>

        <x-validation-errors class="mb-4" />

        <x-label class="text-xl text-bold mb-2">Sobre el equipo de red</x-label>
        <div class="card bg-gray-300 mb-6">
            {{-- INPUTS --}}
            <div class="mb-4">
                <x-label class="mb-1">
                    Tipo de equipo
                </x-label>
                <x-select class="w-full" wire:model="servredEdit.equip_type">
                    <option value="" disabled> Seleccione un tipo de equipo</option>
                    <option value="Router">Router</option>
                    <option value="Switch">Switch</option>
                    <option value="Hub">Hub</option>
                    <option value="DTU">DTU</option>
                    <option value="T-Lindus">T-Lindus</option>
                    <option value="Thomson">Thomson</option>
                    <option value="Pairgain">Pairgain</option>
                    <option value="ODF">ODF</option>
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Marca del equipo
                </x-label>
                <x-input wire:model="servredEdit.equip_marca" class="w-full"
                    placeholder="Ingrese la marca del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Modelo del equipo
                </x-label>
                <x-input wire:model="servredEdit.equip_modelo" class="w-full"
                    placeholder="Ingrese el modelo del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Serial del equipo
                </x-label>
                <x-input wire:model="servredEdit.equip_serial" class="w-full"
                    placeholder="Ingrese el serial del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Código de inventario
                </x-label>
                <x-input wire:model="servredEdit.code_inv" class="w-full"
                    placeholder="Ingrese el código de inventario del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Cantidad de puertos disponibles
                </x-label>
                <x-input wire:model="servredEdit.cant_puertos_dis" class="w-full"
                    placeholder="Ingrese la cantidad de puertos disponibles del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Cantidad de puertos ocupados
                </x-label>
                <x-input wire:model="servredEdit.cant_ports_oc" class="w-full"
                    placeholder="Ingrese la cantidad de puertos ocupados del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Cantidad de puertos en total
                </x-label>
                <x-input wire:model="servredEdit.cant_ports_total" class="w-full"
                    placeholder="Ingrese la cantidad de puertos total del equipo" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Descripcion del equipo
                </x-label>
                <x-textarea wire:model="servredEdit.description" class="w-full resize-none h-60"
                    placeholder="Ingrese una descripción sobre el circuito">
                </x-textarea>
            </div>          
        </div>

        <x-label class="text-xl text-bold mb-2">Sobre la pertenencia del equipo de red</x-label>
        <div class="card bg-gray-300 mb-6">
              {{-- SELECTS ANIDADOS DE ASIGNACION --}}
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
                <x-select class="w-full" wire:model.live="servredEdit.cuarto_id">

                    <option value="" disabled> Seleccione un cuarto </option>
                    @foreach ($this->cuartos as $cuarto)
                        <option value="{{ $cuarto->id }}">{{ $cuarto->name }}</option>
                    @endforeach

                </x-select>
            </div>

            <div class="flex justify-end space-x-2">
                <x-danger-button onclick="confirmDelete()">Eliminar Equipo</x-danger-button>
                <x-button class="ml-2"> Guardar Cambios </x-button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.servreds.destroy', $servred) }}" method="POST" id="delete-form">
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
