<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTelefonotipoApiTest extends TestCase
{
    use MakeTblTelefonotipoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblTelefonotipo()
    {
        $tblTelefonotipo = $this->fakeTblTelefonotipoData();
        $this->json('POST', '/api/v1/tblTelefonotipos', $tblTelefonotipo);

        $this->assertApiResponse($tblTelefonotipo);
    }

    /**
     * @test
     */
    public function testReadTblTelefonotipo()
    {
        $tblTelefonotipo = $this->makeTblTelefonotipo();
        $this->json('GET', '/api/v1/tblTelefonotipos/'.$tblTelefonotipo->id);

        $this->assertApiResponse($tblTelefonotipo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblTelefonotipo()
    {
        $tblTelefonotipo = $this->makeTblTelefonotipo();
        $editedTblTelefonotipo = $this->fakeTblTelefonotipoData();

        $this->json('PUT', '/api/v1/tblTelefonotipos/'.$tblTelefonotipo->id, $editedTblTelefonotipo);

        $this->assertApiResponse($editedTblTelefonotipo);
    }

    /**
     * @test
     */
    public function testDeleteTblTelefonotipo()
    {
        $tblTelefonotipo = $this->makeTblTelefonotipo();
        $this->json('DELETE', '/api/v1/tblTelefonotipos/'.$tblTelefonotipo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblTelefonotipos/'.$tblTelefonotipo->id);

        $this->assertResponseStatus(404);
    }
}
