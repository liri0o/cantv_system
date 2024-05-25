<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Regiones',
        'route' => route('admin.regions.index'),
    ],
    [
        'name' => $region->name,
    ],
]">

    <div class="card">

        <form action="{{ route('admin.regions.update', $region) }}" method="POST">

            @csrf

            @method('PUT')

            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la region" name="name"
                    value="{{ old('name', $region->name) }}" />
            </div>
            <div class="flex justify-end space-x-2">

                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>

                <x-button class="ml-2"> Guardar </x-button>

            </div>
        </form>

    </div>

    <form action="{{ route('admin.regions.destroy', $region) }}" method="POST" id="delete-form">
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
