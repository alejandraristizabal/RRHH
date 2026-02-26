<?php

namespace Tests\Feature\Collaborators;

use Tests\TestCase;
use App\Models\User;
use App\Models\Collaborator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear el rol necesario para las pruebas
        Role::create(['name' => 'Gestor RRHH']);
    }

    /** @test */
    public function se_puede_crear_un_colaborador_con_datos_validos()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $data = [
            'first_name' => 'Aleja',
            'last_name' => 'Aristizabal',
            'document_type' => 'CC',
            'document_number' => '12345678',
            'birth_date' => '2000-05-10',
            'email' => 'aleja@test.com',
            'phone_number' => '3001234567',
            'address' => 'Calle 123',
        ];

        $response = $this->post('/collaborators', $data);

        $response->assertStatus(302); 

        $this->assertDatabaseHas('collaborators', [
            'document_number' => '12345678',
            'email' => 'aleja@test.com',
        ]);
    }

    public function test_rechazo_de_creacion_por_duplicados()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        Collaborator::factory()->create([
            'email' => 'aleja@test.com',
            'document_number' => '12345678',
        ]);

        $data = [
            'first_name' => 'Aleja',
            'last_name' => 'Aristizabal',
            'document_type' => 'CC',
            'document_number' => '12345678', 
            'birth_date' => '2000-05-10',
            'email' => 'aleja@test.com',    
            'phone_number' => '3001234567',
            'address' => 'Calle 123',
        ];

        $response = $this->post('/collaborators', $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'email',
            'document_number',
        ]);

        $this->assertDatabaseCount('collaborators', 1);
    }

    public function se_puede_actualizar_un_colaborador()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $response = $this->put("/collaborators/{$collaborator->id}", [
            'first_name' => 'Actualizado',
            'last_name' => $collaborator->last_name,
            'document_type' => $collaborator->document_type,
            'document_number' => $collaborator->document_number,
            'birth_date' => $collaborator->birth_date->format('Y-m-d'),
            'email' => $collaborator->email,
            'phone_number' => $collaborator->phone_number,
            'address' => $collaborator->address,
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('collaborators', [
            'id' => $collaborator->id,
            'first_name' => 'Actualizado',
        ]);
    }

    /** @test */
    public function se_puede_obtener_el_listado_de_colaboradores()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        Collaborator::factory()->count(3)->create();

        $response = $this->get('/collaborators');

        $response->assertStatus(200);

        $this->assertEquals(3, Collaborator::count());
    }

    /** @test */
    public function se_puede_eliminar_un_colaborador_con_soft_delete()
    {
        $user = User::factory()->create();
        $user->assignRole('Gestor RRHH');
        $this->actingAs($user);

        $collaborator = Collaborator::factory()->create();

        $response = $this->delete("/collaborators/{$collaborator->id}");

        $response->assertStatus(302);

        $this->assertSoftDeleted('collaborators', [
            'id' => $collaborator->id,
        ]);
    }
}