<?php

namespace App\Services;

use App\DTO\MedicoDto;
use App\DTO\MedicoPacienteDto;
use App\Models\Medico;
use App\Repositories\Contracts\IMedicoRepository;
use App\Services\Contracts\IMedicoService;
use Illuminate\Support\Facades\DB;

class MedicoService implements IMedicoService
{
    public function __construct(private IMedicoRepository $medicoRepository)
    {
    }

    public function findAllMedicos()
    {
        return $this->medicoRepository->findAll();
    }

    public function findMedico(int $id)
    {
        return $this->medicoRepository->findById($id);
    }

    public function createMedico(MedicoDto $medicoDto)
    {
        return DB::transaction(function () use ($medicoDto): Medico {
            return $this->medicoRepository->create([
                'nome' => $medicoDto->nome,
                'especialidade' => $medicoDto->especialidade,
                'cidade_id' => $medicoDto->cidade
            ]);
        });
    }

    public function updateMedico(int $id, MedicoDto $medicoDto)
    {
    }

    public function deleteMedico(int $id)
    {
    }

    public function createPacientAndDoctor(MedicoPacienteDto $medicoPacienteDto, int $id)
    {
        return DB::transaction(function () use ($medicoPacienteDto, $id) {
            $medicoPaciente = $this->medicoRepository->findById($id);
            $resultado = $medicoPaciente->pacientes()->syncWithoutDetaching(
                $medicoPacienteDto->paciente_id
            );

            if (array_key_exists('attached', $resultado)) {
                return $this->medicoRepository->getRelationship('pacientes')
                    ->where('id', $id)->get()->map(fn ($item) => [
                        'medico' => [
                            'nome' => $item->nome,
                            'especialidade' => $item->especialidade,
                            'data_criacao' => $item->created_at->format('d/m/Y h:i:s'),
                            'data_atualizacao' => $item->updated_at->format('d/m/Y h:i:s'),
                            'paciente' => $item->pacientes()->orderByDesc('created_at')->limit(1)->get()
                                ->map(fn ($pivot) => [
                                    'nome' => $pivot->nome,
                                    'cpf' => $pivot->cpf,
                                    'celular' => $pivot->celular,
                                    'data_criacao' => $pivot->created_at->format('d/m/Y h:i:s'),
                                    'data_atualizacao' => $pivot->updated_at->format('d/m/Y h:i:s')
                                ])
                        ]
                    ]);
            } else {
                return response()->json(['Erro na Inserção! Tente novamente!'], 500);
            }
        });
    }

    public function getDoctorsByPacient(int $id)
    {
        return $this->medicoRepository->getRelationship('pacientes')->findOrFail($id)->pacientes;
    }
}
