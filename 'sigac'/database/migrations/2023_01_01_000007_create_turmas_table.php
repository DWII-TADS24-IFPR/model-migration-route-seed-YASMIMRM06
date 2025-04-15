<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            $table->string('codigo', 20)->unique();
            $table->string('nome', 100);
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->time('horario')->nullable();
            $table->integer('vagas_totais');
            $table->integer('vagas_disponiveis');
            $table->enum('status', ['planejada', 'ativa', 'concluida', 'cancelada'])->default('planejada');
            $table->text('local')->nullable();
            $table->text('observacoes')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(['curso_id', 'data_inicio']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
};
