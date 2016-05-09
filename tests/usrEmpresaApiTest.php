<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class usrEmpresaApiTest extends TestCase
{
    use MakeusrEmpresaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateusrEmpresa()
    {
        $usrEmpresa = $this->fakeusrEmpresaData();
        $this->json('POST', '/api/v1/usrEmpresas', $usrEmpresa);

        $this->assertApiResponse($usrEmpresa);
    }

    /**
     * @test
     */
    public function testReadusrEmpresa()
    {
        $usrEmpresa = $this->makeusrEmpresa();
        $this->json('GET', '/api/v1/usrEmpresas/'.$usrEmpresa->id);

        $this->assertApiResponse($usrEmpresa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateusrEmpresa()
    {
        $usrEmpresa = $this->makeusrEmpresa();
        $editedusrEmpresa = $this->fakeusrEmpresaData();

        $this->json('PUT', '/api/v1/usrEmpresas/'.$usrEmpresa->id, $editedusrEmpresa);

        $this->assertApiResponse($editedusrEmpresa);
    }

    /**
     * @test
     */
    public function testDeleteusrEmpresa()
    {
        $usrEmpresa = $this->makeusrEmpresa();
        $this->json('DELETE', '/api/v1/usrEmpresas/'.$usrEmpresa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/usrEmpresas/'.$usrEmpresa->id);

        $this->assertResponseStatus(404);
    }
}
