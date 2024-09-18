@extends('layouts.app')
@section('content')
<main class="flex-1 bg-eaeeee p-10 flex flex-col items-center justify-center h-96 ">
    <form action="{{ route('estudiantes.search') }}" method="GET" class="w-full h-full flex flex-col items-center justify-center">
        <h1 class="text-4xl text-14415b font-bold mb-10">Consultar un postulado</h1>
        <div class="bg-white rounded-full shadow-md flex items-center w-full max-w-md p-4">
            <input type="text" name="termino" placeholder="Ingrese los datos a consultar" class="flex-1 p-2 rounded-full outline-transparent border-transparent">
            <button class="ml-4 bg-14415b text-eaeeee rounded-full p-2">
                <img src="{{ asset('img/busqueda.png') }}" alt="Boton de busqueda." class="h-10 w-10">
            </button>
        </div>
    </form>
</main>
@endsection