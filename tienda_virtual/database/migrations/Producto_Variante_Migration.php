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
    Schema::create('Producto', function (Blueprint $table) {
        $table->id('Id_producto');
        $table->unsignedBigInteger('Id_categoria');
        $table->unsignedBigInteger('Id_promocion')->nullable();
        $table->string('Nombre', 100);
        $table->text('Descripcion')->nullable();
        $table->decimal('Porcentaje_Ganancia', 5, 2)->nullable();
        $table->boolean('Activo')->default(true);
        $table->boolean('Destacado')->default(false);
        
        $table->foreign('Id_categoria')->references('Id_categoria')->on('Categoria');
        $table->foreign('Id_promocion')->references('Id_promocion')->on('Promocion');
    });

    Schema::create('VARIANTE_PRODUCTO', function (Blueprint $table) {
        $table->id('Id_variante');
        $table->unsignedBigInteger('Id_producto');
        $table->string('SKU', 50)->unique();
        $table->string('Talle', 20)->nullable();
        $table->string('Color', 30)->nullable();
        $table->decimal('Precio_Venta', 10, 2);
        $table->integer('Stock_Actual')->default(0);
        
        $table->foreign('Id_producto')->references('Id_producto')->on('Producto');
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
