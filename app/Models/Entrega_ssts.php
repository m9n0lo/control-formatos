<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega_ssts extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'usuario',
        'persona_id',
        'fecha_entrega',
        'firma',
        'firma_sgsst'
    ];


    public function personas(){
        return $this->belongsTo(Persona::class,'persona_id');
      }

    public function users(){
        return $this->belongsTo(User::class,'usuario');
     }

}
