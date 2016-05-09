<?php

use App\Models\usrEmpresa;
use App\Repositories\usrEmpresaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class usrEmpresaRepositoryTest extends TestCase
{
    use MakeusrEmpresaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var usrEmpresaRepository
     */
    protected $usrEmpresaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->usrEmpresaRepo = App::make(usrEmpresaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateusrEmpresa()
    {
        $usrEmpresa = $this->fakeusrEmpresaData();
        $createdusrEmpresa = $this->usrEmpresaRepo->create($usrEmpresa);
        $createdusrEmpresa = $createdusrEmpresa->toArray();
        $this->assertArrayHasKey('id', $createdusrEmpresa);
        $this->assertNotNull($createdusrEmpresa['id'], 'Created usrEmpresa must have id specified');
        $this->assertNotNull(usrEmpresa::find($createdusrEmpresa['id']), 'usrEmpresa with given id must be in DB');
        $this->assertModelData($usrEmpresa, $createdusrEmpresa);
    }

    /**
     * @test read
     */
    public function testReadusrEmpresa()
    {
        $usrEmpresa = $this->makeusrEmpresa();
        $dbusrEmpresa = $this->usrEmpresaRepo->find($usrEmpresa->id);
        $dbusrEmpresa = $dbusrEmpresa->toArray();
        $this->assertModelData($usrEmpresa->toArray(), $dbusrEmpresa);
    }

    /**
     * @test update
     */
    public function testUpdateusrEmpresa()
    {
        $usrEmpresa = $this->makeusrEmpresa();
        $fakeusrEmpresa = $this->fakeusrEmpresaData();
        $updatedusrEmpresa = $this->usrEmpresaRepo->update($fakeusrEmpresa, $usrEmpresa->id);
        $this->assertModelData($fakeusrEmpresa, $updatedusrEmpresa->toArray());
        $dbusrEmpresa = $this->usrEmpresaRepo->find($usrEmpresa->id);
        $this->assertModelData($fakeusrEmpresa, $dbusrEmpresa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteusrEmpresa()
    {
        $usrEmpresa = $this->makeusrEmpresa();
        $resp = $this->usrEmpresaRepo->delete($usrEmpresa->id);
        $this->assertTrue($resp);
        $this->assertNull(usrEmpresa::find($usrEmpresa->id), 'usrEmpresa should not exist in DB');
    }
}
