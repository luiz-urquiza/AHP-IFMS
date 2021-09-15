<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    protected $table = 'objetivo';

    protected $fillable = ['descricao'];

    public function criterios()
    {
        return $this->hasMany(Criterio::class);
    }
}
