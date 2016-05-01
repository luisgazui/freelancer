<?php

use App\Models\paises;
use App\Repositories\paisesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class paisesRepositoryTest extends TestCase
{
    use MakepaisesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var paisesRepository
     */
    protected $paisesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paisesRepo = App::make(paisesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatepaises()
    {
        $paises = $this->fakepaisesData();
        $createdpaises = $this->paisesRepo->create($paises);
        $createdpaises = $createdpaises->toArray();
        $this->assertArrayHasKey('id', $createdpaises);
        $this->assertNotNull($createdpaises['id'], 'Created paises must have id specified');
        $this->assertNotNull(paises::find($createdpaises['id']), 'paises with given id must be in DB');
        $this->assertModelData($paises, $createdpaises);
    }

    /**
     * @test read
     */
    public function testReadpaises()
    {
        $paises = $this->makepaises();
        $dbpaises = $this->paisesRepo->find($paises->id);
        $dbpaises = $dbpaises->toArray();
        $this->assertModelData($paises->toArray(), $dbpaises);
    }

    /**
     * @test update
     */
    public function testUpdatepaises()
    {
        $paises = $this->makepaises();
        $fakepaises = $this->fakepaisesData();
        $updatedpaises = $this->paisesRepo->update($fakepaises, $paises->id);
        $this->assertModelData($fakepaises, $updatedpaises->toArray());
        $dbpaises = $this->paisesRepo->find($paises->id);
        $this->assertModelData($fakepaises, $dbpaises->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletepaises()
    {
        $paises = $this->makepaises();
        $resp = $this->paisesRepo->delete($paises->id);
        $this->assertTrue($resp);
        $this->assertNull(paises::find($paises->id), 'paises should not exist in DB');
    }
}
