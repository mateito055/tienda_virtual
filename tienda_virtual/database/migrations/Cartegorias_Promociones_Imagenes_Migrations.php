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
    Schema::create('Categoria', function (Blueprint $table) {
        $table->id('Id_categoria');
        $table->string('Nombre', 50);
        $table->text('Descripcion')->nullable();
    });

    Schema::create('Promocion', function (Blueprint $table) {
        $table->id('Id_promocion');
        $table->string('Nombre', 50);
        $table->decimal('Porcentaje_Descuento', 5, 2);
        $table->timestamp('Fecha_Inicio')->useCurrent();
        $table->date('Fecha_Fin')->nullable();
        $table->boolean('Activa')->default(true);
    });

    Schema::create('IMAGEN_PRODUCTO', function (Blueprint $table) {
        $table->id('Id_imagen');
        $table->unsignedBigInteger('Id_producto');
        $table->string('URL_Imagen', 255);
        $table->boolean('Es_Portada')->default(false);
        
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

