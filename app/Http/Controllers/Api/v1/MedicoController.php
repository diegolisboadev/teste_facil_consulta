<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\MedicoDto;
use App\DTO\MedicoPacienteDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoPacienteRequest;
use App\Http\Requests\MedicoRequest;
use App\Http\Resources\MedicoCollection;
use App\Http\Resources\MedicoResource;
use App\Http\Resources\PacienteCollection;
use App\Services\MedicoService;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct(private MedicoService $medicoService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MedicoCollection($this->medicoService->findAllMedicos());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicoRequest $request)
    {
        return new MedicoResource($this->medicoService->createMedico(
            new MedicoDto($request->nome, $request->especialidade, $request->cidade)
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Armazenar todos pacientes com os médicos
     */
    public function storeMedicosPacientes(MedicoPacienteRequest $request, int $id_medico)
    {
        return $this->medicoService->createPacientAndDoctor(
            new MedicoPacienteDto($request->medico_id, $request->paciente_id),
            $id_medico
        );
    }

    /**
     * Retorna todas os medicos de uma determinada cidade
     */
    public function showMedicoPacientes(int $id_medico)
    {
        return new PacienteCollection($this->medicoService->getDoctorsByPacient($id_medico));
    }
}
