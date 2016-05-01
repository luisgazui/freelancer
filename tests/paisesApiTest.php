<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class paisesApiTest extends TestCase
{
    use MakepaisesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatepaises()
    {
        $paises = $this->fakepaisesData();
        $this->json('POST', '/api/v1/paises', $paises);

        $this->assertApiResponse($paises);
    }

    /**
     * @test
     */
    public function testReadpaises()
    {
        $paises = $this->makepaises();
        $this->json('GET', '/api/v1/paises/'.$paises->id);

        $this->assertApiResponse($paises->toArray());
    }

    /**
     * @test
     */
    public function testUpdatepaises()
    {
        $paises = $this->makepaises();
        $editedpaises = $this->fakepaisesData();

        $this->json('PUT', '/api/v1/paises/'.$paises->id, $editedpaises);

        $this->assertApiResponse($editedpaises);
    }

    /**
     * @test
     */
    public function testDeletepaises()
    {
        $paises = $this->makepaises();
        $this->json('DELETE', '/api/v1/paises/'.$paises->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paises/'.$paises->id);

        $this->assertResponseStatus(404);
    }
}
