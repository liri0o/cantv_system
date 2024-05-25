<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuarto extends Model
{
    use HasFactory;

    protected $fillable = ['name','status', 'jefe', 'localidad_id', 'photo_1','photo_2','photo_3', 'photo_4'];

    //Relacion de pertenencia con Localidades
    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
    //Relacion uno a uno con Circuitos
    public function circuito()
    {
        return $this->hasOne(Circuito::class);
    }

    //Relacion uno a uno con Servozs
    public function servoz()
    {
        return $this->hasOne(Servoz::class);
    }

    //Relacion uno a uno con Servreds
    public function servred()
    {
        return $this->hasOne(Servred::class);
    }
    
}
