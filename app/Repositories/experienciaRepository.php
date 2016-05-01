<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\experiencia;
use InfyOm\Generator\Common\BaseRepository;

class experienciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'annos'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return experiencia::class;
    }
}
