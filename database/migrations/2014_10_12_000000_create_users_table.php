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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('useNombre');
            $table->string('useApellido');
            $table->integer('useNumDocumento');
            $table->string('useCorreo')->unique()->nullable();
            $table->string('usePassword')->nullable();
            $table->integer('useMesa');
            $table->enum('useRol', ['Usuario', 'Administrador', 'Votante']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
