<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblEspecialidad;
use FreelancerOnline\Repositories\TblEspecialidadRepository;

trait MakeTblEspecialidadTrait
{
    /**
     * Create fake instance of TblEspecialidad and save it in database
     *
     * @param array $tblEspecialidadFields
     * @return TblEspecialidad
     */
    public function makeTblEspecialidad($tblEspecialidadFields = [])
    {
        /** @var TblEspecialidadRepository $tblEspecialidadRepo */
        $tblEspecialidadRepo = App::make(TblEspecialidadRepository::class);
        $theme = $this->fakeTblEspecialidadData($tblEspecialidadFields);
        return $tblEspecialidadRepo->create($theme);
    }

    /**
     * Get fake instance of TblEspecialidad
     *
     * @param array $tblEspecialidadFields
     * @return TblEspecialidad
     */
    public function fakeTblEspecialidad($tblEspecialidadFields = [])
    {
        return new TblEspecialidad($this->fakeTblEspecialidadData($tblEspecialidadFields));
    }

    /**
     * Get fake data of TblEspecialidad
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblEspecialidadData($tblEspecialidadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'especialidad' => $fake->word,
            'tempo_exp' => $fake->randomDigitNotNull
        ], $tblEspecialidadFields);
    }
}
