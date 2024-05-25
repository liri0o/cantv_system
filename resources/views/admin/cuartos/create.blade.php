<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Cuartos',
        'route' => route('admin.cuartos.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

@livewire('admin.cuartos.cuarto-create')

</x-admin-layout>