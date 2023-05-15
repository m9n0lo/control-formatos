<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_entrega_sst extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'articulos_id',
        'entregas_id',
        'cantidad_entregada',
        'observaciones',
    ];

    public function articulos(){
        return $this->belongsTo(Articulos_ssts::class,'articulos_id');
     }

    public function entregas(){
        return $this->belongsTo(Entregas_ssts::class,'entregas_id');
     }
}
