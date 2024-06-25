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

    <form  action="{{route('admin.users.store')}}" method="POST">
        @csrf

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <label class="mb-2">
                    Nombre del usuario
                </label>
                <x-input class="mt-1 block w-full" required type="text" placeholder="Ingrese el nombre del usuario" name="name"
                    value="{{ old('name') }}" />
            </div>

            <div class="mb-4">
                <label class="mb-2">
                    Correo del usuario
                </label>
                <x-input class="mt-1 block w-full" type="email" placeholder="Ingrese el correo electrónico del usuario"
                    name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-4">
                <label class="mb-2">
                    Contraseña
                </label>
                <x-input class="mt-1 block w-full" type="password" placeholder="Ingrese el correo electrónico del usuario"
                    name="password" value="{{ old('password') }}" />
            </div>

            <div class="mb-4">
                <label class="mb-2">Roles</label>
    
                            
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mb-2">
                    @foreach ($roles as $id => $role) 
                    
                        <input id="bordered-checkbox" type="radio" value="{{$id}}" name="roles[]" class=" h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox" class="w-16 py-4 ms-2 text-sm font-medium ">{{$role}}</label>
                                       
                    @endforeach
                </div>
                
    
            </div>


            <div class="flex justify-end">
                <x-button>
                    Crear usuario
                </x-button>
            </div>
        </div>
    </form>


</x-admin-layout>
