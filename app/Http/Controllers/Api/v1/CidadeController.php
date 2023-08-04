<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\CidadeDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use App\Http\Resources\CidadesCollection;
use App\Http\Resources\CidadesResource;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function __construct(private CidadeService $cidadeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CidadesCollection($this->cidadeService->findAllCidades());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CidadeRequest $request)
    {
        return new CidadesResource($this->cidadeService->createCidade(
            new CidadeDto($request->nome, $request->estado)
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new CidadesResource($this->cidadeService->findCidade($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return new CidadesResource(
            $this->cidadeService->updateCidade(
                $id,
                new CidadeDto($request->nome, $request->estado)
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
