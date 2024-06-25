<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Circuitos',
    ],
]">

    @role('admin|root')
        <x-slot name="action">
            <a class="btn btn-green" href="{{ route('admin.circuitos.create') }}">
                Añadir
            </a>
        </x-slot>
    @endrole

    @if ($circuitos->count())
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Número
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cuarto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Localidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accion
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($circuitos as $circuito)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $circuito->id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $circuito->circuito_num }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $circuito->type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $circuito->short_description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $circuito->cuarto->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $circuito->cuarto->localidad->name }}
                            </td>
                            <td class="px-6 py-4">
                                <x-button class="mr-2 bg-blue-700">
                                    <a href="{{ route('admin.circuitos.edit', $circuito) }}">Editar</a>
                                </x-button>
                                <x-button class="bg-green-800">
                                    <a href="{{ route('admin.circuitos.show', $circuito) }}">Ver</a>
                                </x-button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $circuitos->links() }}
        </div>
    @else
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!!</span> No hay circuitos registrados.
            </div>
        </div>
    @endif

</x-admin-layout>
