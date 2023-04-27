<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega_sst extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [];


    public function personas(){
        return $this->belongsTo(Persona::class,'jefe_inmediato');
      }

      public function users(){
        return $this->belongsTo(User::class,'solicitado_por');
}
}
