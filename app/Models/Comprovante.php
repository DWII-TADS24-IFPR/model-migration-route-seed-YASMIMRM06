// app/Models/Comprovante.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprovante extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'horas_validas',
        'arquivo',
        'aluno_id',
        'categoria_id'
    ];

    protected $dates = ['deleted_at'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}