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
            $table->string('enlace_type');           
            $table->string('enlace_ipwan');
            $table->string('enlace_iplan_bloq');
            $table->string('meth_ip_sw');
            $table->string('meth_vlan');
            $table->string('meth_ip_loopback');
            $table->string('meth_ip_wan');
            
            /* $table->foreignId('cuarto_id')->constrained(); */
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
