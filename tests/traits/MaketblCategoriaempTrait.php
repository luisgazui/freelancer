<?php

use Faker\Factory as Faker;
use FreelancerOnline\Models\tblCategoriaemp;
use FreelancerOnline\Repositories\tblCategoriaempRepository;

trait MaketblCategoriaempTrait
{
    /**
     * Create fake instance of tblCategoriaemp and save it in database
     *
     * @param array $tblCategoriaempFields
     * @return tblCategoriaemp
     */
    public function maketblCategoriaemp($tblCategoriaempFields = [])
    {
        /** @var tblCategoriaempRepository $tblCategoriaempRepo */
        $tblCategoriaempRepo = App::make(tblCategoriaempRepository::class);
        $theme = $this->faketblCategoriaempData($tblCategoriaempFields);
        return $tblCategoriaempRepo->create($theme);
    }

    /**
     * Get fake instance of tblCategoriaemp
     *
     * @param array $tblCategoriaempFields
     * @return tblCategoriaemp
     */
    public function faketblCategoriaemp($tblCategoriaempFields = [])
    {
        return new tblCategoriaemp($this->faketblCategoriaempData($tblCategoriaempFields));
    }

    /**
     * Get fake data of tblCategoriaemp
     *
     * @param array $postFields
     * @return array
     */
    public function faketblCategoriaempData($tblCategoriaempFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'catemp' => $fake->word
        ], $tblCategoriaempFields);
    }
}
