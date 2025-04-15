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
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->string('codigo', 20)->unique();
            $table->string('arquivo_path');
            $table->string('tipo_arquivo', 50)->comment('PDF, JPEG, PNG, etc');
            $table->date('data_emissao');
            $table->enum('status', ['pendente', 'aprovado', 'rejeitado'])->default('pendente');
            $table->text('observacoes')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(['aluno_id', 'curso_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('comprovantes');
    }
};