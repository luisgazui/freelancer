<?php

use App\Models\TblSanciones;
use App\Repositories\TblSancionesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblSancionesRepositoryTest extends TestCase
{
    use MakeTblSancionesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblSancionesRepository
     */
    protected $tblSancionesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblSancionesRepo = App::make(TblSancionesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblSanciones()
    {
        $tblSanciones = $this->fakeTblSancionesData();
        $createdTblSanciones = $this->tblSancionesRepo->create($tblSanciones);
        $createdTblSanciones = $createdTblSanciones->toArray();
        $this->assertArrayHasKey('id', $createdTblSanciones);
        $this->assertNotNull($createdTblSanciones['id'], 'Created TblSanciones must have id specified');
        $this->assertNotNull(TblSanciones::find($createdTblSanciones['id']), 'TblSanciones with given id must be in DB');
        $this->assertModelData($tblSanciones, $createdTblSanciones);
    }

    /**
     * @test read
     */
    public function testReadTblSanciones()
    {
        $tblSanciones = $this->makeTblSanciones();
        $dbTblSanciones = $this->tblSancionesRepo->find($tblSanciones->id);
        $dbTblSanciones = $dbTblSanciones->toArray();
        $this->assertModelData($tblSanciones->toArray(), $dbTblSanciones);
    }

    /**
     * @test update
     */
    public function testUpdateTblSanciones()
    {
        $tblSanciones = $this->makeTblSanciones();
        $fakeTblSanciones = $this->fakeTblSancionesData();
        $updatedTblSanciones = $this->tblSancionesRepo->update($fakeTblSanciones, $tblSanciones->id);
        $this->assertModelData($fakeTblSanciones, $updatedTblSanciones->toArray());
        $dbTblSanciones = $this->tblSancionesRepo->find($tblSanciones->id);
        $this->assertModelData($fakeTblSanciones, $dbTblSanciones->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblSanciones()
    {
        $tblSanciones = $this->makeTblSanciones();
        $resp = $this->tblSancionesRepo->delete($tblSanciones->id);
        $this->assertTrue($resp);
        $this->assertNull(TblSanciones::find($tblSanciones->id), 'TblSanciones should not exist in DB');
    }
}
