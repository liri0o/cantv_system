<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Necesidad extends Model
{
    use HasFactory;

    protected $fillable =[
        //sobre el mantenimiento

        'cable_elim',
        'cajas_des_elim',
        'elim_desin_equip_com',
        'inv_etq_equip_com',
        'cable_vd_org',
        'bable_elec_org',

        //sobre la adecuación

        'mtto_general',
        'rack_piso',
        'rack_pared',
        'bandeja_equip_norack',
        'panel_dis',
        'conector_rojo',
        'conector_gris',
        'pathcord_rojo',
        'pathcord_azul',
        'pathcord_router_sw',
        'faceplate',
        'wallbox',
        'front_back_x',
        'front',
        'front_back_y',
        'regleta_tlf',
        'regleta_rack',
        'conectores_4pares',
        'conectores_5pares',
        'cable_multipar_tlf',
        'switch',
        'router',
        'multitoma',
        'ups',
        //sobre la construcción
        'cant_punt_datos',
        'cant_punt_voz',


        'cuarto_id'

    ];

       //Relacion de pertenencia con Cuartos
       public function cuarto()
       {
           return $this->belongsTo(Cuarto::class, 'cuarto_id', 'id');
       }
}
