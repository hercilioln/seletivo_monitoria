<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricoes';
    protected $fillable = [
        'eventos_id',
        'vagas_id',
        'alunos_id',
        'status'
    ];
    
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class, 'vagas_id');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'alunos_id');
    }
}
