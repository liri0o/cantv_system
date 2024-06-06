<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('necesidads', function (Blueprint $table) {
            $table->id();
            //Sobre el mantenimiento
            $table->string('cable_elim');
            $table->string('cajas_des_elim');
            $table->string('elim_desin_equip_com');
            $table->string('inv_etq_equip_com');
            $table->string('cable_vd_org');
            $table->string('bable_elec_org');

            //Sobre la adecuacion
            $table->string('mtto_general');
            $table->string('rack_piso');
            $table->string('rack_pared');
            $table->string('bandeja_equip_norack');
            $table->string('panel_dis');
            $table->string('conector_rojo');
            $table->string('conector_gris');
            $table->string('pathcord_rojo');
            $table->string('pathcord_azul');
            $table->string('pathcord_router_sw');
            $table->string('faceplate');
            $table->string('wallbox');
            $table->string('front_back_x');
            $table->string('front');
            $table->string('front_back_y');
            $table->string('regleta_tlf');
            $table->string('regleta_rack');
            $table->string('conectores_4pares');
            $table->string('conectores_5pares');
            $table->string('cable_multipar_tlf');
            $table->string('switch');
            $table->string('router');
            $table->string('multitoma');
            $table->string('ups');

            //Sobre la construcción
            $table->string('cant_punt_datos');
            $table->string('cant_punt_voz');

            
            $table->foreignId('cuarto_id')->constrained();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necesidads');
    }
};
