@php
    $links = [
        /*
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-table-columns',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
         [
            'name' => 'Gestión de usuarios',
            'icon' => 'fa-solid fa-user-gear',
            'route' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
        ],  
        [
            'name' => 'Regiones',
            'icon' => 'fa-solid fa-earth-americas',
            'route' => route('admin.regions.index'),
            'active' => request()->routeIs('admin.regions.*'),
        ], 
        [
            'name' => 'Estados',
            'icon' => 'fa-solid fa-road',
            'route' => route('admin.estados.index'),
            'active' => request()->routeIs('admin.estados.*'),
        ],
        [
            'name' => 'Localidades',
            'icon' => 'fa-solid fa-location-dot',
            'route' => route('admin.localidades.index'),
            'active' => request()->routeIs('admin.localidades.*'),
        ],    
        */
        [
            'name' => 'Cuartos',
            'icon' => 'fa-solid fa-person-shelter',
            'route' => route('admin.cuartos.index'),
            'active' => request()->routeIs('admin.cuartos.*'),
        ],
        [
            'name' => 'Circuitos',
            'icon' => 'fa-solid fa-bolt',
            'route' => route('admin.circuitos.index'),
            'active' => request()->routeIs('admin.circuitos.*'),
        ],
        [
            'name' => 'Equipos de red',
            'icon' => 'fa-solid fa-network-wired',
            'route' => route('admin.servreds.index'),
            'active' => request()->routeIs('admin.servreds.*'),
        ],
        [
            'name' => 'Necesidades',
            'icon' => 'fa-solid fa-triangle-exclamation',
            'route' => route('admin.necesidads.index'),
            'active' => request()->routeIs('admin.necesidads.*'),
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}  ">
                    <span class="inline-flex w-6 h-6 justify-center items-center">
                        <i class="fa-solid fa-table-columns"></i>
                    </span>
                    <span class="ms-2">
                        Dashboard
                    </span>
                </a>
            </li>
            @role('admin|root')
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }} ">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="fa-solid fa-user-gear"></i>
                        </span>
                        <span class="ms-2">
                            Gestión de usuarios
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.roles.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.roles.*') ? 'bg-gray-700' : '' }} ">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="fa-solid fa-people-line"></i>
                        </span>
                        <span class="ms-2">
                           Roles
                        </span>
                    </a>
                </li>
           {{--      <li>
                    <a href="{{ route('admin.permissions.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.permissions.*') ? 'bg-gray-700' : '' }} ">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="fa-solid fa-people-line"></i>
                        </span>
                        <span class="ms-2">
                           Permisos
                        </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.regions.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.regions.*') ? 'bg-gray-700' : '' }}  ">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="fa-solid fa-earth-americas"></i>
                        </span>
                        <span class="ms-2">
                            Regiones
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.estados.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('admin.estados.*') ? 'bg-gray-700' : '' }}   ">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="fa-solid fa-road"></i>
                        </span>
                        <span class="ms-2">
                            Estados
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.localidades.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.localidades.*') ? 'bg-gray-700' : '' }} ">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        <span class="ms-2">
                            Localidades
                        </span>
                    </a>
                </li>
            @endrole

            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-700' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $link['icon'] }}"></i>
                        </span>
                        <span class="ms-2">
                            {{ $link['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>

