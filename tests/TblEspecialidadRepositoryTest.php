<?php

use App\Models\TblEspecialidad;
use App\Repositories\TblEspecialidadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblEspecialidadRepositoryTest extends TestCase
{
    use MakeTblEspecialidadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblEspecialidadRepository
     */
    protected $tblEspecialidadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblEspecialidadRepo = App::make(TblEspecialidadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblEspecialidad()
    {
        $tblEspecialidad = $this->fakeTblEspecialidadData();
        $createdTblEspecialidad = $this->tblEspecialidadRepo->create($tblEspecialidad);
        $createdTblEspecialidad = $createdTblEspecialidad->toArray();
        $this->assertArrayHasKey('id', $createdTblEspecialidad);
        $this->assertNotNull($createdTblEspecialidad['id'], 'Created TblEspecialidad must have id specified');
        $this->assertNotNull(TblEspecialidad::find($createdTblEspecialidad['id']), 'TblEspecialidad with given id must be in DB');
        $this->assertModelData($tblEspecialidad, $createdTblEspecialidad);
    }

    /**
     * @test read
     */
    public function testReadTblEspecialidad()
    {
        $tblEspecialidad = $this->makeTblEspecialidad();
        $dbTblEspecialidad = $this->tblEspecialidadRepo->find($tblEspecialidad->id);
        $dbTblEspecialidad = $dbTblEspecialidad->toArray();
        $this->assertModelData($tblEspecialidad->toArray(), $dbTblEspecialidad);
    }

    /**
     * @test update
     */
    public function testUpdateTblEspecialidad()
    {
        $tblEspecialidad = $this->makeTblEspecialidad();
        $fakeTblEspecialidad = $this->fakeTblEspecialidadData();
        $updatedTblEspecialidad = $this->tblEspecialidadRepo->update($fakeTblEspecialidad, $tblEspecialidad->id);
        $this->assertModelData($fakeTblEspecialidad, $updatedTblEspecialidad->toArray());
        $dbTblEspecialidad = $this->tblEspecialidadRepo->find($tblEspecialidad->id);
        $this->assertModelData($fakeTblEspecialidad, $dbTblEspecialidad->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblEspecialidad()
    {
        $tblEspecialidad = $this->makeTblEspecialidad();
        $resp = $this->tblEspecialidadRepo->delete($tblEspecialidad->id);
        $this->assertTrue($resp);
        $this->assertNull(TblEspecialidad::find($tblEspecialidad->id), 'TblEspecialidad should not exist in DB');
    }
}
