<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado'];

    protected $dates = ['created_at', 'updated_at'];

    public function medico(): HasOne
    {
        return $this->hasOne(Medico::class, null, 'id');
    }
}
