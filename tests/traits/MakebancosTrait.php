<?php

use Faker\Factory as Faker;
use App\Models\bancos;
use App\Repositories\bancosRepository;

trait MakebancosTrait
{
    /**
     * Create fake instance of bancos and save it in database
     *
     * @param array $bancosFields
     * @return bancos
     */
    public function makebancos($bancosFields = [])
    {
        /** @var bancosRepository $bancosRepo */
        $bancosRepo = App::make(bancosRepository::class);
        $theme = $this->fakebancosData($bancosFields);
        return $bancosRepo->create($theme);
    }

    /**
     * Get fake instance of bancos
     *
     * @param array $bancosFields
     * @return bancos
     */
    public function fakebancos($bancosFields = [])
    {
        return new bancos($this->fakebancosData($bancosFields));
    }

    /**
     * Get fake data of bancos
     *
     * @param array $postFields
     * @return array
     */
    public function fakebancosData($bancosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Nombre' => $fake->word,
            'pais_id' => $fake->randomDigitNotNull
        ], $bancosFields);
    }
}
