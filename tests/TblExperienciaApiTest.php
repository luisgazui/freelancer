<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblExperienciaApiTest extends TestCase
{
    use MakeTblExperienciaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblExperiencia()
    {
        $tblExperiencia = $this->fakeTblExperienciaData();
        $this->json('POST', '/api/v1/tblExperiencias', $tblExperiencia);

        $this->assertApiResponse($tblExperiencia);
    }

    /**
     * @test
     */
    public function testReadTblExperiencia()
    {
        $tblExperiencia = $this->makeTblExperiencia();
        $this->json('GET', '/api/v1/tblExperiencias/'.$tblExperiencia->id);

        $this->assertApiResponse($tblExperiencia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblExperiencia()
    {
        $tblExperiencia = $this->makeTblExperiencia();
        $editedTblExperiencia = $this->fakeTblExperienciaData();

        $this->json('PUT', '/api/v1/tblExperiencias/'.$tblExperiencia->id, $editedTblExperiencia);

        $this->assertApiResponse($editedTblExperiencia);
    }

    /**
     * @test
     */
    public function testDeleteTblExperiencia()
    {
        $tblExperiencia = $this->makeTblExperiencia();
        $this->json('DELETE', '/api/v1/tblExperiencias/'.$tblExperiencia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblExperiencias/'.$tblExperiencia->id);

        $this->assertResponseStatus(404);
    }
}
