<?php

use App\Models\TblCategorias;
use App\Repositories\TblCategoriasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblCategoriasRepositoryTest extends TestCase
{
    use MakeTblCategoriasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblCategoriasRepository
     */
    protected $tblCategoriasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblCategoriasRepo = App::make(TblCategoriasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblCategorias()
    {
        $tblCategorias = $this->fakeTblCategoriasData();
        $createdTblCategorias = $this->tblCategoriasRepo->create($tblCategorias);
        $createdTblCategorias = $createdTblCategorias->toArray();
        $this->assertArrayHasKey('id', $createdTblCategorias);
        $this->assertNotNull($createdTblCategorias['id'], 'Created TblCategorias must have id specified');
        $this->assertNotNull(TblCategorias::find($createdTblCategorias['id']), 'TblCategorias with given id must be in DB');
        $this->assertModelData($tblCategorias, $createdTblCategorias);
    }

    /**
     * @test read
     */
    public function testReadTblCategorias()
    {
        $tblCategorias = $this->makeTblCategorias();
        $dbTblCategorias = $this->tblCategoriasRepo->find($tblCategorias->id);
        $dbTblCategorias = $dbTblCategorias->toArray();
        $this->assertModelData($tblCategorias->toArray(), $dbTblCategorias);
    }

    /**
     * @test update
     */
    public function testUpdateTblCategorias()
    {
        $tblCategorias = $this->makeTblCategorias();
        $fakeTblCategorias = $this->fakeTblCategoriasData();
        $updatedTblCategorias = $this->tblCategoriasRepo->update($fakeTblCategorias, $tblCategorias->id);
        $this->assertModelData($fakeTblCategorias, $updatedTblCategorias->toArray());
        $dbTblCategorias = $this->tblCategoriasRepo->find($tblCategorias->id);
        $this->assertModelData($fakeTblCategorias, $dbTblCategorias->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblCategorias()
    {
        $tblCategorias = $this->makeTblCategorias();
        $resp = $this->tblCategoriasRepo->delete($tblCategorias->id);
        $this->assertTrue($resp);
        $this->assertNull(TblCategorias::find($tblCategorias->id), 'TblCategorias should not exist in DB');
    }
}
