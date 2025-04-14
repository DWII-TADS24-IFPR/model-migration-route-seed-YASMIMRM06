// app/Models/Declaracao.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Declaracao extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'codigo',
        'conteudo',
        'aluno_id'
    ];

    protected $dates = ['deleted_at'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}