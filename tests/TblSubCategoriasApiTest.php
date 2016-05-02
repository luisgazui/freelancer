<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblSubCategoriasApiTest extends TestCase
{
    use MakeTblSubCategoriasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblSubCategorias()
    {
        $tblSubCategorias = $this->fakeTblSubCategoriasData();
        $this->json('POST', '/api/v1/tblSubCategorias', $tblSubCategorias);

        $this->assertApiResponse($tblSubCategorias);
    }

    /**
     * @test
     */
    public function testReadTblSubCategorias()
    {
        $tblSubCategorias = $this->makeTblSubCategorias();
        $this->json('GET', '/api/v1/tblSubCategorias/'.$tblSubCategorias->id);

        $this->assertApiResponse($tblSubCategorias->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblSubCategorias()
    {
        $tblSubCategorias = $this->makeTblSubCategorias();
        $editedTblSubCategorias = $this->fakeTblSubCategoriasData();

        $this->json('PUT', '/api/v1/tblSubCategorias/'.$tblSubCategorias->id, $editedTblSubCategorias);

        $this->assertApiResponse($editedTblSubCategorias);
    }

    /**
     * @test
     */
    public function testDeleteTblSubCategorias()
    {
        $tblSubCategorias = $this->makeTblSubCategorias();
        $this->json('DELETE', '/api/v1/tblSubCategorias/'.$tblSubCategorias->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblSubCategorias/'.$tblSubCategorias->id);

        $this->assertResponseStatus(404);
    }
}
