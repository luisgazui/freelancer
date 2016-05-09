<?php

use App\Models\tblCodpais;
use App\Repositories\tblCodpaisRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tblCodpaisRepositoryTest extends TestCase
{
    use MaketblCodpaisTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var tblCodpaisRepository
     */
    protected $tblCodpaisRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblCodpaisRepo = App::make(tblCodpaisRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetblCodpais()
    {
        $tblCodpais = $this->faketblCodpaisData();
        $createdtblCodpais = $this->tblCodpaisRepo->create($tblCodpais);
        $createdtblCodpais = $createdtblCodpais->toArray();
        $this->assertArrayHasKey('id', $createdtblCodpais);
        $this->assertNotNull($createdtblCodpais['id'], 'Created tblCodpais must have id specified');
        $this->assertNotNull(tblCodpais::find($createdtblCodpais['id']), 'tblCodpais with given id must be in DB');
        $this->assertModelData($tblCodpais, $createdtblCodpais);
    }

    /**
     * @test read
     */
    public function testReadtblCodpais()
    {
        $tblCodpais = $this->maketblCodpais();
        $dbtblCodpais = $this->tblCodpaisRepo->find($tblCodpais->id);
        $dbtblCodpais = $dbtblCodpais->toArray();
        $this->assertModelData($tblCodpais->toArray(), $dbtblCodpais);
    }

    /**
     * @test update
     */
    public function testUpdatetblCodpais()
    {
        $tblCodpais = $this->maketblCodpais();
        $faketblCodpais = $this->faketblCodpaisData();
        $updatedtblCodpais = $this->tblCodpaisRepo->update($faketblCodpais, $tblCodpais->id);
        $this->assertModelData($faketblCodpais, $updatedtblCodpais->toArray());
        $dbtblCodpais = $this->tblCodpaisRepo->find($tblCodpais->id);
        $this->assertModelData($faketblCodpais, $dbtblCodpais->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetblCodpais()
    {
        $tblCodpais = $this->maketblCodpais();
        $resp = $this->tblCodpaisRepo->delete($tblCodpais->id);
        $this->assertTrue($resp);
        $this->assertNull(tblCodpais::find($tblCodpais->id), 'tblCodpais should not exist in DB');
    }
}
