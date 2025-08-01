<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('id_pessoa'); // int8
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf')->unique();
            $table->enum('tipo', ['APICULTOR', 'RESPONSAVEL']); // exemplo de enum
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('usuario_id')->references('id_usuarios')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
