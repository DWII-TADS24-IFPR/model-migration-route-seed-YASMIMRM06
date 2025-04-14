// database/migrations/2023_01_01_000003_create_cursos_table.php
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
            $table->string('nome');
            $table->string('sigla');
            $table->integer('total_horas');
            $table->foreignId('nivel_id')->constrained('niveis');
            $table->foreignId('eixo_id')->constrained('eixos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};