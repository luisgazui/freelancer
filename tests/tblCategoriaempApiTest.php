<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tblCategoriaempApiTest extends TestCase
{
    use MaketblCategoriaempTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetblCategoriaemp()
    {
        $tblCategoriaemp = $this->faketblCategoriaempData();
        $this->json('POST', '/api/v1/tblCategoriaemps', $tblCategoriaemp);

        $this->assertApiResponse($tblCategoriaemp);
    }

    /**
     * @test
     */
    public function testReadtblCategoriaemp()
    {
        $tblCategoriaemp = $this->maketblCategoriaemp();
        $this->json('GET', '/api/v1/tblCategoriaemps/'.$tblCategoriaemp->id);

        $this->assertApiResponse($tblCategoriaemp->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetblCategoriaemp()
    {
        $tblCategoriaemp = $this->maketblCategoriaemp();
        $editedtblCategoriaemp = $this->faketblCategoriaempData();

        $this->json('PUT', '/api/v1/tblCategoriaemps/'.$tblCategoriaemp->id, $editedtblCategoriaemp);

        $this->assertApiResponse($editedtblCategoriaemp);
    }

    /**
     * @test
     */
    public function testDeletetblCategoriaemp()
    {
        $tblCategoriaemp = $this->maketblCategoriaemp();
        $this->json('DELETE', '/api/v1/tblCategoriaemps/'.$tblCategoriaemp->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblCategoriaemps/'.$tblCategoriaemp->id);

        $this->assertResponseStatus(404);
    }
}
