<?php

namespace App\Repositories\Eloquent;

use App\Models\Cidade;
use App\Repositories\Contracts\ICidadeRepository;

class CidadeRepository extends AbstractRepository implements ICidadeRepository
{
    protected $model = Cidade::class;
}
