<?php

namespace App\Http\Controllers\postulados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\Postulante;
use App\Models\Archivo;
use App\Models\Ente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class perfil extends Controller
{
    //controlador para recuperar el perfil del aspirante.
    public function mostrarPerfil($id)
    {
        $postulado = postulados::with('archivos')->find($id);
        $postulante = $postulado->postulante;
        $entes = Ente::all();


        return view('Postulados.perfil', compact('postulado', 'postulante', 'entes'));
    }
    //Descargar los archivos cargados del postulado
    public function descargarArchivo($nombreArchivo)
    {
        $rutaArchivo = storage_path('app/archivos/' . $nombreArchivo);

        if (Storage::exists('archivos/' . $nombreArchivo)) {
            return response()->file($rutaArchivo);
        } else {
            return redirect()->route('error.archivos_no_encontrados');
        }
    }

}
