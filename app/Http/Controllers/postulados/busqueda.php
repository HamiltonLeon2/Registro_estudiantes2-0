<?php

namespace App\Http\Controllers\postulados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\Ente;

class busqueda extends Controller
{
    public function buscar(Request $request)
    {
        $termino = $request->input('termino');
        // Realiza la búsqueda en tu modelo
        $resultados = Postulados::where('cedula', 'LIKE', "%$termino%")->paginate(1);

        return view('Postulados.resultadosOUT', ['resultados' => $resultados]);
    }
    public function search(Request $request)
    {
        $termino = $request->input('termino');
        // Realiza la búsqueda en tu modelo
        $resultados = Postulados::where('nombre', 'ILIKE', "%$termino%")
            ->orWhere('apellido', 'ILIKE', "%$termino%")
            ->orWhere('cedula', 'LIKE', "%$termino%")
            ->paginate(100);
         $entes = Ente::all(); // Recuperar todos los entes
        return view('Postulados.resultados', ['resultados' => $resultados, 'entes' => $entes]);
    }
}
