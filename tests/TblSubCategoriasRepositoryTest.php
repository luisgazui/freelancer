<?php

use App\Models\TblSubCategorias;
use App\Repositories\TblSubCategoriasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblSubCategoriasRepositoryTest extends TestCase
{
    use MakeTblSubCategoriasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblSubCategoriasRepository
     */
    protected $tblSubCategoriasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblSubCategoriasRepo = App::make(TblSubCategoriasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblSubCategorias()
    {
        $tblSubCategorias = $this->fakeTblSubCategoriasData();
        $createdTblSubCategorias = $this->tblSubCategoriasRepo->create($tblSubCategorias);
        $createdTblSubCategorias = $createdTblSubCategorias->toArray();
        $this->assertArrayHasKey('id', $createdTblSubCategorias);
        $this->assertNotNull($createdTblSubCategorias['id'], 'Created TblSubCategorias must have id specified');
        $this->assertNotNull(TblSubCategorias::find($createdTblSubCategorias['id']), 'TblSubCategorias with given id must be in DB');
        $this->assertModelData($tblSubCategorias, $createdTblSubCategorias);
    }

    /**
     * @test read
     */
    public function testReadTblSubCategorias()
    {
        $tblSubCategorias = $this->makeTblSubCategorias();
        $dbTblSubCategorias = $this->tblSubCategoriasRepo->find($tblSubCategorias->id);
        $dbTblSubCategorias = $dbTblSubCategorias->toArray();
        $this->assertModelData($tblSubCategorias->toArray(), $dbTblSubCategorias);
    }

    /**
     * @test update
     */
    public function testUpdateTblSubCategorias()
    {
        $tblSubCategorias = $this->makeTblSubCategorias();
        $fakeTblSubCategorias = $this->fakeTblSubCategoriasData();
        $updatedTblSubCategorias = $this->tblSubCategoriasRepo->update($fakeTblSubCategorias, $tblSubCategorias->id);
        $this->assertModelData($fakeTblSubCategorias, $updatedTblSubCategorias->toArray());
        $dbTblSubCategorias = $this->tblSubCategoriasRepo->find($tblSubCategorias->id);
        $this->assertModelData($fakeTblSubCategorias, $dbTblSubCategorias->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblSubCategorias()
    {
        $tblSubCategorias = $this->makeTblSubCategorias();
        $resp = $this->tblSubCategoriasRepo->delete($tblSubCategorias->id);
        $this->assertTrue($resp);
        $this->assertNull(TblSubCategorias::find($tblSubCategorias->id), 'TblSubCategorias should not exist in DB');
    }
}
