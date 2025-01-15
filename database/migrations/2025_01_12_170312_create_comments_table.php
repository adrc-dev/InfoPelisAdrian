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
        Schema::create('comments', function (Blueprint $table) {
            // Se utiliza 'integer' en lugar de 'foreignId' porque la base de datos espera un tipo 'integer'.
            // 'foreignId' crea una columna de tipo 'bigInteger' con una restricción de clave externa (foreign key),
            // lo que causa error ya que el tipo de datos no coincide.
            $table->id();
            $table->integer('movie_id');
            $table->foreign('movie_id')->references('id')->on('movie')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('post');
            $table->decimal('rating', 3, 1);
            $table->boolean('visibility')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
