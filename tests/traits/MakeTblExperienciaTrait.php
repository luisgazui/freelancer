<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblExperiencia;
use FreelancerOnline\Repositories\TblExperienciaRepository;

trait MakeTblExperienciaTrait
{
    /**
     * Create fake instance of TblExperiencia and save it in database
     *
     * @param array $tblExperienciaFields
     * @return TblExperiencia
     */
    public function makeTblExperiencia($tblExperienciaFields = [])
    {
        /** @var TblExperienciaRepository $tblExperienciaRepo */
        $tblExperienciaRepo = App::make(TblExperienciaRepository::class);
        $theme = $this->fakeTblExperienciaData($tblExperienciaFields);
        return $tblExperienciaRepo->create($theme);
    }

    /**
     * Get fake instance of TblExperiencia
     *
     * @param array $tblExperienciaFields
     * @return TblExperiencia
     */
    public function fakeTblExperiencia($tblExperienciaFields = [])
    {
        return new TblExperiencia($this->fakeTblExperienciaData($tblExperienciaFields));
    }

    /**
     * Get fake data of TblExperiencia
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblExperienciaData($tblExperienciaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Descripcion' => $fake->word,
            'Annos_Exp' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblExperienciaFields);
    }
}
