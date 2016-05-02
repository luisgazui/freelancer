<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblSancionesApiTest extends TestCase
{
    use MakeTblSancionesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblSanciones()
    {
        $tblSanciones = $this->fakeTblSancionesData();
        $this->json('POST', '/api/v1/tblSanciones', $tblSanciones);

        $this->assertApiResponse($tblSanciones);
    }

    /**
     * @test
     */
    public function testReadTblSanciones()
    {
        $tblSanciones = $this->makeTblSanciones();
        $this->json('GET', '/api/v1/tblSanciones/'.$tblSanciones->id);

        $this->assertApiResponse($tblSanciones->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblSanciones()
    {
        $tblSanciones = $this->makeTblSanciones();
        $editedTblSanciones = $this->fakeTblSancionesData();

        $this->json('PUT', '/api/v1/tblSanciones/'.$tblSanciones->id, $editedTblSanciones);

        $this->assertApiResponse($editedTblSanciones);
    }

    /**
     * @test
     */
    public function testDeleteTblSanciones()
    {
        $tblSanciones = $this->makeTblSanciones();
        $this->json('DELETE', '/api/v1/tblSanciones/'.$tblSanciones->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblSanciones/'.$tblSanciones->id);

        $this->assertResponseStatus(404);
    }
}
