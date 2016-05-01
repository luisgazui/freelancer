<?php

use Faker\Factory as Faker;
use App\Models\categorias;
use App\Repositories\categoriasRepository;

trait MakecategoriasTrait
{
    /**
     * Create fake instance of categorias and save it in database
     *
     * @param array $categoriasFields
     * @return categorias
     */
    public function makecategorias($categoriasFields = [])
    {
        /** @var categoriasRepository $categoriasRepo */
        $categoriasRepo = App::make(categoriasRepository::class);
        $theme = $this->fakecategoriasData($categoriasFields);
        return $categoriasRepo->create($theme);
    }

    /**
     * Get fake instance of categorias
     *
     * @param array $categoriasFields
     * @return categorias
     */
    public function fakecategorias($categoriasFields = [])
    {
        return new categorias($this->fakecategoriasData($categoriasFields));
    }

    /**
     * Get fake data of categorias
     *
     * @param array $postFields
     * @return array
     */
    public function fakecategoriasData($categoriasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'area' => $fake->word
        ], $categoriasFields);
    }
}
