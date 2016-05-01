<?php

namespace App\Repositories;

use App\Models\paises;
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
