<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servred extends Model
{
    use HasFactory;

    protected $fillable = [
        'equip_type',
        'equip_marca',
        'equip_modelo',
        'equip_serial',
        'code_inv',
        'cant_puertos_dis',
        'cant_ports_oc',
        'cant_ports_total',
        'description',
        'image_path',
        'cuarto_id'
    ];    
    
    //Relacion de pertenencia con Cuartos
    public function cuarto()
    {
        return $this->belongsTo(Cuarto::class, 'cuarto_id', 'id');
    } 
}
