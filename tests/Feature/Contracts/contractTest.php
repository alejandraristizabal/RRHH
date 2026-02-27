<?php

namespace Tests\Feature\Contracts;

use Tests\TestCase;
use App\Models\User;
use App\Models\Collaborator;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class ContractTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear rol necesario
        Role::create(['name' => 'Gestor RRHH']);
    }

    /** @test */
    public function se_puede_crear_un_contrato_asociado_a_un_colaborador_existente()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $data = [
            'collaborator_id' => $collaborator->id,
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'salary' => 2500000,
            'contract_type' => 'Indefinido',
        ];

        $response = $this->post('/contracts', $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'collaborator_id' => $collaborator->id,
            'salary' => 2500000,
        ]);
    }

    /** @test */
    public function no_se_puede_crear_un_contrato_para_un_colaborador_inexistente()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $data = [
            'collaborator_id' => 999, // ID que no existe
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'salary' => 2500000,
            'contract_type' => 'Indefinido',
        ];

        $response = $this->post('/contracts', $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['collaborator_id']);

        $this->assertDatabaseCount('contracts', 0);
    }

    /** @test */
    public function los_campos_fecha_y_salario_son_validados_correctamente()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $data = [
            'collaborator_id' => $collaborator->id,
            'start_date' => 'fecha_invalida',
            'end_date' => '2023-01-01', // menor que start_date esperado
            'salary' => 'no_es_numero',
            'contract_type' => 'Indefinido',
        ];

        $response = $this->post('/contracts', $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'start_date',
            'salary',
        ]);

        $this->assertDatabaseCount('contracts', 0);
    }

    /** @test */
    public function se_puede_actualizar_un_contrato_existente()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $contract = Contract::factory()->create();

        $response = $this->put("/contracts/{$contract->id}", [
            'collaborator_id' => $contract->collaborator_id,
            'start_date' => $contract->start_date->format('Y-m-d'),
            'end_date' => $contract->end_date->format('Y-m-d'),
            'salary' => 3000000,
            'contract_type' => $contract->contract_type,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'salary' => 3000000,
        ]);
    }
}