<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    protected $table = 'eventos';
    protected $fillable = [
        'cursos_id',
        'nome',
        'descricao',
        'data_inicial',
        'data_final',
        'arquivos'
    ];

    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'eventos_id');
    }

}
