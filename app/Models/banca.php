<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    protected $fillable = ['nome', 'tcc_id'];

    public function tcc()
    {
        return $this->belongsTo(Tcc::class);
    }
}
