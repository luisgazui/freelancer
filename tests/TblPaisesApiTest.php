<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblPaisesApiTest extends TestCase
{
    use MakeTblPaisesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblPaises()
    {
        $tblPaises = $this->fakeTblPaisesData();
        $this->json('POST', '/api/v1/tblPaises', $tblPaises);

        $this->assertApiResponse($tblPaises);
    }

    /**
     * @test
     */
    public function testReadTblPaises()
    {
        $tblPaises = $this->makeTblPaises();
        $this->json('GET', '/api/v1/tblPaises/'.$tblPaises->id);

        $this->assertApiResponse($tblPaises->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblPaises()
    {
        $tblPaises = $this->makeTblPaises();
        $editedTblPaises = $this->fakeTblPaisesData();

        $this->json('PUT', '/api/v1/tblPaises/'.$tblPaises->id, $editedTblPaises);

        $this->assertApiResponse($editedTblPaises);
    }

    /**
     * @test
     */
    public function testDeleteTblPaises()
    {
        $tblPaises = $this->makeTblPaises();
        $this->json('DELETE', '/api/v1/tblPaises/'.$tblPaises->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblPaises/'.$tblPaises->id);

        $this->assertResponseStatus(404);
    }
}
