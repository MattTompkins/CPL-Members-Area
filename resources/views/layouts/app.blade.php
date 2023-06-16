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
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include('components.toast')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <script>
        // Menu
        const menuOpenButton = document.getElementById('js-navigation-open');
        const menuCloseButton = document.getElementById('js-navigation-close');
        const mobileMenu = document.getElementById('js-mobile-menu');

        function toggleHamburgerMenu() {
            mobileMenu.classList.toggle('hidden');
        }

        menuOpenButton.addEventListener('click', toggleHamburgerMenu);
        menuCloseButton.addEventListener('click', toggleHamburgerMenu);
        
        // Sweet alert - confirm delete modal
        window.addEventListener('launch-delete-modal', event => {
            Swal.fire({
                title: 'Are you sure you want to delete this?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#b91c1c',
                confirmButtonText: 'Yes - delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            });
        });
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
