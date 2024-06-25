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
        Schema::create('circuitos', function (Blueprint $table) {
            $table->id();
            $table->string('circuito_num');
            $table->string('type');           
            $table->string('ipwan');
            $table->string('iplan_bloq');
            $table->string('ip_sw');
            $table->string('vlan');
            $table->string('ip_loopback');
            $table->string('description')->nullable();
            $table->string('short_description'); //listooo
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
        Schema::dropIfExists('circuitos');
    }
};
