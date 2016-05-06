<?php

use App\Models\TblStatusproyecto;
use App\Repositories\TblStatusproyectoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblStatusproyectoRepositoryTest extends TestCase
{
    use MakeTblStatusproyectoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblStatusproyectoRepository
     */
    protected $tblStatusproyectoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblStatusproyectoRepo = App::make(TblStatusproyectoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblStatusproyecto()
    {
        $tblStatusproyecto = $this->fakeTblStatusproyectoData();
        $createdTblStatusproyecto = $this->tblStatusproyectoRepo->create($tblStatusproyecto);
        $createdTblStatusproyecto = $createdTblStatusproyecto->toArray();
        $this->assertArrayHasKey('id', $createdTblStatusproyecto);
        $this->assertNotNull($createdTblStatusproyecto['id'], 'Created TblStatusproyecto must have id specified');
        $this->assertNotNull(TblStatusproyecto::find($createdTblStatusproyecto['id']), 'TblStatusproyecto with given id must be in DB');
        $this->assertModelData($tblStatusproyecto, $createdTblStatusproyecto);
    }

    /**
     * @test read
     */
    public function testReadTblStatusproyecto()
    {
        $tblStatusproyecto = $this->makeTblStatusproyecto();
        $dbTblStatusproyecto = $this->tblStatusproyectoRepo->find($tblStatusproyecto->id);
        $dbTblStatusproyecto = $dbTblStatusproyecto->toArray();
        $this->assertModelData($tblStatusproyecto->toArray(), $dbTblStatusproyecto);
    }

    /**
     * @test update
     */
    public function testUpdateTblStatusproyecto()
    {
        $tblStatusproyecto = $this->makeTblStatusproyecto();
        $fakeTblStatusproyecto = $this->fakeTblStatusproyectoData();
        $updatedTblStatusproyecto = $this->tblStatusproyectoRepo->update($fakeTblStatusproyecto, $tblStatusproyecto->id);
        $this->assertModelData($fakeTblStatusproyecto, $updatedTblStatusproyecto->toArray());
        $dbTblStatusproyecto = $this->tblStatusproyectoRepo->find($tblStatusproyecto->id);
        $this->assertModelData($fakeTblStatusproyecto, $dbTblStatusproyecto->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblStatusproyecto()
    {
        $tblStatusproyecto = $this->makeTblStatusproyecto();
        $resp = $this->tblStatusproyectoRepo->delete($tblStatusproyecto->id);
        $this->assertTrue($resp);
        $this->assertNull(TblStatusproyecto::find($tblStatusproyecto->id), 'TblStatusproyecto should not exist in DB');
    }
}
