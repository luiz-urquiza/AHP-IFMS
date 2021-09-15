<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;

    protected $table = 'criterio';

    protected $fillable = ['peso', 'descricao'];

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class);
    }
}
