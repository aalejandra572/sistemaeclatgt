<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Eclatgt') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Aquí solo Vite para cargar CSS y JS -->


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-slate-700">
        @include('layouts.navigation')
        
        @include('components.breadcrumb')
        

        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
    <script src="https://unpkg.com/preline@latest/dist/preline.js"></script>
<script>
    document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods?.autoInit()
  });
    window.addEventListener('load', function () {
        if (window.HSStaticMethods) {
            window.HSStaticMethods.autoInit();
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

</body>
</html>
