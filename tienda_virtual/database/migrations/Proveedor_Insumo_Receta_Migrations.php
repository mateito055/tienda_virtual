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
    Schema::create('PROVEEDOR', function (Blueprint $table) {
        $table->id('Id_proveedor');
        $table->string('Nombre_Empresa', 100);
        $table->string('Contacto', 100)->nullable();
        $table->string('Telefono', 20)->nullable();
    });

    Schema::create('INSUMO', function (Blueprint $table) {
        $table->id('Id_insumo');
        $table->unsignedBigInteger('Id_proveedor');
        $table->string('Nombre', 100);
        $table->string('Unidad_Medida', 20)->nullable();
        $table->decimal('Costo_Actual', 10, 2);
        $table->decimal('Stock_Disponible', 10, 2)->default(0);
        
        $table->foreign('Id_proveedor')->references('Id_proveedor')->on('PROVEEDOR');
    });

    Schema::create('RECETA_PRODUCCION', function (Blueprint $table) {
        $table->id('Id_receta');
        $table->unsignedBigInteger('Id_variante');
        $table->unsignedBigInteger('Id_insumo');
        $table->decimal('Cantidad_Necesaria', 10, 2);
        
        $table->foreign('Id_variante')->references('Id_variante')->on('VARIANTE_PRODUCTO');
        $table->foreign('Id_insumo')->references('Id_insumo')->on('INSUMO');
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