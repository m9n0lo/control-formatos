<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C_histories extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'compra_id',
        'estado',
        'descripcion',
        'responsable',
        'fecha_cambio',
    ];

    public function compras(){
        return $this->belongsTo(Compras::class,'compra_id');
      }
}
