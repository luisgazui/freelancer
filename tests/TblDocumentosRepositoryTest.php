<?php

use App\Models\TblDocumentos;
use App\Repositories\TblDocumentosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblDocumentosRepositoryTest extends TestCase
{
    use MakeTblDocumentosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblDocumentosRepository
     */
    protected $tblDocumentosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblDocumentosRepo = App::make(TblDocumentosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblDocumentos()
    {
        $tblDocumentos = $this->fakeTblDocumentosData();
        $createdTblDocumentos = $this->tblDocumentosRepo->create($tblDocumentos);
        $createdTblDocumentos = $createdTblDocumentos->toArray();
        $this->assertArrayHasKey('id', $createdTblDocumentos);
        $this->assertNotNull($createdTblDocumentos['id'], 'Created TblDocumentos must have id specified');
        $this->assertNotNull(TblDocumentos::find($createdTblDocumentos['id']), 'TblDocumentos with given id must be in DB');
        $this->assertModelData($tblDocumentos, $createdTblDocumentos);
    }

    /**
     * @test read
     */
    public function testReadTblDocumentos()
    {
        $tblDocumentos = $this->makeTblDocumentos();
        $dbTblDocumentos = $this->tblDocumentosRepo->find($tblDocumentos->id);
        $dbTblDocumentos = $dbTblDocumentos->toArray();
        $this->assertModelData($tblDocumentos->toArray(), $dbTblDocumentos);
    }

    /**
     * @test update
     */
    public function testUpdateTblDocumentos()
    {
        $tblDocumentos = $this->makeTblDocumentos();
        $fakeTblDocumentos = $this->fakeTblDocumentosData();
        $updatedTblDocumentos = $this->tblDocumentosRepo->update($fakeTblDocumentos, $tblDocumentos->id);
        $this->assertModelData($fakeTblDocumentos, $updatedTblDocumentos->toArray());
        $dbTblDocumentos = $this->tblDocumentosRepo->find($tblDocumentos->id);
        $this->assertModelData($fakeTblDocumentos, $dbTblDocumentos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblDocumentos()
    {
        $tblDocumentos = $this->makeTblDocumentos();
        $resp = $this->tblDocumentosRepo->delete($tblDocumentos->id);
        $this->assertTrue($resp);
        $this->assertNull(TblDocumentos::find($tblDocumentos->id), 'TblDocumentos should not exist in DB');
    }
}
