<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Permisos',
        'route' => route('admin.permissions.index'),
    ],
    [
        'name' => $permission->name,
    ],
]">

    <form action=" {{ route('admin.permissions.update', $permission) }} " method="POST">
        @csrf

        @method('PUT')

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <label class="mb-2">
                    Nombre del permiso
                </label>
                <x-input class="w-full" type="text" placeholder="Ingrese el nombre del permiso" name="name"
                    value="{{ old('name', $permission->name) }}" />
            </div>


            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>
                <x-button class="ml-2"> Guardar </x-button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" id="delete-form">
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
