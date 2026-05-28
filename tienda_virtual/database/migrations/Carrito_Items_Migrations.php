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
    Schema::create('CARRITO', function (Blueprint $table) {
        $table->id('Id_carrito');
        $table->unsignedBigInteger('Id_cliente');
        $table->timestamp('Fecha_Creacion')->useCurrent();
        
        $table->foreign('Id_cliente')->references('Id_cliente')->on('Cliente');
    });

    Schema::create('ITEM_CARRITO', function (Blueprint $table) {
        $table->id('Id_item_carrito');
        $table->unsignedBigInteger('Id_carrito');
        $table->unsignedBigInteger('Id_variante');
        $table->integer('Cantidad'); 
        
        $table->foreign('Id_carrito')->references('Id_carrito')->on('CARRITO')->onDelete('cascade');
        $table->foreign('Id_variante')->references('Id_variante')->on('VARIANTE_PRODUCTO');

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