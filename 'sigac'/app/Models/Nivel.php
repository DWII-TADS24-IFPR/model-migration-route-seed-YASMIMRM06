<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Nivel - Níveis de ensino (Técnico, Graduação, etc.)
 * 
 * @property int $id
 * @property string $nome
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Nivel extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];
    protected $dates = ['deleted_at'];

    /**
     * Relacionamento: Um nível tem muitos cursos
     */
    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}