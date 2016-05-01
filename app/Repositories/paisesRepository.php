<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\paises;
use InfyOm\Generator\Common\BaseRepository;

class paisesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pais'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return paises::class;
    }
}
