@extends('layouts.app')

@section('content')
    
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    
    <div class="space-y-4">
        @if ($resultados->count() > 0) @foreach ($resultados as $resultado)
        <div class="space-y-4">
            <!-- Card 1 -->
            <a href="{{ route('perfil.aspirante', $resultado->id) }}" class="block transform transition-transform hover:-translate-y-2">
                <div class="bg-white rounded-lg shadow-md p-6 flex">
                    <div>
                        <h2 class="text-xl font-bold text-14415b">{{ $resultado->nombre }} {{ $resultado->apellido }}</h2>
                        <p><span class="font-semibold text-14415b">Tipo de postulación: </span>{{ $resultado->tipp }}</p>
                        @if($ente = $entes->firstWhere('id', optional($resultado->postulante)->ente))
                            @if(!in_array($ente->ente, ['OPSU', 'DEPORTIVA', 'PARTICULAR']))
                                <p><span class="font-semibold text-14415b">Ente o consejo comunal: </span>{{ $ente->ente }}</p>
                            @endif
                        @endif
                        <div class="mt-4">
                            <h3 class="font-bold text-14415b">Datos de contacto:</h3>
                            <p><span class="text-14415b">Número de teléfono: </span> {{ $resultado->num1 }}</p>
                            <p><span class="text-14415b">Número de local: </span> {{ $resultado->num2 }}</p>
                            <p><span class="text-14415b">Correo electrónico: </span> {{ $resultado->mail }}</p>
                        </div>
                    </div>
                    <div class="ml-auto text-right">
                        <p>Fecha de postulación: <br><span class="font-semibold">{{ $resultado->created_at->format('d/m/Y') }}</span></p>
                        <p>Estatus de la postulación: <br>
                            <span class="font-semibold 
                                {{ $resultado->status == 'Rechazada' ? 'text-red-500' : '' }}
                                {{ $resultado->status == 'Aceptada' ? 'text-green-500' : '' }}">
                                {{ $resultado->status }}
                            </span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach @else @if (empty($resultado))

  <h5 class="text-14415b text-xl font-bold">No se han encontrado coincidencias</h5>
  <p>¿Desea registrar a un postulado? <a href="#" class="click-aqui">click aquí</a></p>

  @else @endif @endif

    </div>


@endsection