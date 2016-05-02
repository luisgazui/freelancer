<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblTitulos;
use FreelancerOnline\Repositories\TblTitulosRepository;

trait MakeTblTitulosTrait
{
    /**
     * Create fake instance of TblTitulos and save it in database
     *
     * @param array $tblTitulosFields
     * @return TblTitulos
     */
    public function makeTblTitulos($tblTitulosFields = [])
    {
        /** @var TblTitulosRepository $tblTitulosRepo */
        $tblTitulosRepo = App::make(TblTitulosRepository::class);
        $theme = $this->fakeTblTitulosData($tblTitulosFields);
        return $tblTitulosRepo->create($theme);
    }

    /**
     * Get fake instance of TblTitulos
     *
     * @param array $tblTitulosFields
     * @return TblTitulos
     */
    public function fakeTblTitulos($tblTitulosFields = [])
    {
        return new TblTitulos($this->fakeTblTitulosData($tblTitulosFields));
    }

    /**
     * Get fake data of TblTitulos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblTitulosData($tblTitulosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Descripcion' => $fake->word,
            'Anno_est' => $fake->randomDigitNotNull,
            'tipo' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblTitulosFields);
    }
}
