<?php

use Faker\Factory as Faker;
use App\Models\Documentos;
use App\Repositories\DocumentosRepository;

trait MakeDocumentosTrait
{
    /**
     * Create fake instance of Documentos and save it in database
     *
     * @param array $documentosFields
     * @return Documentos
     */
    public function makeDocumentos($documentosFields = [])
    {
        /** @var DocumentosRepository $documentosRepo */
        $documentosRepo = App::make(DocumentosRepository::class);
        $theme = $this->fakeDocumentosData($documentosFields);
        return $documentosRepo->create($theme);
    }

    /**
     * Get fake instance of Documentos
     *
     * @param array $documentosFields
     * @return Documentos
     */
    public function fakeDocumentos($documentosFields = [])
    {
        return new Documentos($this->fakeDocumentosData($documentosFields));
    }

    /**
     * Get fake data of Documentos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDocumentosData($documentosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Documento' => $fake->word,
            'documento_empresa' => $fake->word,
            'pais_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $documentosFields);
    }
}
