<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Circuitos',
        'route' => route('admin.circuitos.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

@livewire('admin.circuitos.circuito-create')

</x-admin-layout>