<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Documento - Documentos dos alunos
 * 
 * @property int $id
 * @property int $aluno_id
 * @property string $tipo
 * @property string $arquivo_path
 * @property \Illuminate\Support\Carbon $validade
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Documento extends Model
{
    use SoftDeletes;

    // Tipos de documentos
    const TIPO_RG = 'RG';
    const TIPO_CPF = 'CPF';
    const TIPO_HISTORICO = 'Histórico';
    const TIPO_COMPROVANTE = 'Comprovante';

    protected $fillable = [
        'aluno_id',
        'tipo',
        'arquivo_path',
        'validade'
    ];

    protected $dates = ['deleted_at', 'validade'];

    /**
     * Relacionamento: Um documento pertence a um aluno
     */
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    /**
     * Verifica se o documento está vencido
     */
    public function getVencidoAttribute()
    {
        return now()->gt($this->validade);
    }
}