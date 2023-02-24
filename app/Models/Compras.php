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
        'users_id',
        'solicitado_por',
        'fecha_elaboracion',
        'jefe_inmediato',
        'fecha_entrega',
        'observaciones',
        'firma'
    ];

    public function personas(){
        return $this->belongsTo(Persona::class,'persona_id');
      }

      public function users(){
        return $this->belongsTo(User::class,'users_id');
      }
}
