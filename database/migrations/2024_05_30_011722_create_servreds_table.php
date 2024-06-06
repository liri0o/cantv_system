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
        Schema::create('servreds', function (Blueprint $table) {
            $table->id();

            $table->string('equip_type');
            $table->string('equip_marca');
            $table->string('equip_modelo');
            $table->string('equip_serial');
            $table->string('code_inv');             
            $table->string('cant_puertos_dis');
            $table->string('cant_ports_oc');         
            $table->string('cant_ports_total');
            $table->string('description')->nullable();   
            $table->string('image_path');   
            
            $table->foreignId('cuarto_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servreds');
    }
};
