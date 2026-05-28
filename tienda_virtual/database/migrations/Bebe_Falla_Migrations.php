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
    // database/migrations/xxxx_create_bebe_table.php
    Schema::create('Bebe', function (Blueprint $table) {
        $table->id('Id_bebe');
        $table->unsignedBigInteger('Id_cliente');
        $table->string('Nombre', 50);
        $table->date('Fecha_Nacimiento');
        $table->string('Genero', 20)->nullable();
        
        $table->foreign('Id_cliente')->references('Id_cliente')->on('Cliente');
    });

    // database/migrations/xxxx_create_falla_produccion_table.php
    Schema::create('FALLA_PRODUCCION', function (Blueprint $table) {
        $table->id('Id_falla');
        $table->unsignedBigInteger('Id_orden');
        $table->integer('Cantidad_Fallada');
        $table->string('Motivo_Falla', 255)->nullable();
        $table->decimal('Costo_Perdido', 10, 2)->nullable();
        
        $table->foreign('Id_orden')->references('Id_orden')->on('ORDEN_PRODUCCION');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};