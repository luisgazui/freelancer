<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblCategoriasApiTest extends TestCase
{
    use MakeTblCategoriasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblCategorias()
    {
        $tblCategorias = $this->fakeTblCategoriasData();
        $this->json('POST', '/api/v1/tblCategorias', $tblCategorias);

        $this->assertApiResponse($tblCategorias);
    }

    /**
     * @test
     */
    public function testReadTblCategorias()
    {
        $tblCategorias = $this->makeTblCategorias();
        $this->json('GET', '/api/v1/tblCategorias/'.$tblCategorias->id);

        $this->assertApiResponse($tblCategorias->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblCategorias()
    {
        $tblCategorias = $this->makeTblCategorias();
        $editedTblCategorias = $this->fakeTblCategoriasData();

        $this->json('PUT', '/api/v1/tblCategorias/'.$tblCategorias->id, $editedTblCategorias);

        $this->assertApiResponse($editedTblCategorias);
    }

    /**
     * @test
     */
    public function testDeleteTblCategorias()
    {
        $tblCategorias = $this->makeTblCategorias();
        $this->json('DELETE', '/api/v1/tblCategorias/'.$tblCategorias->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblCategorias/'.$tblCategorias->id);

        $this->assertResponseStatus(404);
    }
}
