<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Collaborator;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
        return [
            'collaborator_id' => Collaborator::factory(),
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'salary' => 2000000,
            'contract_type' => 'Indefinido',
        ];
    }
}
