<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'vagas';
    protected $fillable = [
        'eventos_id',
        'cursos_id',
        'disciplinas_id',
        'quantidade'
    ];
    
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }


}
