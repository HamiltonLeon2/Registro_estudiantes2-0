<?php

namespace App\Http\Controllers\postulados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\Postulante;
use App\Models\Archivo;
use App\Models\Ente;
use Illuminate\Support\Facades\Log;

class registro extends Controller
{
    public function store(Request $request)
    {
        $tipoPostulacion = $request->input('tipp');

        $rules = [
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:25',
            'cedula' => 'unique:postulados,cedula|string|max:8',
            'mail' => 'required|email',
            'num1' => 'required|string|max:11',
            'num2' => 'required|string|max:11',
            'num3' => 'nullable|string|max:11',
            'tipp' => 'required|string|max:20',
            'notas' => 'nullable|string|max:255',
            'nombreapellido' => 'nullable|string|max:50',
            'depa' => 'nullable|string|max:50',
            'cargo' => 'nullable|string|max:50',
            'CartaP' => 'required|file|max:5000',
            'CartaP2' => 'nullable|file|max:5000',
            'CartaP3' => 'nullable|file|max:5000',
            'CartaP4' => 'nullable|file|max:5000',
            'CartaP5' => 'nullable|file|max:5000',
            'CertOPSU' => 'nullable|file|max:5000',
            'TituloB' => 'nullable|file|max:5000',
            'CedulaIdentidad' => 'nullable|file|max:5000',
            'status' => 'required|string|max:15'
        ];

        if (!in_array($tipoPostulacion, ['OPSU', 'Particular', 'Deportiva'])) {
            $rules['ente'] = 'required|string|max:100';
        }

        $validatedData = $request->validate($rules);

        $ente = null;
        if ($tipoPostulacion === 'OPSU') {
            $ente = 1; // Asignar valor 1 para OPSU
        } elseif ($tipoPostulacion === 'Deportiva') {
            $ente = 2; // Asignar valor 2 para Deportiva
        } elseif ($tipoPostulacion === 'Particular') {
            $ente = 3; // Asignar valor 3 para Particular
        } else {
            $ente = $validatedData['ente'];
        }

        try {
            $postulado = Postulados::create([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'mail' => $request->input('mail'),
                'num1' => $request->input('num1'),
                'num2' => $request->input('num2'),
                'num3' => $request->input('num3'),
                'tipp' => $request->input('tipp'),
                'notas' => $request->input('notas'),
                'status' => $request->input('status'),
            ]);

            $postulante = new Postulante([
                'nombreapellido' => $request->input('nombreapellido'),
                'depa' => $request->input('depa'),
                'ente' => $ente, // Asignar el mismo ente al postulante
                'cargo' => $request->input('cargo'),
            ]);
            $postulado->postulante()->save($postulante);

            $archivos = [
                'CartaP' => 'Carta de postulacion',
                'CartaP2' => 'Carta de postulacion 2',
                'CartaP3' => 'Carta de postulacion 3',
                'CartaP4' => 'Carta de postulacion 4',
                'CartaP5' => 'Carta de postulacion 5',
                'CedulaIdentidad' => 'cedula de identidad',
                'TituloB' => 'Titulo de bachillerato',
                'CertOPSU' => 'Certificado OPSU',
            ];

            foreach ($archivos as $campo => $descripcion) {
                if ($request->hasFile($campo)) {
                    $archivo = $request->file($campo);
                    $nombreArchivo = $descripcion . '_' . $postulado->cedula . '_' . $postulado->nombre . '.' . $archivo->getClientOriginalExtension();
                    $archivo->storeAs('archivos', $nombreArchivo);

                    $archivoModel = new Archivo([
                        'nombre' => $descripcion,
                        'tipo' => $archivo->getClientOriginalExtension(),
                        'size' => $archivo->getSize(),
                        'ruta' => $nombreArchivo,
                        'postulados_id' => $postulado->id,
                    ]);
                    $archivoModel->save();
                }
            }

            return redirect('/registro_postulado')->with('success', 'Postulado registrado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al registrar el postulado: ' . $e->getMessage());
            return redirect('/registro_postulado')->with('error', 'Error al registrar el postulado');
        }
    }

    public function create()
    {
        $entes = Ente::all();
        return view('Postulados.registro', ['entes' => $entes]);
    }
}
