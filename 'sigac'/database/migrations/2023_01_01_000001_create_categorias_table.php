<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();
            $table->text('descricao')->nullable();
            $table->string('icone', 50)->nullable()->comment('Classe do ícone (ex: Font Awesome)');
            $table->string('cor', 7)->default('#6c757d')->comment('Código hexadecimal da cor');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};