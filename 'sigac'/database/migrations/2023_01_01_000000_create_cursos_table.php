<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('sigla', 10)->unique();
            $table->integer('duracao');
            $table->text('descricao')->nullable();
            $table->softDeletes(); // Adiciona coluna deleted_at para SoftDelete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};