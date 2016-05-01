<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\categorias;
use InfyOm\Generator\Common\BaseRepository;

class categoriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'area'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return categorias::class;
    }
}
