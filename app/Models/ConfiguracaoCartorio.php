<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracaoCartorio extends Model
{
    use HasFactory;
    
    protected $table = 'configuracao_cartorios';
    protected $fillable = [
        'coc_nome',
        'coc_comarca',
        'coc_registrador',
        'coc_endereco',
        'coc_cidade'
    ];


    public function certidao()
    {
        return $this->hasMany(Certidao2::class, 'id');
    }
}
