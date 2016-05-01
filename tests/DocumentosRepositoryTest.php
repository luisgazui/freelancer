<?php

use App\Models\Documentos;
use App\Repositories\DocumentosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentosRepositoryTest extends TestCase
{
    use MakeDocumentosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DocumentosRepository
     */
    protected $documentosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->documentosRepo = App::make(DocumentosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDocumentos()
    {
        $documentos = $this->fakeDocumentosData();
        $createdDocumentos = $this->documentosRepo->create($documentos);
        $createdDocumentos = $createdDocumentos->toArray();
        $this->assertArrayHasKey('id', $createdDocumentos);
        $this->assertNotNull($createdDocumentos['id'], 'Created Documentos must have id specified');
        $this->assertNotNull(Documentos::find($createdDocumentos['id']), 'Documentos with given id must be in DB');
        $this->assertModelData($documentos, $createdDocumentos);
    }

    /**
     * @test read
     */
    public function testReadDocumentos()
    {
        $documentos = $this->makeDocumentos();
        $dbDocumentos = $this->documentosRepo->find($documentos->id);
        $dbDocumentos = $dbDocumentos->toArray();
        $this->assertModelData($documentos->toArray(), $dbDocumentos);
    }

    /**
     * @test update
     */
    public function testUpdateDocumentos()
    {
        $documentos = $this->makeDocumentos();
        $fakeDocumentos = $this->fakeDocumentosData();
        $updatedDocumentos = $this->documentosRepo->update($fakeDocumentos, $documentos->id);
        $this->assertModelData($fakeDocumentos, $updatedDocumentos->toArray());
        $dbDocumentos = $this->documentosRepo->find($documentos->id);
        $this->assertModelData($fakeDocumentos, $dbDocumentos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDocumentos()
    {
        $documentos = $this->makeDocumentos();
        $resp = $this->documentosRepo->delete($documentos->id);
        $this->assertTrue($resp);
        $this->assertNull(Documentos::find($documentos->id), 'Documentos should not exist in DB');
    }
}
