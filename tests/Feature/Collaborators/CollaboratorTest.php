<?php

namespace Tests\Feature\Collaborators;

use Tests\TestCase;
use App\Models\Collaborator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_un_colaborador_con_datos_validos()
    {
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

        $collaborator = Collaborator::create($data);

        $this->assertDatabaseHas('collaborators', [
            'document_number' => '12345678',
        ]);
    }
}