<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'especialidade' => $this->faker->randomElement(['Cardiologista', 'Geriatra', 'Ginecologista', 'Urologista', 'Pediatra', 'Nefrologista', 'Endocrino']),
            'cidade_id' => $this->faker->randomElement([1,2,3,6,7,8])
        ];
    }
}
