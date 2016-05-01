<?php

use Faker\Factory as Faker;
use App\Models\experiencia;
use App\Repositories\experienciaRepository;

trait MakeexperienciaTrait
{
    /**
     * Create fake instance of experiencia and save it in database
     *
     * @param array $experienciaFields
     * @return experiencia
     */
    public function makeexperiencia($experienciaFields = [])
    {
        /** @var experienciaRepository $experienciaRepo */
        $experienciaRepo = App::make(experienciaRepository::class);
        $theme = $this->fakeexperienciaData($experienciaFields);
        return $experienciaRepo->create($theme);
    }

    /**
     * Get fake instance of experiencia
     *
     * @param array $experienciaFields
     * @return experiencia
     */
    public function fakeexperiencia($experienciaFields = [])
    {
        return new experiencia($this->fakeexperienciaData($experienciaFields));
    }

    /**
     * Get fake data of experiencia
     *
     * @param array $postFields
     * @return array
     */
    public function fakeexperienciaData($experienciaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descripcion' => $fake->word,
            'annos' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $experienciaFields);
    }
}
