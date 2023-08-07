<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'celular'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function medicosPacientes()
    {
        return $this->belongsToMany(Medico::class, relation: 'medicosPacientes')->withPivot('id')->withTimestamps();;
    }
}
