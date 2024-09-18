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
    <div class="bg-329cca text-eaeeee w-full py-2 text-center flex flex-row justify-between p-4 align-middle h-16 ">
        <div class="flex flex-row">
            <a href="/"><img src="{{ asset('img/home.svg') }}" alt="Volver a inicio" class="w-12 h-12"></a>
            <h1 class="text-3xl ml-5 mt-2">Coincidencias</h1>
        </div>
        <form action="{{ route('buscar') }}" method="get">
        <div class="flex items-center bg-white rounded-full shadow-md p-2 w-96 text-14415b">
            <input type="number" placeholder="Ingrese la cédula a consultar" class="p-2 rounded-full outline-none flex-1 outline-transparent border-transparent h-4 ">
            <button class="ml-2 bg-14415b text-eaeeee rounded-full p-2">
                <img src="{{ asset('img/busqueda.png') }}" alt="Boton de busqueda." class="h-5 w-5">
            </button>
        </div>
    </form>
    </div>
    <main class="flex-1 bg-eaeeee p-4">
        <div class="bg-969392 p-10 rounded-md shadow-md flex flex-col items-center justify-center">
            <div class="space-y-4">
                @if ($resultados->count() > 0) @foreach ($resultados as $resultado)
                <div class="bg-white rounded-lg shadow-md flex-col p-6 flex ">
                    <div>
                        <h2 class="text-xl font-bold text-14415b">{{ $resultado->nombre }} {{ $resultado->apellido }}</h2>
                        <p>Cédula: <span class="font-semibold">{{ $resultado->cedula }}</span></p>
                    </div>
                    <div>
                        <p>Fecha de postulación: <span class="font-semibold">{{ $resultado->created_at->format('d/m/Y')}}</span></p>
                        <p>Estatus de la postulación: <span class="font-semibold 
                            {{ $resultado->status == 'Rechazada' ? 'text-red-500' : '' }}
                            {{ $resultado->status == 'Aceptada' ? 'text-green-500' : '' }}">
                            {{ $resultado->status }}
                        </span></p>
                    </div>
                </div>
            @endforeach @else @if (empty($resultado))
        
          <h5 class="text-14415b text-xl font-bold">No se han encontrado coincidencias</h5>

        
          @else @endif @endif
        
            </div>
        </div>
    </main>
    <footer class="bg-14415b text-eaeeee text-center p-4 mt-auto">
        <p>Pie de página</p>
    </footer>
</body>
</html>
