<?php

use Faker\Factory as Faker;
use App\Models\paises;
use App\Repositories\paisesRepository;

trait MakepaisesTrait
{
    /**
     * Create fake instance of paises and save it in database
     *
     * @param array $paisesFields
     * @return paises
     */
    public function makepaises($paisesFields = [])
    {
        /** @var paisesRepository $paisesRepo */
        $paisesRepo = App::make(paisesRepository::class);
        $theme = $this->fakepaisesData($paisesFields);
        return $paisesRepo->create($theme);
    }

    /**
     * Get fake instance of paises
     *
     * @param array $paisesFields
     * @return paises
     */
    public function fakepaises($paisesFields = [])
    {
        return new paises($this->fakepaisesData($paisesFields));
    }

    /**
     * Get fake data of paises
     *
     * @param array $postFields
     * @return array
     */
    public function fakepaisesData($paisesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pais' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $paisesFields);
    }
}
