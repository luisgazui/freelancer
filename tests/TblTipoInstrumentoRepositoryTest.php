<?php

use App\Models\TblTipoInstrumento;
use App\Repositories\TblTipoInstrumentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTipoInstrumentoRepositoryTest extends TestCase
{
    use MakeTblTipoInstrumentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblTipoInstrumentoRepository
     */
    protected $tblTipoInstrumentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblTipoInstrumentoRepo = App::make(TblTipoInstrumentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->fakeTblTipoInstrumentoData();
        $createdTblTipoInstrumento = $this->tblTipoInstrumentoRepo->create($tblTipoInstrumento);
        $createdTblTipoInstrumento = $createdTblTipoInstrumento->toArray();
        $this->assertArrayHasKey('id', $createdTblTipoInstrumento);
        $this->assertNotNull($createdTblTipoInstrumento['id'], 'Created TblTipoInstrumento must have id specified');
        $this->assertNotNull(TblTipoInstrumento::find($createdTblTipoInstrumento['id']), 'TblTipoInstrumento with given id must be in DB');
        $this->assertModelData($tblTipoInstrumento, $createdTblTipoInstrumento);
    }

    /**
     * @test read
     */
    public function testReadTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->makeTblTipoInstrumento();
        $dbTblTipoInstrumento = $this->tblTipoInstrumentoRepo->find($tblTipoInstrumento->id);
        $dbTblTipoInstrumento = $dbTblTipoInstrumento->toArray();
        $this->assertModelData($tblTipoInstrumento->toArray(), $dbTblTipoInstrumento);
    }

    /**
     * @test update
     */
    public function testUpdateTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->makeTblTipoInstrumento();
        $fakeTblTipoInstrumento = $this->fakeTblTipoInstrumentoData();
        $updatedTblTipoInstrumento = $this->tblTipoInstrumentoRepo->update($fakeTblTipoInstrumento, $tblTipoInstrumento->id);
        $this->assertModelData($fakeTblTipoInstrumento, $updatedTblTipoInstrumento->toArray());
        $dbTblTipoInstrumento = $this->tblTipoInstrumentoRepo->find($tblTipoInstrumento->id);
        $this->assertModelData($fakeTblTipoInstrumento, $dbTblTipoInstrumento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblTipoInstrumento()
    {
        $tblTipoInstrumento = $this->makeTblTipoInstrumento();
        $resp = $this->tblTipoInstrumentoRepo->delete($tblTipoInstrumento->id);
        $this->assertTrue($resp);
        $this->assertNull(TblTipoInstrumento::find($tblTipoInstrumento->id), 'TblTipoInstrumento should not exist in DB');
    }
}
