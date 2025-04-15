<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->enum('tipo', ['rg', 'cpf', 'historico', 'certificado', 'outro']);
            $table->string('descricao', 100);
            $table->string('arquivo_path');
            $table->string('tipo_arquivo', 50);
            $table->date('data_envio');
            $table->enum('status', ['pendente', 'aprovado', 'rejeitado'])->default('pendente');
            $table->text('observacoes')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(['aluno_id', 'tipo']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos');
    }
};