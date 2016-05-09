<?php

use App\Models\tblCategoriaemp;
use App\Repositories\tblCategoriaempRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tblCategoriaempRepositoryTest extends TestCase
{
    use MaketblCategoriaempTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var tblCategoriaempRepository
     */
    protected $tblCategoriaempRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblCategoriaempRepo = App::make(tblCategoriaempRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetblCategoriaemp()
    {
        $tblCategoriaemp = $this->faketblCategoriaempData();
        $createdtblCategoriaemp = $this->tblCategoriaempRepo->create($tblCategoriaemp);
        $createdtblCategoriaemp = $createdtblCategoriaemp->toArray();
        $this->assertArrayHasKey('id', $createdtblCategoriaemp);
        $this->assertNotNull($createdtblCategoriaemp['id'], 'Created tblCategoriaemp must have id specified');
        $this->assertNotNull(tblCategoriaemp::find($createdtblCategoriaemp['id']), 'tblCategoriaemp with given id must be in DB');
        $this->assertModelData($tblCategoriaemp, $createdtblCategoriaemp);
    }

    /**
     * @test read
     */
    public function testReadtblCategoriaemp()
    {
        $tblCategoriaemp = $this->maketblCategoriaemp();
        $dbtblCategoriaemp = $this->tblCategoriaempRepo->find($tblCategoriaemp->id);
        $dbtblCategoriaemp = $dbtblCategoriaemp->toArray();
        $this->assertModelData($tblCategoriaemp->toArray(), $dbtblCategoriaemp);
    }

    /**
     * @test update
     */
    public function testUpdatetblCategoriaemp()
    {
        $tblCategoriaemp = $this->maketblCategoriaemp();
        $faketblCategoriaemp = $this->faketblCategoriaempData();
        $updatedtblCategoriaemp = $this->tblCategoriaempRepo->update($faketblCategoriaemp, $tblCategoriaemp->id);
        $this->assertModelData($faketblCategoriaemp, $updatedtblCategoriaemp->toArray());
        $dbtblCategoriaemp = $this->tblCategoriaempRepo->find($tblCategoriaemp->id);
        $this->assertModelData($faketblCategoriaemp, $dbtblCategoriaemp->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetblCategoriaemp()
    {
        $tblCategoriaemp = $this->maketblCategoriaemp();
        $resp = $this->tblCategoriaempRepo->delete($tblCategoriaemp->id);
        $this->assertTrue($resp);
        $this->assertNull(tblCategoriaemp::find($tblCategoriaemp->id), 'tblCategoriaemp should not exist in DB');
    }
}
