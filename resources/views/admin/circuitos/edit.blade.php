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
        'name' => $circuito->type, 
    ],
]">

@livewire('admin.circuitos.circuito-edit', ['circuito' => $circuito])

</x-admin-layout>