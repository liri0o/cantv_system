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
        Schema::create('cuartos', function (Blueprint $table) {
            $table->id();
            //info general
            $table->string('name');
            $table->string('jefe');            
            $table->string('status');            
            $table->string('description')->nullable();  //listo          
            $table->string('photo_1');
            $table->string('photo_2');           

            //servoz info
            $table->unsignedInteger('cant_tlf_total_fxb');
            $table->unsignedInteger('cant_tlf_oc_fxb');
            $table->unsignedInteger('cant_tlf_dis_fxb');
            $table->unsignedInteger('cant_tlf_line');   
            
            $table->foreignId('localidad_id')->constrained();                      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuartos');
    }
};

//servred
