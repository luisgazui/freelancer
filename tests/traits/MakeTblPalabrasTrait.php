<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblPalabras;
use FreelancerOnline\Repositories\TblPalabrasRepository;

trait MakeTblPalabrasTrait
{
    /**
     * Create fake instance of TblPalabras and save it in database
     *
     * @param array $tblPalabrasFields
     * @return TblPalabras
     */
    public function makeTblPalabras($tblPalabrasFields = [])
    {
        /** @var TblPalabrasRepository $tblPalabrasRepo */
        $tblPalabrasRepo = App::make(TblPalabrasRepository::class);
        $theme = $this->fakeTblPalabrasData($tblPalabrasFields);
        return $tblPalabrasRepo->create($theme);
    }

    /**
     * Get fake instance of TblPalabras
     *
     * @param array $tblPalabrasFields
     * @return TblPalabras
     */
    public function fakeTblPalabras($tblPalabrasFields = [])
    {
        return new TblPalabras($this->fakeTblPalabrasData($tblPalabrasFields));
    }

    /**
     * Get fake data of TblPalabras
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblPalabrasData($tblPalabrasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Palabra' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblPalabrasFields);
    }
}
