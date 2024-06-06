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
        'name' => 'Nuevo',
    ],
]">

@livewire('admin.necesidads.necesidad-create')

</x-admin-layout>