<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'especialidade', 'cidade_id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function cidades()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function pacientesMedicos()
    {
        return $this->belongsToMany(Paciente::class, relation: 'pacientesMedicos')->withPivot('id')->withTimestamps();
    }
}
