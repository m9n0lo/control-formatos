<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega_sst extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'usuario',
        'persona_id',
        'articulos',
        'fecha_entrega',
        'otro',
        'firma',
        'observaciones',
        'firma_sgsst'
    ];


    public function personas(){
        return $this->belongsTo(Persona::class,'persona_id');
      }

    public function users(){
        return $this->belongsTo(User::class,'usuario');
     }
     public function articulos(){
        return $this->belongsTo(Articulos_ssts::class,'articulos');
     }
}
