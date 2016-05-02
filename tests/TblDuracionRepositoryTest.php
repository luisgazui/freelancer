<?php

use App\Models\TblDuracion;
use App\Repositories\TblDuracionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblDuracionRepositoryTest extends TestCase
{
    use MakeTblDuracionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblDuracionRepository
     */
    protected $tblDuracionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblDuracionRepo = App::make(TblDuracionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblDuracion()
    {
        $tblDuracion = $this->fakeTblDuracionData();
        $createdTblDuracion = $this->tblDuracionRepo->create($tblDuracion);
        $createdTblDuracion = $createdTblDuracion->toArray();
        $this->assertArrayHasKey('id', $createdTblDuracion);
        $this->assertNotNull($createdTblDuracion['id'], 'Created TblDuracion must have id specified');
        $this->assertNotNull(TblDuracion::find($createdTblDuracion['id']), 'TblDuracion with given id must be in DB');
        $this->assertModelData($tblDuracion, $createdTblDuracion);
    }

    /**
     * @test read
     */
    public function testReadTblDuracion()
    {
        $tblDuracion = $this->makeTblDuracion();
        $dbTblDuracion = $this->tblDuracionRepo->find($tblDuracion->id);
        $dbTblDuracion = $dbTblDuracion->toArray();
        $this->assertModelData($tblDuracion->toArray(), $dbTblDuracion);
    }

    /**
     * @test update
     */
    public function testUpdateTblDuracion()
    {
        $tblDuracion = $this->makeTblDuracion();
        $fakeTblDuracion = $this->fakeTblDuracionData();
        $updatedTblDuracion = $this->tblDuracionRepo->update($fakeTblDuracion, $tblDuracion->id);
        $this->assertModelData($fakeTblDuracion, $updatedTblDuracion->toArray());
        $dbTblDuracion = $this->tblDuracionRepo->find($tblDuracion->id);
        $this->assertModelData($fakeTblDuracion, $dbTblDuracion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblDuracion()
    {
        $tblDuracion = $this->makeTblDuracion();
        $resp = $this->tblDuracionRepo->delete($tblDuracion->id);
        $this->assertTrue($resp);
        $this->assertNull(TblDuracion::find($tblDuracion->id), 'TblDuracion should not exist in DB');
    }
}
