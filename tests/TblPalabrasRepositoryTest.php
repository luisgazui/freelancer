<?php

use App\Models\TblPalabras;
use App\Repositories\TblPalabrasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblPalabrasRepositoryTest extends TestCase
{
    use MakeTblPalabrasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblPalabrasRepository
     */
    protected $tblPalabrasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblPalabrasRepo = App::make(TblPalabrasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblPalabras()
    {
        $tblPalabras = $this->fakeTblPalabrasData();
        $createdTblPalabras = $this->tblPalabrasRepo->create($tblPalabras);
        $createdTblPalabras = $createdTblPalabras->toArray();
        $this->assertArrayHasKey('id', $createdTblPalabras);
        $this->assertNotNull($createdTblPalabras['id'], 'Created TblPalabras must have id specified');
        $this->assertNotNull(TblPalabras::find($createdTblPalabras['id']), 'TblPalabras with given id must be in DB');
        $this->assertModelData($tblPalabras, $createdTblPalabras);
    }

    /**
     * @test read
     */
    public function testReadTblPalabras()
    {
        $tblPalabras = $this->makeTblPalabras();
        $dbTblPalabras = $this->tblPalabrasRepo->find($tblPalabras->id);
        $dbTblPalabras = $dbTblPalabras->toArray();
        $this->assertModelData($tblPalabras->toArray(), $dbTblPalabras);
    }

    /**
     * @test update
     */
    public function testUpdateTblPalabras()
    {
        $tblPalabras = $this->makeTblPalabras();
        $fakeTblPalabras = $this->fakeTblPalabrasData();
        $updatedTblPalabras = $this->tblPalabrasRepo->update($fakeTblPalabras, $tblPalabras->id);
        $this->assertModelData($fakeTblPalabras, $updatedTblPalabras->toArray());
        $dbTblPalabras = $this->tblPalabrasRepo->find($tblPalabras->id);
        $this->assertModelData($fakeTblPalabras, $dbTblPalabras->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblPalabras()
    {
        $tblPalabras = $this->makeTblPalabras();
        $resp = $this->tblPalabrasRepo->delete($tblPalabras->id);
        $this->assertTrue($resp);
        $this->assertNull(TblPalabras::find($tblPalabras->id), 'TblPalabras should not exist in DB');
    }
}
