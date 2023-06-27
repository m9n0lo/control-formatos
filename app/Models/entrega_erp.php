<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrega_erp extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'usuario',
        'proceso',
        'citada_por',
        'moderador',
        'secretario',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        'participantes', // N° - Nombre - Cargo - Firma
        'punto_discusion',
        'desarrollo_reunion',
        'planes_accion', // N° - Tarea - Responsable - Fecha Ejecucion - Seguimiento (cumple- no cumple)
        'observaciones',
    ];

    public function users(){
        return $this->belongsTo(User::class,'usuario');
     }
}
