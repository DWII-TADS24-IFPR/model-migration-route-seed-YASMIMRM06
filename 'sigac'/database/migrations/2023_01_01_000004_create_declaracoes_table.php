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
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->string('codigo', 20)->unique();
            $table->date('data_emissao');
            $table->date('data_validade')->nullable();
            $table->enum('status', ['emitida', 'pendente', 'cancelada'])->default('pendente');
            $table->string('hash_validacao', 64)->unique()->comment('Hash para validação online');
            $table->text('observacoes')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(['aluno_id', 'curso_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('declaracoes');
    }
};