// app/Models/Documento.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tipo',
        'arquivo',
        'aluno_id'
    ];

    protected $dates = ['deleted_at'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}