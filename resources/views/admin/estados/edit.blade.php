<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Estados',
        'route' => route('admin.estados.index'),
    ],
    [
        'name' => $estado->name,
    ],
]">

    <form action="{{ route('admin.estados.update', $estado) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">
                    Region
                </x-label>
                <x-select name="region_id" class="w-full">
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" @selected(old('region_id', $estado->region_id) == $region->id)>
                            {{ $region->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre del estado" name="name"
                    value="{{ old('name', $estado->name) }}" />
            </div>

            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>
                <x-button class="ml-2"> Guardar </x-button>
            </div>
        </div>

    </form>

    <form action="{{ route('admin.estados.destroy', $estado) }}" method="POST" id="delete-form">
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

</x-admin-layout>
