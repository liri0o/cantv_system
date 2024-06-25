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
        'name' => 'Nuevo',
    ],
]">

<form  action=" {{route('admin.roles.store')}} " method="POST">
    @csrf

    <div class="card">

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <label class="mb-2">
                Nombre del rol
            </label>
            <x-input class="w-full" type="text" placeholder="Ingrese el nombre del rol" name="name"                 />
        </div> 
        
        <div class="mb-4">
            <label class="mb-2">Permisos</label>

            @foreach ($permissions as $id => $permission)             
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mb-2">
                <input id="bordered-checkbox-1" type="checkbox" value="{{$id}}" name="permissions[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium ">{{$permission}}</label>
            </div>
            @endforeach

        </div>
                

        <div class="flex justify-end">
            <x-button>
                Crear rol
            </x-button>
        </div>
    </div>
</form>

</x-admin-layout>