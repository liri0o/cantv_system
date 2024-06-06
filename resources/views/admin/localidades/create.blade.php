<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Localidades',
        'route' => route('admin.localidades.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">



 @livewire('admin.localidades.localidad-create') 

</x-admin-layout>
