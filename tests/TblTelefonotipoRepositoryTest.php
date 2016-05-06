<?php

use App\Models\TblTelefonotipo;
use App\Repositories\TblTelefonotipoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTelefonotipoRepositoryTest extends TestCase
{
    use MakeTblTelefonotipoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblTelefonotipoRepository
     */
    protected $tblTelefonotipoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblTelefonotipoRepo = App::make(TblTelefonotipoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblTelefonotipo()
    {
        $tblTelefonotipo = $this->fakeTblTelefonotipoData();
        $createdTblTelefonotipo = $this->tblTelefonotipoRepo->create($tblTelefonotipo);
        $createdTblTelefonotipo = $createdTblTelefonotipo->toArray();
        $this->assertArrayHasKey('id', $createdTblTelefonotipo);
        $this->assertNotNull($createdTblTelefonotipo['id'], 'Created TblTelefonotipo must have id specified');
        $this->assertNotNull(TblTelefonotipo::find($createdTblTelefonotipo['id']), 'TblTelefonotipo with given id must be in DB');
        $this->assertModelData($tblTelefonotipo, $createdTblTelefonotipo);
    }

    /**
     * @test read
     */
    public function testReadTblTelefonotipo()
    {
        $tblTelefonotipo = $this->makeTblTelefonotipo();
        $dbTblTelefonotipo = $this->tblTelefonotipoRepo->find($tblTelefonotipo->id);
        $dbTblTelefonotipo = $dbTblTelefonotipo->toArray();
        $this->assertModelData($tblTelefonotipo->toArray(), $dbTblTelefonotipo);
    }

    /**
     * @test update
     */
    public function testUpdateTblTelefonotipo()
    {
        $tblTelefonotipo = $this->makeTblTelefonotipo();
        $fakeTblTelefonotipo = $this->fakeTblTelefonotipoData();
        $updatedTblTelefonotipo = $this->tblTelefonotipoRepo->update($fakeTblTelefonotipo, $tblTelefonotipo->id);
        $this->assertModelData($fakeTblTelefonotipo, $updatedTblTelefonotipo->toArray());
        $dbTblTelefonotipo = $this->tblTelefonotipoRepo->find($tblTelefonotipo->id);
        $this->assertModelData($fakeTblTelefonotipo, $dbTblTelefonotipo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblTelefonotipo()
    {
        $tblTelefonotipo = $this->makeTblTelefonotipo();
        $resp = $this->tblTelefonotipoRepo->delete($tblTelefonotipo->id);
        $this->assertTrue($resp);
        $this->assertNull(TblTelefonotipo::find($tblTelefonotipo->id), 'TblTelefonotipo should not exist in DB');
    }
}
