<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'route' => route('admin.users.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <form  action="{{route('admin.users.update', $user)}}" method="POST">
        @csrf

        @method('PUT')

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <label class="mb-2">
                    Nombre del usuario
                </label>
                <x-input class="w-full" type="text" placeholder="Ingrese el nombre del usuario" name="name"
                    value="{{ old('name', $user) }}" />
            </div>

            <div class="mb-4">
                <label class="mb-2">
                    Correo del usuario
                </label>
                <x-input class="w-full" type="email" placeholder="Ingrese el correo electrónico del usuario"
                    name="email" value="{{ old('email', $user) }}" />
            </div>
            <div class="mb-4">
                <label class="mb-2">
                    Contraseña
                </label>
                <x-input class="w-full" type="password" placeholder="Ingrese la contraseña del usuario"
                    name="password" value="{{ old('password') }}" />
            </div>

            <div class="mb-4">
                <label class="mb-2">Roles</label>
    
                @foreach ($roles as $id => $role)             
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mb-2">
                    <input id="bordered-checkbox-1" type="radio" value="{{$id}}" {{$user->roles->contains($id) ? 'checked' : ''}} name="roles[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium ">{{$role}}</label>
                </div>
                @endforeach
    
            </div>


            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>
                <x-button class="ml-2"> Guardar cambios </x-button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" id="delete-form">
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
