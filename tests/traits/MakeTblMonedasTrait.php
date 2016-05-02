<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblMonedas;
use FreelancerOnline\Repositories\TblMonedasRepository;

trait MakeTblMonedasTrait
{
    /**
     * Create fake instance of TblMonedas and save it in database
     *
     * @param array $tblMonedasFields
     * @return TblMonedas
     */
    public function makeTblMonedas($tblMonedasFields = [])
    {
        /** @var TblMonedasRepository $tblMonedasRepo */
        $tblMonedasRepo = App::make(TblMonedasRepository::class);
        $theme = $this->fakeTblMonedasData($tblMonedasFields);
        return $tblMonedasRepo->create($theme);
    }

    /**
     * Get fake instance of TblMonedas
     *
     * @param array $tblMonedasFields
     * @return TblMonedas
     */
    public function fakeTblMonedas($tblMonedasFields = [])
    {
        return new TblMonedas($this->fakeTblMonedasData($tblMonedasFields));
    }

    /**
     * Get fake data of TblMonedas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblMonedasData($tblMonedasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Nombre' => $fake->word,
            'simbolo' => $fake->word,
            'pais_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblMonedasFields);
    }
}
