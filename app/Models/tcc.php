<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tcc extends Model
{
    protected $fillable = [
        'titulo', 'aluno', 'orientador', 'paginas', 'data', 'hora', 'resumo', 'palavras_chave', 'arquivo_pdf'
    ];

    public function bancas()
    {
        return $this->hasMany(Banca::class);
    }
}
