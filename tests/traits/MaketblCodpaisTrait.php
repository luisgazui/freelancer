<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\tblCodpais;
use FreelancerOnline\Repositories\tblCodpaisRepository;

trait MaketblCodpaisTrait
{
    /**
     * Create fake instance of tblCodpais and save it in database
     *
     * @param array $tblCodpaisFields
     * @return tblCodpais
     */
    public function maketblCodpais($tblCodpaisFields = [])
    {
        /** @var tblCodpaisRepository $tblCodpaisRepo */
        $tblCodpaisRepo = App::make(tblCodpaisRepository::class);
        $theme = $this->faketblCodpaisData($tblCodpaisFields);
        return $tblCodpaisRepo->create($theme);
    }

    /**
     * Get fake instance of tblCodpais
     *
     * @param array $tblCodpaisFields
     * @return tblCodpais
     */
    public function faketblCodpais($tblCodpaisFields = [])
    {
        return new tblCodpais($this->faketblCodpaisData($tblCodpaisFields));
    }

    /**
     * Get fake data of tblCodpais
     *
     * @param array $postFields
     * @return array
     */
    public function faketblCodpaisData($tblCodpaisFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'codpais' => $fake->word,
            'pais_id' => $fake->randomDigitNotNull
        ], $tblCodpaisFields);
    }
}
