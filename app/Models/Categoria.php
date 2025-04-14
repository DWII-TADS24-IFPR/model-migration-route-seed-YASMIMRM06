// app/Models/Categoria.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'horas_maximas'
    ];

    protected $dates = ['deleted_at'];

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }
}