<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Equipos de red',
        'route' => route('admin.servreds.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

@livewire('admin.servreds.servred-create')

</x-admin-layout>