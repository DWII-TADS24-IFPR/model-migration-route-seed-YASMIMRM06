<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Declaracao - Declarações geradas para alunos
 * 
 * @property int $id
 * @property int $aluno_id
 * @property string $codigo
 * @property string $conteudo
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Declaracao extends Model
{
    use SoftDeletes;

    // Status possíveis
    const STATUS_EMITIDA = 'emitida';
    const STATUS_CANCELADA = 'cancelada';

    protected $fillable = [
        'aluno_id',
        'codigo',
        'conteudo',
        'status'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relacionamento: Uma declaração pertence a um aluno
     */
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    /**
     * Gera um código único para a declaração
     */
    public static function gerarCodigo()
    {
        return 'DEC-' . strtoupper(uniqid());
    }
}