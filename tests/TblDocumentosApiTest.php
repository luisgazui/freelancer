<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblDocumentosApiTest extends TestCase
{
    use MakeTblDocumentosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblDocumentos()
    {
        $tblDocumentos = $this->fakeTblDocumentosData();
        $this->json('POST', '/api/v1/tblDocumentos', $tblDocumentos);

        $this->assertApiResponse($tblDocumentos);
    }

    /**
     * @test
     */
    public function testReadTblDocumentos()
    {
        $tblDocumentos = $this->makeTblDocumentos();
        $this->json('GET', '/api/v1/tblDocumentos/'.$tblDocumentos->id);

        $this->assertApiResponse($tblDocumentos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblDocumentos()
    {
        $tblDocumentos = $this->makeTblDocumentos();
        $editedTblDocumentos = $this->fakeTblDocumentosData();

        $this->json('PUT', '/api/v1/tblDocumentos/'.$tblDocumentos->id, $editedTblDocumentos);

        $this->assertApiResponse($editedTblDocumentos);
    }

    /**
     * @test
     */
    public function testDeleteTblDocumentos()
    {
        $tblDocumentos = $this->makeTblDocumentos();
        $this->json('DELETE', '/api/v1/tblDocumentos/'.$tblDocumentos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblDocumentos/'.$tblDocumentos->id);

        $this->assertResponseStatus(404);
    }
}
