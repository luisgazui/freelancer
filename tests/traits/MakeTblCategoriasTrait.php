<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblCategorias;
use FreelancerOnline\Repositories\TblCategoriasRepository;

trait MakeTblCategoriasTrait
{
    /**
     * Create fake instance of TblCategorias and save it in database
     *
     * @param array $tblCategoriasFields
     * @return TblCategorias
     */
    public function makeTblCategorias($tblCategoriasFields = [])
    {
        /** @var TblCategoriasRepository $tblCategoriasRepo */
        $tblCategoriasRepo = App::make(TblCategoriasRepository::class);
        $theme = $this->fakeTblCategoriasData($tblCategoriasFields);
        return $tblCategoriasRepo->create($theme);
    }

    /**
     * Get fake instance of TblCategorias
     *
     * @param array $tblCategoriasFields
     * @return TblCategorias
     */
    public function fakeTblCategorias($tblCategoriasFields = [])
    {
        return new TblCategorias($this->fakeTblCategoriasData($tblCategoriasFields));
    }

    /**
     * Get fake data of TblCategorias
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblCategoriasData($tblCategoriasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Area' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblCategoriasFields);
    }
}
