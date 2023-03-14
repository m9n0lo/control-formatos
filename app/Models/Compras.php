<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'area',
        'solicitado_por',
        'fecha_elaboracion',
        'jefe_inmediato',
        'fecha_solicitud',
        'fecha_esperada',
        'tipo_solicitud',
        'sede',
        'razon_social',
        'correo_electronico',
        'telefono_contacto',
        'servicios',
        'cotizacion1',
        'cotizacion2',
        'cotizacion3',
        'detalle_solicitud',
        'costo_estimado',
        'estado_gestion',
        'estado',
        'servicios',
        'autorizado_por',
    ];

    public function personas(){
        return $this->belongsTo(Persona::class,'jefe_inmediato');
      }

      public function users(){
        return $this->belongsTo(User::class,'solicitado_por');
      }
      public function users_autorizado(){
        return $this->belongsTo(User::class,'autorizado_por');
      }
}
