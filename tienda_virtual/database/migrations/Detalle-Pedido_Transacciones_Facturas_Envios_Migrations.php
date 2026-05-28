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
    Schema::create('DETALLE_PEDIDO', function (Blueprint $table) {
        $table->id('Id_detalle');
        $table->unsignedBigInteger('Id_pedido');
        $table->unsignedBigInteger('Id_variante');
        $table->integer('Cantidad');
        $table->decimal('Precio_Unitario_Cobrado', 10, 2);
        $table->decimal('Costo_Unitario_Fabricacion', 10, 2)->nullable();
        
        $table->foreign('Id_pedido')->references('Id_pedido')->on('PEDIDO');
        $table->foreign('Id_variante')->references('Id_variante')->on('VARIANTE_PRODUCTO');
    });

    Schema::create('TRANSACCION_PAGO', function (Blueprint $table) {
        $table->id('Id_transaccion');
        $table->unsignedBigInteger('Id_pedido');
        $table->unsignedBigInteger('Id_metodo_pago');
        $table->decimal('Monto', 10, 2);
        $table->enum('Estado_Pago', ['Aprobado', 'Rechazado']);
        $table->string('Referencia_Pasarela', 100)->nullable();
        $table->timestamp('Fecha_Pago')->useCurrent();
        
        $table->foreign('Id_pedido')->references('Id_pedido')->on('PEDIDO');
        $table->foreign('Id_metodo_pago')->references('Id_metodo_pago')->on('METODO_PAGO');
    });

    Schema::create('FACTURA', function (Blueprint $table) {
        $table->id('Id_factura');
        $table->unsignedBigInteger('Id_pedido');
        $table->enum('Tipo_Comprobante', ['A', 'B', 'C']);
        $table->string('Nro_Comprobante', 50);
        $table->string('CUIT_Receptor', 13);
        $table->date('Fecha_Emision');
        
        $table->foreign('Id_pedido')->references('Id_pedido')->on('PEDIDO');
    });

    Schema::create('ENVIO', function (Blueprint $table) {
        $table->id('Id_envio');
        $table->unsignedBigInteger('Id_pedido');
        $table->string('Empresa_Logistica', 100);
        $table->string('Numero_Tracking', 100)->nullable();
        $table->string('Estado_Envio', 50)->nullable();
        $table->date('Fecha_Despacho')->nullable();
        
        $table->foreign('Id_pedido')->references('Id_pedido')->on('PEDIDO');
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