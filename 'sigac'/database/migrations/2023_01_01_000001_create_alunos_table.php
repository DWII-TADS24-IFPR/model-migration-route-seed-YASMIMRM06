<?php
// database/migrations/2023_01_01_create_alunos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('matricula')->unique();
            $table->foreignId('curso_id')->constrained('cursos'); // Chave estrangeira
            $table->softDeletes(); // SoftDelete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};