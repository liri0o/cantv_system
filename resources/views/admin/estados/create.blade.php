<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Estados',
        'route' => route('admin.estados.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <form action="{{ route('admin.estados.store') }}" method="POST">
        @csrf

        <div class="card">

            <x-validation-errors class="mb-4" />
           <!-- Select con la regiones-->
            <div class="mb-4">
                <x-label class="mb-2">
                    Region
                </x-label>
                <x-select name="region_id" class="w-full">
                    <option value=""> Seleccione una region</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" @selected(old('region_id') == $region->id)>{{ $region->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre del estado" name="name"
                    value="{{ old('name') }}" />
            </div>
            <div class="flex justify-end"> <x-button> Crear </x-button></div>
        </div>

    </form>


</x-admin-layout>
