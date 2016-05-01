<?php

namespace App\Repositories;

use App\Models\bancos;
use InfyOm\Generator\Common\BaseRepository;

class bancosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'pais_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return bancos::class;
    }
}
