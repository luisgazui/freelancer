<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblTipoInstrumento;
use FreelancerOnline\Repositories\TblTipoInstrumentoRepository;

trait MakeTblTipoInstrumentoTrait
{
    /**
     * Create fake instance of TblTipoInstrumento and save it in database
     *
     * @param array $tblTipoInstrumentoFields
     * @return TblTipoInstrumento
     */
    public function makeTblTipoInstrumento($tblTipoInstrumentoFields = [])
    {
        /** @var TblTipoInstrumentoRepository $tblTipoInstrumentoRepo */
        $tblTipoInstrumentoRepo = App::make(TblTipoInstrumentoRepository::class);
        $theme = $this->fakeTblTipoInstrumentoData($tblTipoInstrumentoFields);
        return $tblTipoInstrumentoRepo->create($theme);
    }

    /**
     * Get fake instance of TblTipoInstrumento
     *
     * @param array $tblTipoInstrumentoFields
     * @return TblTipoInstrumento
     */
    public function fakeTblTipoInstrumento($tblTipoInstrumentoFields = [])
    {
        return new TblTipoInstrumento($this->fakeTblTipoInstrumentoData($tblTipoInstrumentoFields));
    }

    /**
     * Get fake data of TblTipoInstrumento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblTipoInstrumentoData($tblTipoInstrumentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'instrumento' => $fake->word
        ], $tblTipoInstrumentoFields);
    }
}
