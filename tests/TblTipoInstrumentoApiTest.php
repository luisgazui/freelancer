<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTipoInstrumentoApiTest extends TestCase
{
    use MakeTblTipoInstrumentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->fakeTblTipoInstrumentoData();
        $this->json('POST', '/api/v1/tblTipoInstrumentos', $tblTipoInstrumento);

        $this->assertApiResponse($tblTipoInstrumento);
    }

    /**
     * @test
     */
    public function testReadTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->makeTblTipoInstrumento();
        $this->json('GET', '/api/v1/tblTipoInstrumentos/'.$tblTipoInstrumento->id);

        $this->assertApiResponse($tblTipoInstrumento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->makeTblTipoInstrumento();
        $editedTblTipoInstrumento = $this->fakeTblTipoInstrumentoData();

        $this->json('PUT', '/api/v1/tblTipoInstrumentos/'.$tblTipoInstrumento->id, $editedTblTipoInstrumento);

        $this->assertApiResponse($editedTblTipoInstrumento);
    }

    /**
     * @test
     */
    public function testDeleteTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->makeTblTipoInstrumento();
        $this->json('DELETE', '/api/v1/tblTipoInstrumentos/'.$tblTipoInstrumento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblTipoInstrumentos/'.$tblTipoInstrumento->id);

        $this->assertResponseStatus(404);
    }
}
