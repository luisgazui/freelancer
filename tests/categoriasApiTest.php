<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class categoriasApiTest extends TestCase
{
    use MakecategoriasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecategorias()
    {
        $categorias = $this->fakecategoriasData();
        $this->json('POST', '/api/v1/categorias', $categorias);

        $this->assertApiResponse($categorias);
    }

    /**
     * @test
     */
    public function testReadcategorias()
    {
        $categorias = $this->makecategorias();
        $this->json('GET', '/api/v1/categorias/'.$categorias->id);

        $this->assertApiResponse($categorias->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecategorias()
    {
        $categorias = $this->makecategorias();
        $editedcategorias = $this->fakecategoriasData();

        $this->json('PUT', '/api/v1/categorias/'.$categorias->id, $editedcategorias);

        $this->assertApiResponse($editedcategorias);
    }

    /**
     * @test
     */
    public function testDeletecategorias()
    {
        $categorias = $this->makecategorias();
        $this->json('DELETE', '/api/v1/categorias/'.$categorias->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/categorias/'.$categorias->id);

        $this->assertResponseStatus(404);
    }
}
