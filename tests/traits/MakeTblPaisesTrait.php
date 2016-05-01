<?php

use Faker\Factory as Faker;
use App\Models\TblPaises;
use App\Repositories\TblPaisesRepository;

trait MakeTblPaisesTrait
{
    /**
     * Create fake instance of TblPaises and save it in database
     *
     * @param array $tblPaisesFields
     * @return TblPaises
     */
    public function makeTblPaises($tblPaisesFields = [])
    {
        /** @var TblPaisesRepository $tblPaisesRepo */
        $tblPaisesRepo = App::make(TblPaisesRepository::class);
        $theme = $this->fakeTblPaisesData($tblPaisesFields);
        return $tblPaisesRepo->create($theme);
    }

    /**
     * Get fake instance of TblPaises
     *
     * @param array $tblPaisesFields
     * @return TblPaises
     */
    public function fakeTblPaises($tblPaisesFields = [])
    {
        return new TblPaises($this->fakeTblPaisesData($tblPaisesFields));
    }

    /**
     * Get fake data of TblPaises
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblPaisesData($tblPaisesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Pais' => $fake->word
        ], $tblPaisesFields);
    }
}
