@props(['breadcrumbs' => []])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/af4ea00356.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{
    sidebarOpen: false
}" :class="{
    'overflow-y-hidden': sidebarOpen
}">


    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" style="display: none;" x-show="sidebarOpen"
        x-on:click="sidebarOpen = false">

    </div>

    @include('layouts.partials.admin.navigation')
    @include('layouts.partials.admin.siderbar')

    <div class="p-4 sm:ml-64">
        <div class= "mt-14">
            <div class="flex justify-between items-center">
                @include('layouts.partials.admin.breadcrumb')

                @isset($action)
                    <div>
                        {{ $action }}
                    </div>
                @endisset

            </div>
            <div class="p-4 rounded-lg ">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @stack('js')

    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>
</body>

</html>
