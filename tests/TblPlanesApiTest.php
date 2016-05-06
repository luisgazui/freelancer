<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblPlanesApiTest extends TestCase
{
    use MakeTblPlanesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblPlanes()
    {
        $tblPlanes = $this->fakeTblPlanesData();
        $this->json('POST', '/api/v1/tblPlanes', $tblPlanes);

        $this->assertApiResponse($tblPlanes);
    }

    /**
     * @test
     */
    public function testReadTblPlanes()
    {
        $tblPlanes = $this->makeTblPlanes();
        $this->json('GET', '/api/v1/tblPlanes/'.$tblPlanes->id);

        $this->assertApiResponse($tblPlanes->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblPlanes()
    {
        $tblPlanes = $this->makeTblPlanes();
        $editedTblPlanes = $this->fakeTblPlanesData();

        $this->json('PUT', '/api/v1/tblPlanes/'.$tblPlanes->id, $editedTblPlanes);

        $this->assertApiResponse($editedTblPlanes);
    }

    /**
     * @test
     */
    public function testDeleteTblPlanes()
    {
        $tblPlanes = $this->makeTblPlanes();
        $this->json('DELETE', '/api/v1/tblPlanes/'.$tblPlanes->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblPlanes/'.$tblPlanes->id);

        $this->assertResponseStatus(404);
    }
}
