<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
        'route' => route('admin.roles.index'),
    ],
    [
        'name' => $role->name,
    ],
]">

    <form action=" {{ route('admin.roles.update', $role) }} " method="POST">
        @csrf

        @method('PUT')

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <label class="mb-2">
                    Nombre del rol
                </label>
                <x-input class="w-full" type="text" placeholder="Ingrese el nombre del rol" name="name"
                    value="{{ old('name', $role->name) }}" />
            </div>

            <div class="mb-4">
                <label class="mb-2">Permisos</label>
    
                @foreach ($permissions as $id => $permission)             
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mb-2">
                    <input id="bordered-checkbox-1" type="checkbox" value="{{$id}}"{{$role->permissions->contains($id) ? 'checked' : ''}} name="permissions[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium ">{{$permission}}</label>
                </div>
                @endforeach
    
            </div>


            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>
                <x-button class="ml-2"> Guardar </x-button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" id="delete-form">
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
