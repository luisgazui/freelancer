<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblMascaraApiTest extends TestCase
{
    use MakeTblMascaraTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblMascara()
    {
        $tblMascara = $this->fakeTblMascaraData();
        $this->json('POST', '/api/v1/tblMascaras', $tblMascara);

        $this->assertApiResponse($tblMascara);
    }

    /**
     * @test
     */
    public function testReadTblMascara()
    {
        $tblMascara = $this->makeTblMascara();
        $this->json('GET', '/api/v1/tblMascaras/'.$tblMascara->id);

        $this->assertApiResponse($tblMascara->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblMascara()
    {
        $tblMascara = $this->makeTblMascara();
        $editedTblMascara = $this->fakeTblMascaraData();

        $this->json('PUT', '/api/v1/tblMascaras/'.$tblMascara->id, $editedTblMascara);

        $this->assertApiResponse($editedTblMascara);
    }

    /**
     * @test
     */
    public function testDeleteTblMascara()
    {
        $tblMascara = $this->makeTblMascara();
        $this->json('DELETE', '/api/v1/tblMascaras/'.$tblMascara->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblMascaras/'.$tblMascara->id);

        $this->assertResponseStatus(404);
    }
}
