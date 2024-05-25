<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    use HasFactory;

    protected $fillable = [
        'enlace_type',
        'circuito_num',
        'enlace_ipwan',
        'enlace_iplan_bloq',
        'meth_ip_sw',
        'meth_vlan',
        'meth_ip_loopback',
        'meth_ip_wan'
    ];

    //Relacion de pertenencia con Cuartos
   /*  public function cuarto()
    {
        return $this->belongsTo(Cuarto::class);
    }*/
} 
