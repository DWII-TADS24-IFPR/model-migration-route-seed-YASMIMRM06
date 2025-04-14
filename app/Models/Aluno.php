// app/Models/Aluno.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'cpf',
        'data_nascimento',
        'curso_id'
    ];

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }

    public function declaracoes()
    {
        return $this->hasMany(Declaracao::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}