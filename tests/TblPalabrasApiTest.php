<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblPalabrasApiTest extends TestCase
{
    use MakeTblPalabrasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTblPalabras()
    {
        $tblPalabras = $this->fakeTblPalabrasData();
        $this->json('POST', '/api/v1/tblPalabras', $tblPalabras);

        $this->assertApiResponse($tblPalabras);
    }

    /**
     * @test
     */
    public function testReadTblPalabras()
    {
        $tblPalabras = $this->makeTblPalabras();
        $this->json('GET', '/api/v1/tblPalabras/'.$tblPalabras->id);

        $this->assertApiResponse($tblPalabras->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTblPalabras()
    {
        $tblPalabras = $this->makeTblPalabras();
        $editedTblPalabras = $this->fakeTblPalabrasData();

        $this->json('PUT', '/api/v1/tblPalabras/'.$tblPalabras->id, $editedTblPalabras);

        $this->assertApiResponse($editedTblPalabras);
    }

    /**
     * @test
     */
    public function testDeleteTblPalabras()
    {
        $tblPalabras = $this->makeTblPalabras();
        $this->json('DELETE', '/api/v1/tblPalabras/'.$tblPalabras->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tblPalabras/'.$tblPalabras->id);

        $this->assertResponseStatus(404);
    }
}
