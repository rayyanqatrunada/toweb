<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Program;
use App\Models\Competency;

class AcademicModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_program_and_competency()
    {
        $program = Program::create([
            'name' => 'Teknik Kendaraan Ringan',
            'slug' => 'tkr',
            'description' => 'Program TKR'
        ]);

        $competency = Competency::create([
            'program_id' => $program->id,
            'name' => 'Mesin Otomotif',
            'slug' => 'mesin-otomotif',
        ]);

        $this->assertDatabaseHas('programs', ['slug' => 'tkr']);
        $this->assertDatabaseHas('competencies', ['slug' => 'mesin-otomotif']);
        $this->assertEquals($competency->program->name, 'Teknik Kendaraan Ringan');
    }
}
