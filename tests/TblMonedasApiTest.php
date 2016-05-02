<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblMonedasApiTest extends TestCase
{
    use MakeTblMonedasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblMonedas()
    {
        $tblMonedas = $this->fakeTblMonedasData();
        $this->json('POST', '/api/v1/tblMonedas', $tblMonedas);

        $this->assertApiResponse($tblMonedas);
    }

    /**
     * @test
     */
    public function testReadTblMonedas()
    {
        $tblMonedas = $this->makeTblMonedas();
        $this->json('GET', '/api/v1/tblMonedas/'.$tblMonedas->id);

        $this->assertApiResponse($tblMonedas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblMonedas()
    {
        $tblMonedas = $this->makeTblMonedas();
        $editedTblMonedas = $this->fakeTblMonedasData();

        $this->json('PUT', '/api/v1/tblMonedas/'.$tblMonedas->id, $editedTblMonedas);

        $this->assertApiResponse($editedTblMonedas);
    }

    /**
     * @test
     */
    public function testDeleteTblMonedas()
    {
        $tblMonedas = $this->makeTblMonedas();
        $this->json('DELETE', '/api/v1/tblMonedas/'.$tblMonedas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblMonedas/'.$tblMonedas->id);

        $this->assertResponseStatus(404);
    }
}
