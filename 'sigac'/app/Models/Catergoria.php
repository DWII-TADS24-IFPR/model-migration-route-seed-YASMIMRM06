<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Categoria - Representa as categorias de atividades complementares
 * 
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property int $horas_maximas
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Categoria extends Model
{
    use SoftDeletes;

    /**
     * Campos que podem ser preenchidos em massa (Mass Assignment)
     */
    protected $fillable = [
        'nome',
        'descricao',
        'horas_maximas'
    ];

    /**
     * Campos que devem ser tratados como datas
     */
    protected $dates = ['deleted_at'];

    /**
     * Relacionamento: Uma categoria tem muitos comprovantes
     */
    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }

    /**
     * Acessor para horas máximas formatadas
     */
    public function getHorasMaximasFormatadasAttribute()
    {
        return "{$this->horas_maximas} horas";
    }
}