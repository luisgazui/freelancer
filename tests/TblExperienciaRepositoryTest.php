<?php

use App\Models\TblExperiencia;
use App\Repositories\TblExperienciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblExperienciaRepositoryTest extends TestCase
{
    use MakeTblExperienciaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblExperienciaRepository
     */
    protected $tblExperienciaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblExperienciaRepo = App::make(TblExperienciaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblExperiencia()
    {
        $tblExperiencia = $this->fakeTblExperienciaData();
        $createdTblExperiencia = $this->tblExperienciaRepo->create($tblExperiencia);
        $createdTblExperiencia = $createdTblExperiencia->toArray();
        $this->assertArrayHasKey('id', $createdTblExperiencia);
        $this->assertNotNull($createdTblExperiencia['id'], 'Created TblExperiencia must have id specified');
        $this->assertNotNull(TblExperiencia::find($createdTblExperiencia['id']), 'TblExperiencia with given id must be in DB');
        $this->assertModelData($tblExperiencia, $createdTblExperiencia);
    }

    /**
     * @test read
     */
    public function testReadTblExperiencia()
    {
        $tblExperiencia = $this->makeTblExperiencia();
        $dbTblExperiencia = $this->tblExperienciaRepo->find($tblExperiencia->id);
        $dbTblExperiencia = $dbTblExperiencia->toArray();
        $this->assertModelData($tblExperiencia->toArray(), $dbTblExperiencia);
    }

    /**
     * @test update
     */
    public function testUpdateTblExperiencia()
    {
        $tblExperiencia = $this->makeTblExperiencia();
        $fakeTblExperiencia = $this->fakeTblExperienciaData();
        $updatedTblExperiencia = $this->tblExperienciaRepo->update($fakeTblExperiencia, $tblExperiencia->id);
        $this->assertModelData($fakeTblExperiencia, $updatedTblExperiencia->toArray());
        $dbTblExperiencia = $this->tblExperienciaRepo->find($tblExperiencia->id);
        $this->assertModelData($fakeTblExperiencia, $dbTblExperiencia->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblExperiencia()
    {
        $tblExperiencia = $this->makeTblExperiencia();
        $resp = $this->tblExperienciaRepo->delete($tblExperiencia->id);
        $this->assertTrue($resp);
        $this->assertNull(TblExperiencia::find($tblExperiencia->id), 'TblExperiencia should not exist in DB');
    }
}
