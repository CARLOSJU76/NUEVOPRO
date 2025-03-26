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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre'); // Tipo string para el nombre
        $table->foreignId('id_tipo')->constrained()->onDelete('cascade'); // Supongamos que id_tipo es una clave foránea
        $table->decimal('precio', 12, 2); // Tipo decimal para el precio (máximo 8 dígitos, 2 decimales)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
