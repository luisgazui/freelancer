<?php

use App\Models\bancos;
use App\Repositories\bancosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class bancosRepositoryTest extends TestCase
{
    use MakebancosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var bancosRepository
     */
    protected $bancosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bancosRepo = App::make(bancosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatebancos()
    {
        $bancos = $this->fakebancosData();
        $createdbancos = $this->bancosRepo->create($bancos);
        $createdbancos = $createdbancos->toArray();
        $this->assertArrayHasKey('id', $createdbancos);
        $this->assertNotNull($createdbancos['id'], 'Created bancos must have id specified');
        $this->assertNotNull(bancos::find($createdbancos['id']), 'bancos with given id must be in DB');
        $this->assertModelData($bancos, $createdbancos);
    }

    /**
     * @test read
     */
    public function testReadbancos()
    {
        $bancos = $this->makebancos();
        $dbbancos = $this->bancosRepo->find($bancos->id);
        $dbbancos = $dbbancos->toArray();
        $this->assertModelData($bancos->toArray(), $dbbancos);
    }

    /**
     * @test update
     */
    public function testUpdatebancos()
    {
        $bancos = $this->makebancos();
        $fakebancos = $this->fakebancosData();
        $updatedbancos = $this->bancosRepo->update($fakebancos, $bancos->id);
        $this->assertModelData($fakebancos, $updatedbancos->toArray());
        $dbbancos = $this->bancosRepo->find($bancos->id);
        $this->assertModelData($fakebancos, $dbbancos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletebancos()
    {
        $bancos = $this->makebancos();
        $resp = $this->bancosRepo->delete($bancos->id);
        $this->assertTrue($resp);
        $this->assertNull(bancos::find($bancos->id), 'bancos should not exist in DB');
    }
}
