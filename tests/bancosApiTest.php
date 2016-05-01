<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class bancosApiTest extends TestCase
{
    use MakebancosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatebancos()
    {
        $bancos = $this->fakebancosData();
        $this->json('POST', '/api/v1/bancos', $bancos);

        $this->assertApiResponse($bancos);
    }

    /**
     * @test
     */
    public function testReadbancos()
    {
        $bancos = $this->makebancos();
        $this->json('GET', '/api/v1/bancos/'.$bancos->id);

        $this->assertApiResponse($bancos->toArray());
    }

    /**
     * @test
     */
    public function testUpdatebancos()
    {
        $bancos = $this->makebancos();
        $editedbancos = $this->fakebancosData();

        $this->json('PUT', '/api/v1/bancos/'.$bancos->id, $editedbancos);

        $this->assertApiResponse($editedbancos);
    }

    /**
     * @test
     */
    public function testDeletebancos()
    {
        $bancos = $this->makebancos();
        $this->json('DELETE', '/api/v1/bancos/'.$bancos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/bancos/'.$bancos->id);

        $this->assertResponseStatus(404);
    }
}
