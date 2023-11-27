<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    
    protected $table = 'alunos';
    protected $fillable = [
        'user_id',
        'endereco',
        'rg',
        'cpf',
        'matricula',
        'telefone',
        'historico',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inscricoes()
{
    return $this->hasMany(Inscricao::class);
}
}
