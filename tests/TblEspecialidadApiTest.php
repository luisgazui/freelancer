<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblEspecialidadApiTest extends TestCase
{
    use MakeTblEspecialidadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblEspecialidad()
    {
        $tblEspecialidad = $this->fakeTblEspecialidadData();
        $this->json('POST', '/api/v1/tblEspecialidads', $tblEspecialidad);

        $this->assertApiResponse($tblEspecialidad);
    }

    /**
     * @test
     */
    public function testReadTblEspecialidad()
    {
        $tblEspecialidad = $this->makeTblEspecialidad();
        $this->json('GET', '/api/v1/tblEspecialidads/'.$tblEspecialidad->id);

        $this->assertApiResponse($tblEspecialidad->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblEspecialidad()
    {
        $tblEspecialidad = $this->makeTblEspecialidad();
        $editedTblEspecialidad = $this->fakeTblEspecialidadData();

        $this->json('PUT', '/api/v1/tblEspecialidads/'.$tblEspecialidad->id, $editedTblEspecialidad);

        $this->assertApiResponse($editedTblEspecialidad);
    }

    /**
     * @test
     */
    public function testDeleteTblEspecialidad()
    {
        $tblEspecialidad = $this->makeTblEspecialidad();
        $this->json('DELETE', '/api/v1/tblEspecialidads/'.$tblEspecialidad->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblEspecialidads/'.$tblEspecialidad->id);

        $this->assertResponseStatus(404);
    }
}
