<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'region_id'];

    //Relacion de uno a muchos con Localidades
    public function localidades()
    {
        return $this->hasMany(Localidad::class);
    }

    //Relacion de dependencia con Regiones
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
