<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\TblDocumentos;
use FreelancerOnline\Repositories\TblDocumentosRepository;

trait MakeTblDocumentosTrait
{
    /**
     * Create fake instance of TblDocumentos and save it in database
     *
     * @param array $tblDocumentosFields
     * @return TblDocumentos
     */
    public function makeTblDocumentos($tblDocumentosFields = [])
    {
        /** @var TblDocumentosRepository $tblDocumentosRepo */
        $tblDocumentosRepo = App::make(TblDocumentosRepository::class);
        $theme = $this->fakeTblDocumentosData($tblDocumentosFields);
        return $tblDocumentosRepo->create($theme);
    }

    /**
     * Get fake instance of TblDocumentos
     *
     * @param array $tblDocumentosFields
     * @return TblDocumentos
     */
    public function fakeTblDocumentos($tblDocumentosFields = [])
    {
        return new TblDocumentos($this->fakeTblDocumentosData($tblDocumentosFields));
    }

    /**
     * Get fake data of TblDocumentos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTblDocumentosData($tblDocumentosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Documento' => $fake->word,
            'Pais_id' => $fake->randomDigitNotNull,
            'Empresa' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tblDocumentosFields);
    }
}
