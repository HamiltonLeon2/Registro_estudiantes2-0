<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Postulante extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = 'postulantes';
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nombreapellido',
        'ente',
        'cargo',
        'depa',

    ];

    // Relación con la tabla Estudiantes
    public function postulados()
    {
        return $this->belongsTo(Postulados::class, 'PERPOSTUID');
    }
    public function ente()
    {
        return $this->belongsTo(Ente::class, 'ente');
    }
 
    

}
