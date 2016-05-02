<?php

use App\Models\TblBancos;
use App\Repositories\TblBancosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblBancosRepositoryTest extends TestCase
{
    use MakeTblBancosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblBancosRepository
     */
    protected $tblBancosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblBancosRepo = App::make(TblBancosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblBancos()
    {
        $tblBancos = $this->fakeTblBancosData();
        $createdTblBancos = $this->tblBancosRepo->create($tblBancos);
        $createdTblBancos = $createdTblBancos->toArray();
        $this->assertArrayHasKey('id', $createdTblBancos);
        $this->assertNotNull($createdTblBancos['id'], 'Created TblBancos must have id specified');
        $this->assertNotNull(TblBancos::find($createdTblBancos['id']), 'TblBancos with given id must be in DB');
        $this->assertModelData($tblBancos, $createdTblBancos);
    }

    /**
     * @test read
     */
    public function testReadTblBancos()
    {
        $tblBancos = $this->makeTblBancos();
        $dbTblBancos = $this->tblBancosRepo->find($tblBancos->id);
        $dbTblBancos = $dbTblBancos->toArray();
        $this->assertModelData($tblBancos->toArray(), $dbTblBancos);
    }

    /**
     * @test update
     */
    public function testUpdateTblBancos()
    {
        $tblBancos = $this->makeTblBancos();
        $fakeTblBancos = $this->fakeTblBancosData();
        $updatedTblBancos = $this->tblBancosRepo->update($fakeTblBancos, $tblBancos->id);
        $this->assertModelData($fakeTblBancos, $updatedTblBancos->toArray());
        $dbTblBancos = $this->tblBancosRepo->find($tblBancos->id);
        $this->assertModelData($fakeTblBancos, $dbTblBancos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblBancos()
    {
        $tblBancos = $this->makeTblBancos();
        $resp = $this->tblBancosRepo->delete($tblBancos->id);
        $this->assertTrue($resp);
        $this->assertNull(TblBancos::find($tblBancos->id), 'TblBancos should not exist in DB');
    }
}
