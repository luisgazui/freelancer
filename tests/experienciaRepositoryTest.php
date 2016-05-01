<?php

use App\Models\experiencia;
use App\Repositories\experienciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class experienciaRepositoryTest extends TestCase
{
    use MakeexperienciaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var experienciaRepository
     */
    protected $experienciaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->experienciaRepo = App::make(experienciaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateexperiencia()
    {
        $experiencia = $this->fakeexperienciaData();
        $createdexperiencia = $this->experienciaRepo->create($experiencia);
        $createdexperiencia = $createdexperiencia->toArray();
        $this->assertArrayHasKey('id', $createdexperiencia);
        $this->assertNotNull($createdexperiencia['id'], 'Created experiencia must have id specified');
        $this->assertNotNull(experiencia::find($createdexperiencia['id']), 'experiencia with given id must be in DB');
        $this->assertModelData($experiencia, $createdexperiencia);
    }

    /**
     * @test read
     */
    public function testReadexperiencia()
    {
        $experiencia = $this->makeexperiencia();
        $dbexperiencia = $this->experienciaRepo->find($experiencia->id);
        $dbexperiencia = $dbexperiencia->toArray();
        $this->assertModelData($experiencia->toArray(), $dbexperiencia);
    }

    /**
     * @test update
     */
    public function testUpdateexperiencia()
    {
        $experiencia = $this->makeexperiencia();
        $fakeexperiencia = $this->fakeexperienciaData();
        $updatedexperiencia = $this->experienciaRepo->update($fakeexperiencia, $experiencia->id);
        $this->assertModelData($fakeexperiencia, $updatedexperiencia->toArray());
        $dbexperiencia = $this->experienciaRepo->find($experiencia->id);
        $this->assertModelData($fakeexperiencia, $dbexperiencia->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteexperiencia()
    {
        $experiencia = $this->makeexperiencia();
        $resp = $this->experienciaRepo->delete($experiencia->id);
        $this->assertTrue($resp);
        $this->assertNull(experiencia::find($experiencia->id), 'experiencia should not exist in DB');
    }
}
