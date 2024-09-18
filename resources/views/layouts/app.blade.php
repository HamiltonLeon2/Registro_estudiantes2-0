<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--CSS-->
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-eaeeee shadow-md fixed w-full z-50">
        <div class="flex justify-between items-center">
            <img src="{{ asset('img/cintillo.png') }}" alt="cintillo institucional" class="h-16 w-full">
        </div>
    </header>
    <nav class="bg-14415b text-eaeeee fixed top-16 left-0 w-64 h-full pt-4 overflow-y-auto">
        <a href="">
        <div class="flex items-center px-4">
            <img src="{{ asset('img/user_icon.png') }}" alt="Usuario" class="h-10 mr-2">
            <span>{{ auth()->user()->name}}</span>
        </div>
        </a>
        <ul class="mt-4 px-4 space-y-2">
            <li><a href="{{ route('dashboard') }}" class="block">Inicio</a></li>
            <li>
                <a href="#" class="block">Postulados</a>
                <ul class="ml-4 mt-1 space-y-1">
                    <li><a href="{{ route('registro_postulado') }}" class="block">Registrar</a></li>
                    <li><a href="#" class="block">Postulados hoy</a></li>
                    <li><a href="#" class="block">Todos los postulados</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="block">Postulantes</a>
                <ul class="ml-4 mt-1 space-y-1">
                    <li><a href="#" class="block">Ver postulantes</a></li>
                    <li><a href="#" class="block">Registrar ente</a></li>
                    <li><a href="#" class="block">Ver entes</a></li>
                </ul>
            </li>
            <li><a href="#" class="block">Reportes</a></li>
            <li><a href="#" class="block">Revisiones</a></li>
            <li><a href="#" class="block">Usuarios</a></li>
            @auth
            <li type="submit" class="btn btn-danger">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>Cerrar Sesión</button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>
    <main class="ml-64 mt-16 flex-1 p-4">
        <div class="bg-329cca text-eaeeee flex justify-between p-2">
            @if (Auth::check())
                <span>Último ingreso: 
                    {{ Auth::user()->previous_login_at ? 'Día: ' . \Carbon\Carbon::parse(Auth::user()->previous_login_at)->format('d/m/Y') . ' Hora: ' . \Carbon\Carbon::parse(Auth::user()->previous_login_at)->format('H:i') : 'N/A' }} 
                </span>
            @endif
        </div>
        <div class="bg-eaeeee p-10">
            <div class="content">
                {{ $slot ?? '' }} @yield('content')
            </div>
        </div>
    </main>
    <footer class="bg-14415b text-eaeeee text-center p-4 mt-auto">
        <p>Pie de página</p>
    </footer>
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
</body>
</html>
