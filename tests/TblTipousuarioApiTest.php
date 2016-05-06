<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTipousuarioApiTest extends TestCase
{
    use MakeTblTipousuarioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblTipousuario()
    {
        $tblTipousuario = $this->fakeTblTipousuarioData();
        $this->json('POST', '/api/v1/tblTipousuarios', $tblTipousuario);

        $this->assertApiResponse($tblTipousuario);
    }

    /**
     * @test
     */
    public function testReadTblTipousuario()
    {
        $tblTipousuario = $this->makeTblTipousuario();
        $this->json('GET', '/api/v1/tblTipousuarios/'.$tblTipousuario->id);

        $this->assertApiResponse($tblTipousuario->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblTipousuario()
    {
        $tblTipousuario = $this->makeTblTipousuario();
        $editedTblTipousuario = $this->fakeTblTipousuarioData();

        $this->json('PUT', '/api/v1/tblTipousuarios/'.$tblTipousuario->id, $editedTblTipousuario);

        $this->assertApiResponse($editedTblTipousuario);
    }

    /**
     * @test
     */
    public function testDeleteTblTipousuario()
    {
        $tblTipousuario = $this->makeTblTipousuario();
        $this->json('DELETE', '/api/v1/tblTipousuarios/'.$tblTipousuario->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblTipousuarios/'.$tblTipousuario->id);

        $this->assertResponseStatus(404);
    }
}
