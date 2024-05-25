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
        Schema::create('servozs', function (Blueprint $table) {
            $table->id();

            $table->string('tlf_num');
            $table->string('access_type');
            $table->string('tlf_serial');
            $table->string('tlf_inventario');
            $table->string('tlf_marca');
            $table->string('tlf_modelo');

            $table->string('cant_tlf_fxb');
            $table->string('cant_tlf_line');           

           /*  $table->foreignId('cuarto_id')->constrained(); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servozs');
    }
};
