<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTitulosApiTest extends TestCase
{
    use MakeTblTitulosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblTitulos()
    {
        $tblTitulos = $this->fakeTblTitulosData();
        $this->json('POST', '/api/v1/tblTitulos', $tblTitulos);

        $this->assertApiResponse($tblTitulos);
    }

    /**
     * @test
     */
    public function testReadTblTitulos()
    {
        $tblTitulos = $this->makeTblTitulos();
        $this->json('GET', '/api/v1/tblTitulos/'.$tblTitulos->id);

        $this->assertApiResponse($tblTitulos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblTitulos()
    {
        $tblTitulos = $this->makeTblTitulos();
        $editedTblTitulos = $this->fakeTblTitulosData();

        $this->json('PUT', '/api/v1/tblTitulos/'.$tblTitulos->id, $editedTblTitulos);

        $this->assertApiResponse($editedTblTitulos);
    }

    /**
     * @test
     */
    public function testDeleteTblTitulos()
    {
        $tblTitulos = $this->makeTblTitulos();
        $this->json('DELETE', '/api/v1/tblTitulos/'.$tblTitulos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblTitulos/'.$tblTitulos->id);

        $this->assertResponseStatus(404);
    }
}
