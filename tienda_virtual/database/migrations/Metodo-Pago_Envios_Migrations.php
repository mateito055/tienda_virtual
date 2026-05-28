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
    Schema::create('METODO_ENVIO', function (Blueprint $table) {
        $table->id('Id_metodo_envio');
        $table->string('Nombre', 50);
        $table->decimal('Costo_Base', 10, 2);
        $table->boolean('Activo')->default(true);
    });

    Schema::create('METODO_PAGO', function (Blueprint $table) {
        $table->id('Id_metodo_pago');
        $table->string('Nombre', 50);
        $table->boolean('Activo')->default(true);
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