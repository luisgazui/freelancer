<?php

use App\Models\TblPaises;
use App\Repositories\TblPaisesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblPaisesRepositoryTest extends TestCase
{
    use MakeTblPaisesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblPaisesRepository
     */
    protected $tblPaisesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblPaisesRepo = App::make(TblPaisesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblPaises()
    {
        $tblPaises = $this->fakeTblPaisesData();
        $createdTblPaises = $this->tblPaisesRepo->create($tblPaises);
        $createdTblPaises = $createdTblPaises->toArray();
        $this->assertArrayHasKey('id', $createdTblPaises);
        $this->assertNotNull($createdTblPaises['id'], 'Created TblPaises must have id specified');
        $this->assertNotNull(TblPaises::find($createdTblPaises['id']), 'TblPaises with given id must be in DB');
        $this->assertModelData($tblPaises, $createdTblPaises);
    }

    /**
     * @test read
     */
    public function testReadTblPaises()
    {
        $tblPaises = $this->makeTblPaises();
        $dbTblPaises = $this->tblPaisesRepo->find($tblPaises->id);
        $dbTblPaises = $dbTblPaises->toArray();
        $this->assertModelData($tblPaises->toArray(), $dbTblPaises);
    }

    /**
     * @test update
     */
    public function testUpdateTblPaises()
    {
        $tblPaises = $this->makeTblPaises();
        $fakeTblPaises = $this->fakeTblPaisesData();
        $updatedTblPaises = $this->tblPaisesRepo->update($fakeTblPaises, $tblPaises->id);
        $this->assertModelData($fakeTblPaises, $updatedTblPaises->toArray());
        $dbTblPaises = $this->tblPaisesRepo->find($tblPaises->id);
        $this->assertModelData($fakeTblPaises, $dbTblPaises->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblPaises()
    {
        $tblPaises = $this->makeTblPaises();
        $resp = $this->tblPaisesRepo->delete($tblPaises->id);
        $this->assertTrue($resp);
        $this->assertNull(TblPaises::find($tblPaises->id), 'TblPaises should not exist in DB');
    }
}
