<?php

use App\Models\TblPlanes;
use App\Repositories\TblPlanesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblPlanesRepositoryTest extends TestCase
{
    use MakeTblPlanesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblPlanesRepository
     */
    protected $tblPlanesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblPlanesRepo = App::make(TblPlanesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblPlanes()
    {
        $tblPlanes = $this->fakeTblPlanesData();
        $createdTblPlanes = $this->tblPlanesRepo->create($tblPlanes);
        $createdTblPlanes = $createdTblPlanes->toArray();
        $this->assertArrayHasKey('id', $createdTblPlanes);
        $this->assertNotNull($createdTblPlanes['id'], 'Created TblPlanes must have id specified');
        $this->assertNotNull(TblPlanes::find($createdTblPlanes['id']), 'TblPlanes with given id must be in DB');
        $this->assertModelData($tblPlanes, $createdTblPlanes);
    }

    /**
     * @test read
     */
    public function testReadTblPlanes()
    {
        $tblPlanes = $this->makeTblPlanes();
        $dbTblPlanes = $this->tblPlanesRepo->find($tblPlanes->id);
        $dbTblPlanes = $dbTblPlanes->toArray();
        $this->assertModelData($tblPlanes->toArray(), $dbTblPlanes);
    }

    /**
     * @test update
     */
    public function testUpdateTblPlanes()
    {
        $tblPlanes = $this->makeTblPlanes();
        $fakeTblPlanes = $this->fakeTblPlanesData();
        $updatedTblPlanes = $this->tblPlanesRepo->update($fakeTblPlanes, $tblPlanes->id);
        $this->assertModelData($fakeTblPlanes, $updatedTblPlanes->toArray());
        $dbTblPlanes = $this->tblPlanesRepo->find($tblPlanes->id);
        $this->assertModelData($fakeTblPlanes, $dbTblPlanes->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblPlanes()
    {
        $tblPlanes = $this->makeTblPlanes();
        $resp = $this->tblPlanesRepo->delete($tblPlanes->id);
        $this->assertTrue($resp);
        $this->assertNull(TblPlanes::find($tblPlanes->id), 'TblPlanes should not exist in DB');
    }
}
