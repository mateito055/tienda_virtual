<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       
    Schema::create('Rol', function (Blueprint $table) {
    $table->id('Id_rol');
    $table->enum('Nombre_Rol', ['Admin', 'Cliente', 'Fabrica']);
    });

    
    Schema::create('Usuario', function (Blueprint $table) {
    $table->id('Id_usuario');
    $table->unsignedBigInteger('Id_rol');
    $table->string('Email', 100)->unique();
    $table->string('Password_Hash', 255);
    $table->timestamp('Fecha_Registro')->useCurrent();
    
    $table->foreign('Id_rol')->references('Id_rol')->on('Rol');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Rol');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
