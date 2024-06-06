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
        'name' => $servred->equip_type,
    ],
]">


@livewire('admin.servreds.servred-edit', compact('servred'))

</x-admin-layout>