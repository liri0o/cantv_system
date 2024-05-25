<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'estado_id'];

    //Relacion uno a muchos con Cuartos
    public function cuartos()
    {
        return $this->hasMany(Cuarto::class);
    }
    
    //Relacion de pertenencia con Estados 
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
