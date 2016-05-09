<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\usrEmpresa;
use FreelancerOnline\Repositories\usrEmpresaRepository;

trait MakeusrEmpresaTrait
{
    /**
     * Create fake instance of usrEmpresa and save it in database
     *
     * @param array $usrEmpresaFields
     * @return usrEmpresa
     */
    public function makeusrEmpresa($usrEmpresaFields = [])
    {
        /** @var usrEmpresaRepository $usrEmpresaRepo */
        $usrEmpresaRepo = App::make(usrEmpresaRepository::class);
        $theme = $this->fakeusrEmpresaData($usrEmpresaFields);
        return $usrEmpresaRepo->create($theme);
    }

    /**
     * Get fake instance of usrEmpresa
     *
     * @param array $usrEmpresaFields
     * @return usrEmpresa
     */
    public function fakeusrEmpresa($usrEmpresaFields = [])
    {
        return new usrEmpresa($this->fakeusrEmpresaData($usrEmpresaFields));
    }

    /**
     * Get fake data of usrEmpresa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeusrEmpresaData($usrEmpresaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomemp' => $fake->word
        ], $usrEmpresaFields);
    }
}
