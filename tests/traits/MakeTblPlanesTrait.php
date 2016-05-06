<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblPlanes;
use FreelancerOnline\Repositories\TblPlanesRepository;

trait MakeTblPlanesTrait
{
    /**
     * Create fake instance of TblPlanes and save it in database
     *
     * @param array $tblPlanesFields
     * @return TblPlanes
     */
    public function makeTblPlanes($tblPlanesFields = [])
    {
        /** @var TblPlanesRepository $tblPlanesRepo */
        $tblPlanesRepo = App::make(TblPlanesRepository::class);
        $theme = $this->fakeTblPlanesData($tblPlanesFields);
        return $tblPlanesRepo->create($theme);
    }

    /**
     * Get fake instance of TblPlanes
     *
     * @param array $tblPlanesFields
     * @return TblPlanes
     */
    public function fakeTblPlanes($tblPlanesFields = [])
    {
        return new TblPlanes($this->fakeTblPlanesData($tblPlanesFields));
    }

    /**
     * Get fake data of TblPlanes
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblPlanesData($tblPlanesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombreplan' => $fake->word,
            'costo' => $fake->word,
            'vigencia' => $fake->randomDigitNotNull,
            'imagen' => $fake->word,
            'numeroproyectos' => $fake->randomDigitNotNull,
            'numeroexperiencias' => $fake->randomDigitNotNull
        ], $tblPlanesFields);
    }
}
