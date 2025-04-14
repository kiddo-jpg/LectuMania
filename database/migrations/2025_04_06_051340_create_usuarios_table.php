<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('usuarios'); // Eliminar la tabla si existe
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('rol')->default('usuario'); // 'usuario' o 'admin'
            $table->integer('estado')->default(1); // 1: activo, 0: inactivo
            $table->string('foto')->nullable(); // Ruta de la foto de perfil
            $table->timestamps(); // Agrega automáticamente created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};