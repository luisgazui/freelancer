<?php

use App\Models\TblMascara;
use App\Repositories\TblMascaraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblMascaraRepositoryTest extends TestCase
{
    use MakeTblMascaraTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblMascaraRepository
     */
    protected $tblMascaraRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblMascaraRepo = App::make(TblMascaraRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblMascara()
    {
        $tblMascara = $this->fakeTblMascaraData();
        $createdTblMascara = $this->tblMascaraRepo->create($tblMascara);
        $createdTblMascara = $createdTblMascara->toArray();
        $this->assertArrayHasKey('id', $createdTblMascara);
        $this->assertNotNull($createdTblMascara['id'], 'Created TblMascara must have id specified');
        $this->assertNotNull(TblMascara::find($createdTblMascara['id']), 'TblMascara with given id must be in DB');
        $this->assertModelData($tblMascara, $createdTblMascara);
    }

    /**
     * @test read
     */
    public function testReadTblMascara()
    {
        $tblMascara = $this->makeTblMascara();
        $dbTblMascara = $this->tblMascaraRepo->find($tblMascara->id);
        $dbTblMascara = $dbTblMascara->toArray();
        $this->assertModelData($tblMascara->toArray(), $dbTblMascara);
    }

    /**
     * @test update
     */
    public function testUpdateTblMascara()
    {
        $tblMascara = $this->makeTblMascara();
        $fakeTblMascara = $this->fakeTblMascaraData();
        $updatedTblMascara = $this->tblMascaraRepo->update($fakeTblMascara, $tblMascara->id);
        $this->assertModelData($fakeTblMascara, $updatedTblMascara->toArray());
        $dbTblMascara = $this->tblMascaraRepo->find($tblMascara->id);
        $this->assertModelData($fakeTblMascara, $dbTblMascara->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblMascara()
    {
        $tblMascara = $this->makeTblMascara();
        $resp = $this->tblMascaraRepo->delete($tblMascara->id);
        $this->assertTrue($resp);
        $this->assertNull(TblMascara::find($tblMascara->id), 'TblMascara should not exist in DB');
    }
}
