<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblTipousuario;
use FreelancerOnline\Repositories\TblTipousuarioRepository;

trait MakeTblTipousuarioTrait
{
    /**
     * Create fake instance of TblTipousuario and save it in database
     *
     * @param array $tblTipousuarioFields
     * @return TblTipousuario
     */
    public function makeTblTipousuario($tblTipousuarioFields = [])
    {
        /** @var TblTipousuarioRepository $tblTipousuarioRepo */
        $tblTipousuarioRepo = App::make(TblTipousuarioRepository::class);
        $theme = $this->fakeTblTipousuarioData($tblTipousuarioFields);
        return $tblTipousuarioRepo->create($theme);
    }

    /**
     * Get fake instance of TblTipousuario
     *
     * @param array $tblTipousuarioFields
     * @return TblTipousuario
     */
    public function fakeTblTipousuario($tblTipousuarioFields = [])
    {
        return new TblTipousuario($this->fakeTblTipousuarioData($tblTipousuarioFields));
    }

    /**
     * Get fake data of TblTipousuario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblTipousuarioData($tblTipousuarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tipou' => $fake->word,
            'empresa' => $fake->word
        ], $tblTipousuarioFields);
    }
}
