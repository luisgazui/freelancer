<?php

use App\Models\TblTipousuario;
use App\Repositories\TblTipousuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TblTipousuarioRepositoryTest extends TestCase
{
    use MakeTblTipousuarioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TblTipousuarioRepository
     */
    protected $tblTipousuarioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tblTipousuarioRepo = App::make(TblTipousuarioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTblTipousuario()
    {
        $tblTipousuario = $this->fakeTblTipousuarioData();
        $createdTblTipousuario = $this->tblTipousuarioRepo->create($tblTipousuario);
        $createdTblTipousuario = $createdTblTipousuario->toArray();
        $this->assertArrayHasKey('id', $createdTblTipousuario);
        $this->assertNotNull($createdTblTipousuario['id'], 'Created TblTipousuario must have id specified');
        $this->assertNotNull(TblTipousuario::find($createdTblTipousuario['id']), 'TblTipousuario with given id must be in DB');
        $this->assertModelData($tblTipousuario, $createdTblTipousuario);
    }

    /**
     * @test read
     */
    public function testReadTblTipousuario()
    {
        $tblTipousuario = $this->makeTblTipousuario();
        $dbTblTipousuario = $this->tblTipousuarioRepo->find($tblTipousuario->id);
        $dbTblTipousuario = $dbTblTipousuario->toArray();
        $this->assertModelData($tblTipousuario->toArray(), $dbTblTipousuario);
    }

    /**
     * @test update
     */
    public function testUpdateTblTipousuario()
    {
        $tblTipousuario = $this->makeTblTipousuario();
        $fakeTblTipousuario = $this->fakeTblTipousuarioData();
        $updatedTblTipousuario = $this->tblTipousuarioRepo->update($fakeTblTipousuario, $tblTipousuario->id);
        $this->assertModelData($fakeTblTipousuario, $updatedTblTipousuario->toArray());
        $dbTblTipousuario = $this->tblTipousuarioRepo->find($tblTipousuario->id);
        $this->assertModelData($fakeTblTipousuario, $dbTblTipousuario->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTblTipousuario()
    {
        $tblTipousuario = $this->makeTblTipousuario();
        $resp = $this->tblTipousuarioRepo->delete($tblTipousuario->id);
        $this->assertTrue($resp);
        $this->assertNull(TblTipousuario::find($tblTipousuario->id), 'TblTipousuario should not exist in DB');
    }
}
