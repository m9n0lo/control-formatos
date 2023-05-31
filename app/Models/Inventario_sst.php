<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario_sst extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['articulos_id', 'cantidad_disponible', 'sede', 'observaciones','fecha_ingreso'];

    public function articulos(){
        return $this->belongsTo(Articulos_ssts::class,'articulos_id');
     }

}
