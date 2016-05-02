<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblDuracion;
use FreelancerOnline\Repositories\TblDuracionRepository;

trait MakeTblDuracionTrait
{
    /**
     * Create fake instance of TblDuracion and save it in database
     *
     * @param array $tblDuracionFields
     * @return TblDuracion
     */
    public function makeTblDuracion($tblDuracionFields = [])
    {
        /** @var TblDuracionRepository $tblDuracionRepo */
        $tblDuracionRepo = App::make(TblDuracionRepository::class);
        $theme = $this->fakeTblDuracionData($tblDuracionFields);
        return $tblDuracionRepo->create($theme);
    }

    /**
     * Get fake instance of TblDuracion
     *
     * @param array $tblDuracionFields
     * @return TblDuracion
     */
    public function fakeTblDuracion($tblDuracionFields = [])
    {
        return new TblDuracion($this->fakeTblDuracionData($tblDuracionFields));
    }

    /**
     * Get fake data of TblDuracion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblDuracionData($tblDuracionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Duracion' => $fake->word,
            'Tiempo' => $fake->randomDigitNotNull
        ], $tblDuracionFields);
    }
}
