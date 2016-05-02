<?php

use App\Models\TblTitulos;
use App\Repositories\TblTitulosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTitulosRepositoryTest extends TestCase
{
    use MakeTblTitulosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblTitulosRepository
     */
    protected $tblTitulosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblTitulosRepo = App::make(TblTitulosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblTitulos()
    {
        $tblTitulos = $this->fakeTblTitulosData();
        $createdTblTitulos = $this->tblTitulosRepo->create($tblTitulos);
        $createdTblTitulos = $createdTblTitulos->toArray();
        $this->assertArrayHasKey('id', $createdTblTitulos);
        $this->assertNotNull($createdTblTitulos['id'], 'Created TblTitulos must have id specified');
        $this->assertNotNull(TblTitulos::find($createdTblTitulos['id']), 'TblTitulos with given id must be in DB');
        $this->assertModelData($tblTitulos, $createdTblTitulos);
    }

    /**
     * @test read
     */
    public function testReadTblTitulos()
    {
        $tblTitulos = $this->makeTblTitulos();
        $dbTblTitulos = $this->tblTitulosRepo->find($tblTitulos->id);
        $dbTblTitulos = $dbTblTitulos->toArray();
        $this->assertModelData($tblTitulos->toArray(), $dbTblTitulos);
    }

    /**
     * @test update
     */
    public function testUpdateTblTitulos()
    {
        $tblTitulos = $this->makeTblTitulos();
        $fakeTblTitulos = $this->fakeTblTitulosData();
        $updatedTblTitulos = $this->tblTitulosRepo->update($fakeTblTitulos, $tblTitulos->id);
        $this->assertModelData($fakeTblTitulos, $updatedTblTitulos->toArray());
        $dbTblTitulos = $this->tblTitulosRepo->find($tblTitulos->id);
        $this->assertModelData($fakeTblTitulos, $dbTblTitulos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblTitulos()
    {
        $tblTitulos = $this->makeTblTitulos();
        $resp = $this->tblTitulosRepo->delete($tblTitulos->id);
        $this->assertTrue($resp);
        $this->assertNull(TblTitulos::find($tblTitulos->id), 'TblTitulos should not exist in DB');
    }
}
