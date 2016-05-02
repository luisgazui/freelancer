<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblSubCategorias;
use FreelancerOnline\Repositories\TblSubCategoriasRepository;

trait MakeTblSubCategoriasTrait
{
    /**
     * Create fake instance of TblSubCategorias and save it in database
     *
     * @param array $tblSubCategoriasFields
     * @return TblSubCategorias
     */
    public function makeTblSubCategorias($tblSubCategoriasFields = [])
    {
        /** @var TblSubCategoriasRepository $tblSubCategoriasRepo */
        $tblSubCategoriasRepo = App::make(TblSubCategoriasRepository::class);
        $theme = $this->fakeTblSubCategoriasData($tblSubCategoriasFields);
        return $tblSubCategoriasRepo->create($theme);
    }

    /**
     * Get fake instance of TblSubCategorias
     *
     * @param array $tblSubCategoriasFields
     * @return TblSubCategorias
     */
    public function fakeTblSubCategorias($tblSubCategoriasFields = [])
    {
        return new TblSubCategorias($this->fakeTblSubCategoriasData($tblSubCategoriasFields));
    }

    /**
     * Get fake data of TblSubCategorias
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblSubCategoriasData($tblSubCategoriasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'AreaS' => $fake->word,
            'Categorias_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblSubCategoriasFields);
    }
}
