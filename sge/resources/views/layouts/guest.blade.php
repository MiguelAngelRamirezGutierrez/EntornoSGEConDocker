<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ERP Distribuidora Tecnológica') }}</title>

    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 (iconos solicitados en la guía) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts y estilos de Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="text-gray-900 antialiased bg-gradient-to-br from-slate-900 via-indigo-950 to-blue-950 min-h-screen relative flex items-center justify-center p-4 selection:bg-blue-500 selection:text-white">
    <!-- Decoración geométrica de fondo (Glow tecnológico) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-blue-500/20 blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-indigo-500/20 blur-3xl"></div>
    </div>

    <div class="w-full max-w-md my-8">
        <!-- Logo y Nombre de la Empresa -->
        <div class="flex justify-center mb-6">
            <a href="/" class="flex flex-col items-center group">
                <img src="{{ asset('img/logo.svg') }}" class="w-16 h-16 transition-transform duration-300 group-hover:scale-105 drop-shadow-md" alt="Logo ERP">
                <span class="mt-3 text-2xl font-bold tracking-tight text-white drop-shadow-sm">
                    ERP Distribuidora <span class="text-blue-400">Tecnológica</span>
                </span>
                <span class="text-xs text-blue-200/70 uppercase tracking-widest font-semibold mt-1">
                    Plataforma de Gestión Empresarial
                </span>
            </a>
        </div>

        <!-- Contenedor del Formulario (Tarjeta con sombra) -->
        <div class="bg-white/95 backdrop-blur-md px-8 py-8 shadow-2xl rounded-2xl border border-white/20 transition-all">
            {{ $slot }}
        </div>

        <!-- Footer mínimo de autenticación -->
        <div class="text-center mt-6 text-xs text-slate-400">
            &copy; 2026 ERP Distribuidora Tecnológica. Todos los derechos reservados.
        </div>
    </div>
</body>

</html>




<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
<!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
<!-- @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html> --> --> -->