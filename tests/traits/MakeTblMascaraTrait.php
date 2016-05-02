<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblMascara;
use FreelancerOnline\Repositories\TblMascaraRepository;

trait MakeTblMascaraTrait
{
    /**
     * Create fake instance of TblMascara and save it in database
     *
     * @param array $tblMascaraFields
     * @return TblMascara
     */
    public function makeTblMascara($tblMascaraFields = [])
    {
        /** @var TblMascaraRepository $tblMascaraRepo */
        $tblMascaraRepo = App::make(TblMascaraRepository::class);
        $theme = $this->fakeTblMascaraData($tblMascaraFields);
        return $tblMascaraRepo->create($theme);
    }

    /**
     * Get fake instance of TblMascara
     *
     * @param array $tblMascaraFields
     * @return TblMascara
     */
    public function fakeTblMascara($tblMascaraFields = [])
    {
        return new TblMascara($this->fakeTblMascaraData($tblMascaraFields));
    }

    /**
     * Get fake data of TblMascara
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblMascaraData($tblMascaraFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Mascara' => $fake->word
        ], $tblMascaraFields);
    }
}
