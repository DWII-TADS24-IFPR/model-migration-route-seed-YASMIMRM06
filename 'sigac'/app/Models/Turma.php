<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Turma - Turmas de cursos
 * 
 * @property int $id
 * @property int $curso_id
 * @property string $codigo
 * @property int $ano
 * @property int $semestre
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Turma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'curso_id',
        'codigo',
        'ano',
        'semestre'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relacionamento: Uma turma pertence a um curso
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    /**
     * Relacionamento: Uma turma tem muitos alunos (many-to-many)
     */
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class)
                    ->withTimestamps();
    }

    /**
     * Acessor para nome completo da turma
     */
    public function getNomeCompletoAttribute()
    {
        return "{$this->curso->sigla} {$this->ano}.{$this->semestre}";
    }
}