<?php

use App\Models\TblMonedas;
use App\Repositories\TblMonedasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblMonedasRepositoryTest extends TestCase
{
    use MakeTblMonedasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblMonedasRepository
     */
    protected $tblMonedasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblMonedasRepo = App::make(TblMonedasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblMonedas()
    {
        $tblMonedas = $this->fakeTblMonedasData();
        $createdTblMonedas = $this->tblMonedasRepo->create($tblMonedas);
        $createdTblMonedas = $createdTblMonedas->toArray();
        $this->assertArrayHasKey('id', $createdTblMonedas);
        $this->assertNotNull($createdTblMonedas['id'], 'Created TblMonedas must have id specified');
        $this->assertNotNull(TblMonedas::find($createdTblMonedas['id']), 'TblMonedas with given id must be in DB');
        $this->assertModelData($tblMonedas, $createdTblMonedas);
    }

    /**
     * @test read
     */
    public function testReadTblMonedas()
    {
        $tblMonedas = $this->makeTblMonedas();
        $dbTblMonedas = $this->tblMonedasRepo->find($tblMonedas->id);
        $dbTblMonedas = $dbTblMonedas->toArray();
        $this->assertModelData($tblMonedas->toArray(), $dbTblMonedas);
    }

    /**
     * @test update
     */
    public function testUpdateTblMonedas()
    {
        $tblMonedas = $this->makeTblMonedas();
        $fakeTblMonedas = $this->fakeTblMonedasData();
        $updatedTblMonedas = $this->tblMonedasRepo->update($fakeTblMonedas, $tblMonedas->id);
        $this->assertModelData($fakeTblMonedas, $updatedTblMonedas->toArray());
        $dbTblMonedas = $this->tblMonedasRepo->find($tblMonedas->id);
        $this->assertModelData($fakeTblMonedas, $dbTblMonedas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblMonedas()
    {
        $tblMonedas = $this->makeTblMonedas();
        $resp = $this->tblMonedasRepo->delete($tblMonedas->id);
        $this->assertTrue($resp);
        $this->assertNull(TblMonedas::find($tblMonedas->id), 'TblMonedas should not exist in DB');
    }
}
