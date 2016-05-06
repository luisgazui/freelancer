<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblTelefonotipo;
use FreelancerOnline\Repositories\TblTelefonotipoRepository;

trait MakeTblTelefonotipoTrait
{
    /**
     * Create fake instance of TblTelefonotipo and save it in database
     *
     * @param array $tblTelefonotipoFields
     * @return TblTelefonotipo
     */
    public function makeTblTelefonotipo($tblTelefonotipoFields = [])
    {
        /** @var TblTelefonotipoRepository $tblTelefonotipoRepo */
        $tblTelefonotipoRepo = App::make(TblTelefonotipoRepository::class);
        $theme = $this->fakeTblTelefonotipoData($tblTelefonotipoFields);
        return $tblTelefonotipoRepo->create($theme);
    }

    /**
     * Get fake instance of TblTelefonotipo
     *
     * @param array $tblTelefonotipoFields
     * @return TblTelefonotipo
     */
    public function fakeTblTelefonotipo($tblTelefonotipoFields = [])
    {
        return new TblTelefonotipo($this->fakeTblTelefonotipoData($tblTelefonotipoFields));
    }

    /**
     * Get fake data of TblTelefonotipo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblTelefonotipoData($tblTelefonotipoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Codigo' => $fake->word,
            'pais_id' => $fake->randomDigitNotNull
        ], $tblTelefonotipoFields);
    }
}
