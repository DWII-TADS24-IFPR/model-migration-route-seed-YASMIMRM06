<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes; // Habilita exclusão lógica

    /**
     * Campos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'nome',
        'sigla',
        'duracao',
        'descricao'
    ];

    /**
     * Campos que devem ser tratados como datas
     */
    protected $dates = ['deleted_at'];

    /**
     * Relacionamento: Um curso tem muitos alunos
     */
    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    /**
     * Acessor para a duração formatada
     */
    public function getDuracaoFormatadaAttribute()
    {
        return $this->duracao . ' semestres';
    }
}