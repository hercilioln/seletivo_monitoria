<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escrevente extends Model
{
    use HasFactory;
    protected $table = 'escreventes';
    protected $fillable = ['esc_nome'];

    public function certidao()
    {
        return $this->hasMany(Certidao2::class, 'id');
    }
}
