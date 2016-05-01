<?php

use App\Models\categorias;
use App\Repositories\categoriasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class categoriasRepositoryTest extends TestCase
{
    use MakecategoriasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var categoriasRepository
     */
    protected $categoriasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->categoriasRepo = App::make(categoriasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecategorias()
    {
        $categorias = $this->fakecategoriasData();
        $createdcategorias = $this->categoriasRepo->create($categorias);
        $createdcategorias = $createdcategorias->toArray();
        $this->assertArrayHasKey('id', $createdcategorias);
        $this->assertNotNull($createdcategorias['id'], 'Created categorias must have id specified');
        $this->assertNotNull(categorias::find($createdcategorias['id']), 'categorias with given id must be in DB');
        $this->assertModelData($categorias, $createdcategorias);
    }

    /**
     * @test read
     */
    public function testReadcategorias()
    {
        $categorias = $this->makecategorias();
        $dbcategorias = $this->categoriasRepo->find($categorias->id);
        $dbcategorias = $dbcategorias->toArray();
        $this->assertModelData($categorias->toArray(), $dbcategorias);
    }

    /**
     * @test update
     */
    public function testUpdatecategorias()
    {
        $categorias = $this->makecategorias();
        $fakecategorias = $this->fakecategoriasData();
        $updatedcategorias = $this->categoriasRepo->update($fakecategorias, $categorias->id);
        $this->assertModelData($fakecategorias, $updatedcategorias->toArray());
        $dbcategorias = $this->categoriasRepo->find($categorias->id);
        $this->assertModelData($fakecategorias, $dbcategorias->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecategorias()
    {
        $categorias = $this->makecategorias();
        $resp = $this->categoriasRepo->delete($categorias->id);
        $this->assertTrue($resp);
        $this->assertNull(categorias::find($categorias->id), 'categorias should not exist in DB');
    }
}
