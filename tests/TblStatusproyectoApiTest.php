<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblStatusproyectoApiTest extends TestCase
{
    use MakeTblStatusproyectoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblStatusproyecto()
    {
        $tblStatusproyecto = $this->fakeTblStatusproyectoData();
        $this->json('POST', '/api/v1/tblStatusproyectos', $tblStatusproyecto);

        $this->assertApiResponse($tblStatusproyecto);
    }

    /**
     * @test
     */
    public function testReadTblStatusproyecto()
    {
        $tblStatusproyecto = $this->makeTblStatusproyecto();
        $this->json('GET', '/api/v1/tblStatusproyectos/'.$tblStatusproyecto->id);

        $this->assertApiResponse($tblStatusproyecto->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblStatusproyecto()
    {
        $tblStatusproyecto = $this->makeTblStatusproyecto();
        $editedTblStatusproyecto = $this->fakeTblStatusproyectoData();

        $this->json('PUT', '/api/v1/tblStatusproyectos/'.$tblStatusproyecto->id, $editedTblStatusproyecto);

        $this->assertApiResponse($editedTblStatusproyecto);
    }

    /**
     * @test
     */
    public function testDeleteTblStatusproyecto()
    {
        $tblStatusproyecto = $this->makeTblStatusproyecto();
        $this->json('DELETE', '/api/v1/tblStatusproyectos/'.$tblStatusproyecto->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblStatusproyectos/'.$tblStatusproyecto->id);

        $this->assertResponseStatus(404);
    }
}
