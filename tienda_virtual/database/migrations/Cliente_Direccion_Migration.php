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
            Schema::create('Cliente', function (Blueprint $table) {
        $table->id('Id_cliente');
        $table->unsignedBigInteger('Id_usuario');
        $table->string('Nombre', 50);
        $table->string('Apellido', 50);
        $table->string('DNI_CUIT', 20)->unique();
        $table->string('Telefono', 20)->nullable();
        $table->enum('Condicion_IVA', ['Consumidor Final', 'Resp. Inscripto']);
        
        $table->foreign('Id_usuario')->references('Id_usuario')->on('Usuario');
    });

    Schema::create('Direccion', function (Blueprint $table) {
        $table->id('Id_direccion');
        $table->unsignedBigInteger('Id_cliente');
        $table->string('Calle_Numero', 100);
        $table->string('Ciudad', 50);
        $table->string('Provincia', 50);
        $table->string('Codigo_Postal', 20)->nullable();
        $table->enum('Tipo', ['Envio', 'Facturacion']);
        
        $table->foreign('Id_cliente')->references('Id_cliente')->on('Cliente');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Id_cliente');
        Schema::dropIfExists('Nombre');
        Schema::dropIfExists('Apellido');
        Schema::dropIfExists('DNI_CUIT');
        Schema::dropIfExists('Telefono');
        Schema::dropIfExists('Condicion_IVA');
        Schema::dropIfExists('Id_direccion');
        Schema::dropIfExists('Calle_Numero');
        Schema::dropIfExists('Ciudad');
        Schema::dropIfExists('Provincia');
        Schema::dropIfExists('Codigo_Postal');
        Schema::dropIfExists('Tipo');
    }
};
