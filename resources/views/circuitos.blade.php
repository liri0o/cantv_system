<x-app-layout>

    <x-container class="pt-5">
        <h1 class="text-2xl font-bold text-gray-700 mb-2">
            Totalidad de circuitos registrados
        </h1>
        @if ($circuitozCargados->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 card bg-gray-200 gap-6">

                @foreach ($circuitozCargados as $circuito)
                    <article class="bg-white shadow rounded overflow-hidden">
                        <img src="{{ Storage::url($circuito['image_path']) }}"
                            class="w-full h-48 object-cover object-center transition-all duration-300 rounded-lg 
                        cursor-pointer filter grayscale hover:grayscale-0">
                        <div class="p-4">
                            <h1>Localidad: {{ $circuito->cuarto->localidad->name }}</h1>
                            <h1>Ubicación: {{$circuito->cuarto->name}}</h1>
                            <h1>Descripción: {{$circuito->short_description}}</h1>
                            <h1>Tipo: {{$circuito->type}}</h1>
                            <h1>Nº del circuito: {{$circuito->circuito_num}}</h1>

                            <div class="flex justify-end w-full mt-2">
                                <x-button>
                                    <a href=" {{ route('circuitos.show', $circuito) }} "> Ver detalles </a>
                                </x-button>
                            </div>
                        </div>
                    </article>
                @endforeach

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
                    <span class="font-medium">Info alert!!</span> Aun no se ha registrado ningún circuito.                     
                </div>
            </div>
        @endif

    </x-container>

</x-app-layout>
