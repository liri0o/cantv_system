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

    {{-- <form action="{{ route('admin.localidades.store') }}" method="POST">
        @csrf

        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-2">
                    Estado
                </x-label>
                <x-select name="estado_id" class="w-full">
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" @selected(old('estado_id') == $estado->id)>
                            {{ $estado->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre la" name="name" value="{{ old('name') }}" />
            </div>
            <div class="flex justify-end"> <x-button> Crear </x-button></div>
        </div>
    </form> --}}


    @livewire('admin.localidades.localidad-create')

</x-admin-layout>
