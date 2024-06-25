<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cuarto extends Model
{
    use HasFactory;

    protected $fillable = [
        //info general
        'name',
        'jefe',
        'status', 
        'photo_1',
        'photo_2',     
        'description',     
        
        //serv voz     
        'cant_tlf_total_fxb',
        'cant_tlf_oc_fxb',
        'cant_tlf_dis_fxb',
        'cant_tlf_line' ,
        
        'localidad_id'
    ];

    /* protected function image(): Attribute{
        return Attribute::make(
            get: fn() => Storage::url($this->photo_1)
        );
    } */

    //Relacion de pertenencia con Localidades
    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
    //Relacion uno a uno con Circuitos
    public function circuitos()
    {
        return $this->hasMany(Circuito::class, 'cuarto_id', 'id');
    }

    //Relacion uno a uno con Servreds
    public function servreds()
    {
        return $this->hasMany(Servred::class, 'cuarto_id', 'id');
    }

    //Relacion uno a uno con Necesidades
    public function necesidads()
    {
        return $this->hasOne(Necesidad::class, 'cuarto_id', 'id');
    }
    
}
    
