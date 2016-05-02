<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblSanciones;
use FreelancerOnline\Repositories\TblSancionesRepository;

trait MakeTblSancionesTrait
{
    /**
     * Create fake instance of TblSanciones and save it in database
     *
     * @param array $tblSancionesFields
     * @return TblSanciones
     */
    public function makeTblSanciones($tblSancionesFields = [])
    {
        /** @var TblSancionesRepository $tblSancionesRepo */
        $tblSancionesRepo = App::make(TblSancionesRepository::class);
        $theme = $this->fakeTblSancionesData($tblSancionesFields);
        return $tblSancionesRepo->create($theme);
    }

    /**
     * Get fake instance of TblSanciones
     *
     * @param array $tblSancionesFields
     * @return TblSanciones
     */
    public function fakeTblSanciones($tblSancionesFields = [])
    {
        return new TblSanciones($this->fakeTblSancionesData($tblSancionesFields));
    }

    /**
     * Get fake data of TblSanciones
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblSancionesData($tblSancionesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Severidad' => $fake->randomDigitNotNull,
            'Descripcion' => $fake->word,
            'Duracion_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblSancionesFields);
    }
}
