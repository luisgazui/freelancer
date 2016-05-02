<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblDuracionApiTest extends TestCase
{
    use MakeTblDuracionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblDuracion()
    {
        $tblDuracion = $this->fakeTblDuracionData();
        $this->json('POST', '/api/v1/tblDuracions', $tblDuracion);

        $this->assertApiResponse($tblDuracion);
    }

    /**
     * @test
     */
    public function testReadTblDuracion()
    {
        $tblDuracion = $this->makeTblDuracion();
        $this->json('GET', '/api/v1/tblDuracions/'.$tblDuracion->id);

        $this->assertApiResponse($tblDuracion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblDuracion()
    {
        $tblDuracion = $this->makeTblDuracion();
        $editedTblDuracion = $this->fakeTblDuracionData();

        $this->json('PUT', '/api/v1/tblDuracions/'.$tblDuracion->id, $editedTblDuracion);

        $this->assertApiResponse($editedTblDuracion);
    }

    /**
     * @test
     */
    public function testDeleteTblDuracion()
    {
        $tblDuracion = $this->makeTblDuracion();
        $this->json('DELETE', '/api/v1/tblDuracions/'.$tblDuracion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblDuracions/'.$tblDuracion->id);

        $this->assertResponseStatus(404);
    }
}
