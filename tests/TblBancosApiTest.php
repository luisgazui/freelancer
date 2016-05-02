<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblBancosApiTest extends TestCase
{
    use MakeTblBancosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblBancos()
    {
        $tblBancos = $this->fakeTblBancosData();
        $this->json('POST', '/api/v1/tblBancos', $tblBancos);

        $this->assertApiResponse($tblBancos);
    }

    /**
     * @test
     */
    public function testReadTblBancos()
    {
        $tblBancos = $this->makeTblBancos();
        $this->json('GET', '/api/v1/tblBancos/'.$tblBancos->id);

        $this->assertApiResponse($tblBancos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblBancos()
    {
        $tblBancos = $this->makeTblBancos();
        $editedTblBancos = $this->fakeTblBancosData();

        $this->json('PUT', '/api/v1/tblBancos/'.$tblBancos->id, $editedTblBancos);

        $this->assertApiResponse($editedTblBancos);
    }

    /**
     * @test
     */
    public function testDeleteTblBancos()
    {
        $tblBancos = $this->makeTblBancos();
        $this->json('DELETE', '/api/v1/tblBancos/'.$tblBancos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblBancos/'.$tblBancos->id);

        $this->assertResponseStatus(404);
    }
}
