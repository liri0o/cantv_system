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
        'name' => 'Nuevo',
    ],
]">

<form  action=" {{route('admin.permissions.store')}} " method="POST">
    @csrf

    <div class="card">

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <label class="mb-2">
                Nombre del permiso
            </label>
            <x-input class="w-full" type="text" placeholder="Ingrese el nombre del permiso" name="name"                 />
        </div>      
                

        <div class="flex justify-end">
            <x-button>
                Crear permiso
            </x-button>
        </div>
    </div>
</form>

</x-admin-layout>