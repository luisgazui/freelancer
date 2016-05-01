<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class experienciaApiTest extends TestCase
{
    use MakeexperienciaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateexperiencia()
    {
        $experiencia = $this->fakeexperienciaData();
        $this->json('POST', '/api/v1/experiencias', $experiencia);

        $this->assertApiResponse($experiencia);
    }

    /**
     * @test
     */
    public function testReadexperiencia()
    {
        $experiencia = $this->makeexperiencia();
        $this->json('GET', '/api/v1/experiencias/'.$experiencia->id);

        $this->assertApiResponse($experiencia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateexperiencia()
    {
        $experiencia = $this->makeexperiencia();
        $editedexperiencia = $this->fakeexperienciaData();

        $this->json('PUT', '/api/v1/experiencias/'.$experiencia->id, $editedexperiencia);

        $this->assertApiResponse($editedexperiencia);
    }

    /**
     * @test
     */
    public function testDeleteexperiencia()
    {
        $experiencia = $this->makeexperiencia();
        $this->json('DELETE', '/api/v1/experiencias/'.$experiencia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/experiencias/'.$experiencia->id);

        $this->assertResponseStatus(404);
    }
}
