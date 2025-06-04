<?php

namespace Tests\Unit;

use App\Models\Enterprise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpresasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testeo de get si devuelve status 200
     * @return void
     */
    public function test_get_empresa()
    {
        $response = $this->getJson('/api/enterprises');
        $response->assertStatus(200);
    }

}
