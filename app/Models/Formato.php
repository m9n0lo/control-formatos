<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'persona_id', 
        'nombre_equipo',
        'fecha_mant_est',
        'fecha_retiro',
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
