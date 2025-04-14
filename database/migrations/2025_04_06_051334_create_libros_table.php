<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::dropIfExists('libros'); // Eliminar la tabla si existe
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('editorial');
            $table->integer('isbn');
            $table->integer('anio');
            $table->integer('paginas');
            $table->string('genero');
            $table->string('idioma');
            $table->integer('numeroEjemplares');
            $table->integer('precio');
            $table->integer('estado');
            $table->string('portada')->nullable(); 
            $table->timestamps(); // Agrega automáticamente created_at y updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};

