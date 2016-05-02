<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblBancos;
use FreelancerOnline\Repositories\TblBancosRepository;

trait MakeTblBancosTrait
{
    /**
     * Create fake instance of TblBancos and save it in database
     *
     * @param array $tblBancosFields
     * @return TblBancos
     */
    public function makeTblBancos($tblBancosFields = [])
    {
        /** @var TblBancosRepository $tblBancosRepo */
        $tblBancosRepo = App::make(TblBancosRepository::class);
        $theme = $this->fakeTblBancosData($tblBancosFields);
        return $tblBancosRepo->create($theme);
    }

    /**
     * Get fake instance of TblBancos
     *
     * @param array $tblBancosFields
     * @return TblBancos
     */
    public function fakeTblBancos($tblBancosFields = [])
    {
        return new TblBancos($this->fakeTblBancosData($tblBancosFields));
    }

    /**
     * Get fake data of TblBancos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblBancosData($tblBancosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'NombreB' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'Pais_id' => $fake->word
        ], $tblBancosFields);
    }
}
