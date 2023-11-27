<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    
    protected $table = 'disciplinas';
    protected $fillable = ['nome'];

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'disciplinas_id');
    }
}
