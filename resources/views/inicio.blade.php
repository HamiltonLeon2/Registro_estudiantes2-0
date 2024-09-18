<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--CSS-->
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-eaeeee shadow-md w-full">
        <div class="flex justify-between items-center">
            <img src="{{ asset('img/cintillo.png') }}" alt="cintillo institucional" class="w-full">
        </div>
    </header>
    <div class="bg-329cca text-eaeeee w-full py-2 text-center">
        <span class="float-left ml-4">Escuela Nacional de Administracion y Hacienda Publica</span>
        <span class="float-right mr-4"><a href="{{ route('login') }}">Inicio de sesión</a></span>
    </div>
    <main class="flex-1 bg-eaeeee p-10 flex flex-col items-center justify-center">
        <form action="{{ route('buscar') }}" method="GET" class="w-full h-full flex flex-col items-center justify-center">
            <h1 class="text-4xl text-14415b font-bold mb-10">Consultar un postulado</h1>
            <div class="bg-white rounded-full shadow-md flex items-center w-full max-w-md p-4">
                <input type="number" name="termino" placeholder="Ingrese la cédula a consultar" class="flex-1 p-2 rounded-full outline-transparent border-transparent">
                <button class="ml-4 bg-14415b text-eaeeee rounded-full p-2">
                    <img src="{{ asset('img/busqueda.png') }}" alt="Boton de busqueda." class="h-10 w-10">
                </button>
            </div>
        </form>
    </main>
    <footer class="bg-14415b text-eaeeee text-center p-4 mt-auto">
        <p>Sistema Integral de Gestión de Postulados Estudiantil de la ENAHP-IUT (SIGEPE)</p>
        <p>::Escuela Nacional de Administración y Hacienda Pública-IUT(ENAPH) (Versión 1.00)::</p>
    </footer>
</body>
</html>
