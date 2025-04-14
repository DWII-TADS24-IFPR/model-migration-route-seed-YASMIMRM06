<?php
// app/Models/Aluno.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importa SoftDelete

class Aluno extends Model
{
    use SoftDeletes; // Habilita SoftDelete

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome', 
        'email',
        'matricula',
        'curso_id'
    ];

    // Campos de data (incluindo deleted_at)
    protected $dates = ['deleted_at'];

    // Relacionamento com Curso (um aluno pertence a um curso)
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}