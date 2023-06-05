<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_inventario_sst extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['inventario_id', 'articulos_id', 'cantidad_disponible'];

    public function articulos()
    {
        return $this->belongsTo(Articulos_ssts::class, 'articulos_id');
    }

    public function inventarios()
    {
        return $this->belongsTo(Inventarios_ssts::class, 'inventario_id');
    }
}
