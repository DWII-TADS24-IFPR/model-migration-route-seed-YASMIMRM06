// database/migrations/2023_01_01_000002_create_comprovantes_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comprovantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->integer('horas_validas');
            $table->string('arquivo');
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comprovantes');
    }
};