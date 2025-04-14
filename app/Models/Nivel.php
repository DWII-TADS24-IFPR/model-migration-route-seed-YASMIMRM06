// app/Models/Nivel.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    protected $dates = ['deleted_at'];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}