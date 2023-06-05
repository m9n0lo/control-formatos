<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarios_ssts extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['usuario', 'sede', 'observaciones','fecha_ingreso'];



     public function users(){
        return $this->belongsTo(User::class,'usuario');
     }

}
