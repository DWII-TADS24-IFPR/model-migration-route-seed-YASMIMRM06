// database/migrations/2023_01_01_000004_create_declaracoes_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('declaracoes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->text('conteudo');
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('declaracoes');
    }
};