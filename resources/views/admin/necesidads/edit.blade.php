<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Necesidades',
        'route' => route('admin.necesidads.index'),
    ],
    [
        'name' => $necesidad->cuarto->name, 
    ],
]">

@livewire('admin.necesidads.necesidad-edit', ['necesidad' => $necesidad])

</x-admin-layout>