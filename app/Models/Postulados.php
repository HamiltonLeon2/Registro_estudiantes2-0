<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Postulados extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'postulados'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'mail',
        'num1',
        'num2',
        'num3',
        'tipp',
        'notas',
        'status'
    ];

    public function postulante()
    {
        return $this->hasOne(Postulante::class, 'id');
    }
    public function archivos()
    {
        return $this->hasmany(Archivo::class);
    }
    public function ente()
    {
        return $this->hasOneThrough(Ente::class, Postulante::class, 'id', 'id', 'postulante', 'ente');
    }
}
