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
        'name' => $cuarto->name,
    ],
]">


    @livewire('admin.cuartos.cuarto-edit', ['cuarto' => $cuarto])

</x-admin-layout>