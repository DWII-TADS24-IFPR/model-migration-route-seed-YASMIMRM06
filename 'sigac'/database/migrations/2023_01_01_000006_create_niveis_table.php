<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('niveis', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->unique();
            $table->string('sigla', 10)->unique();
            $table->text('descricao')->nullable();
            $table->integer('ordem')->default(0)->comment('Ordem de exibição');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveis');
    }
};