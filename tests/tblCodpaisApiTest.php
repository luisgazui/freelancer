<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tblCodpaisApiTest extends TestCase
{
    use MaketblCodpaisTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetblCodpais()
    {
        $tblCodpais = $this->faketblCodpaisData();
        $this->json('POST', '/api/v1/tblCodpais', $tblCodpais);

        $this->assertApiResponse($tblCodpais);
    }

    /**
     * @test
     */
    public function testReadtblCodpais()
    {
        $tblCodpais = $this->maketblCodpais();
        $this->json('GET', '/api/v1/tblCodpais/'.$tblCodpais->id);

        $this->assertApiResponse($tblCodpais->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetblCodpais()
    {
        $tblCodpais = $this->maketblCodpais();
        $editedtblCodpais = $this->faketblCodpaisData();

        $this->json('PUT', '/api/v1/tblCodpais/'.$tblCodpais->id, $editedtblCodpais);

        $this->assertApiResponse($editedtblCodpais);
    }

    /**
     * @test
     */
    public function testDeletetblCodpais()
    {
        $tblCodpais = $this->maketblCodpais();
        $this->json('DELETE', '/api/v1/tblCodpais/'.$tblCodpais->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblCodpais/'.$tblCodpais->id);

        $this->assertResponseStatus(404);
    }
}
