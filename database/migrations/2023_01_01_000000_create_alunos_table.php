// database/migrations/2023_01_01_000000_create_alunos_table.php
<?php

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
            $table->string('cpf')->unique();
            $table->date('data_nascimento');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};