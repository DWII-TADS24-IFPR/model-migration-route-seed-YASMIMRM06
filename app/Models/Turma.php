// app/Models/Turma.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'codigo',
        'ano',
        'curso_id'
    ];

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}