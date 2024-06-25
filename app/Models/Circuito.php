<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    use HasFactory;

    protected $fillable = [
      'circuito_num',
      'type',
      'ipwan',
      'iplan_bloq',
      'ip_sw',
      'vlan',
      'ip_loopback',
      'description',
      'short_description',
      'image_path',
      'cuarto_id'
    ];

      //Relacion de pertenencia con Cuartos
    public function cuarto()
    {
        return $this->belongsTo(Cuarto::class, 'cuarto_id', 'id');
    }
}
