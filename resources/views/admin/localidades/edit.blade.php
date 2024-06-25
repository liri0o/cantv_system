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
        'name' => $localidad->name,
    ],
]">

 @livewire('admin.localidades.localidad-edit',  ['localidad' => $localidad])

</x-admin-layout>

