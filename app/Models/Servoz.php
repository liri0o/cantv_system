<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servoz extends Model
{
    use HasFactory;

    protected $fillable = [
        'cant_tlf_fxb',
        'cant_tlf_line'
    ];

     //Relacion de pertenencia con Cuartos
   /*   public function cuarto()
     {
         return $this->belongsTo(Cuarto::class);
     } */
}

//   

