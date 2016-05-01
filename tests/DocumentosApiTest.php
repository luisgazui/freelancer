<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentosApiTest extends TestCase
{
    use MakeDocumentosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDocumentos()
    {
        $documentos = $this->fakeDocumentosData();
        $this->json('POST', '/api/v1/documentos', $documentos);

        $this->assertApiResponse($documentos);
    }

    /**
     * @test
     */
    public function testReadDocumentos()
    {
        $documentos = $this->makeDocumentos();
        $this->json('GET', '/api/v1/documentos/'.$documentos->id);

        $this->assertApiResponse($documentos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDocumentos()
    {
        $documentos = $this->makeDocumentos();
        $editedDocumentos = $this->fakeDocumentosData();

        $this->json('PUT', '/api/v1/documentos/'.$documentos->id, $editedDocumentos);

        $this->assertApiResponse($editedDocumentos);
    }

    /**
     * @test
     */
    public function testDeleteDocumentos()
    {
        $documentos = $this->makeDocumentos();
        $this->json('DELETE', '/api/v1/documentos/'.$documentos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/documentos/'.$documentos->id);

        $this->assertResponseStatus(404);
    }
}
