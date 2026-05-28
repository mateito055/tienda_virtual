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
    Schema::create('ORDEN_PRODUCCION', function (Blueprint $table) {
        $table->id('Id_orden');
        $table->unsignedBigInteger('Id_variante');
        $table->integer('Cantidad_Planificada');
        $table->integer('Cantidad_Producida_Real')->default(0);
        $table->date('Fecha_Inicio');
        $table->enum('Estado_Orden', ['Corte', 'Costura', 'Finalizado'])->default('Corte');
        $table->decimal('Costo_Total_Estimado', 10, 2)->nullable();
        
        $table->foreign('Id_variante')->references('Id_variante')->on('VARIANTE_PRODUCTO');
    });

    Schema::create('MOVIMIENTO_STOCK', function (Blueprint $table) {
        $table->id('Id_movimiento');
        $table->unsignedBigInteger('Id_variante')->nullable();
        $table->unsignedBigInteger('Id_insumo')->nullable();
        $table->enum('Tipo_Movimiento', ['Entrada', 'Salida']);
        $table->integer('Cantidad');
        $table->string('Motivo', 255)->nullable();
        $table->timestamp('Fecha_Movimiento')->useCurrent();
        
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