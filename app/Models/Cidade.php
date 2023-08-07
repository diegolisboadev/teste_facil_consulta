<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado'];

    protected $dates = ['created_at', 'updated_at'];

    public function medico(): HasMany
    {
        return $this->hasMany(Medico::class, null, 'id');
    }
}
