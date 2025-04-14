<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model Comprovante - Registra as atividades complementares dos alunos
 * 
 * @property int $id
 * @property int $aluno_id
 * @property int $categoria_id
 * @property string $descricao
 * @property int $horas_validas
 * @property string $status
 * @property string $arquivo_path
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Comprovante extends Model
{
    use SoftDeletes;

    // Status possíveis
    const STATUS_PENDENTE = 'pendente';
    const STATUS_APROVADO = 'aprovado';
    const STATUS_REJEITADO = 'rejeitado';

    protected $fillable = [
        'aluno_id',
        'categoria_id',
        'descricao',
        'horas_validas',
        'status',
        'arquivo_path'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relacionamento: Um comprovante pertence a um aluno
     */
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    /**
     * Relacionamento: Um comprovante pertence a uma categoria
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Acessor para status formatado
     */
    public function getStatusFormatadoAttribute()
    {
        $statuses = [
            self::STATUS_PENDENTE => 'Pendente',
            self::STATUS_APROVADO => 'Aprovado',
            self::STATUS_REJEITADO => 'Rejeitado'
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }
}