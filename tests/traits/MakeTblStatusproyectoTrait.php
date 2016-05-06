<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblStatusproyecto;
use FreelancerOnline\Repositories\TblStatusproyectoRepository;

trait MakeTblStatusproyectoTrait
{
    /**
     * Create fake instance of TblStatusproyecto and save it in database
     *
     * @param array $tblStatusproyectoFields
     * @return TblStatusproyecto
     */
    public function makeTblStatusproyecto($tblStatusproyectoFields = [])
    {
        /** @var TblStatusproyectoRepository $tblStatusproyectoRepo */
        $tblStatusproyectoRepo = App::make(TblStatusproyectoRepository::class);
        $theme = $this->fakeTblStatusproyectoData($tblStatusproyectoFields);
        return $tblStatusproyectoRepo->create($theme);
    }

    /**
     * Get fake instance of TblStatusproyecto
     *
     * @param array $tblStatusproyectoFields
     * @return TblStatusproyecto
     */
    public function fakeTblStatusproyecto($tblStatusproyectoFields = [])
    {
        return new TblStatusproyecto($this->fakeTblStatusproyectoData($tblStatusproyectoFields));
    }

    /**
     * Get fake data of TblStatusproyecto
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblStatusproyectoData($tblStatusproyectoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'status' => $fake->word
        ], $tblStatusproyectoFields);
    }
}
