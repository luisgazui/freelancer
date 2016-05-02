<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblMonedas;
use InfyOm\Generator\Common\BaseRepository;

class TblMonedasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NombreM',
        'simbolo',
        'pais_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblMonedas::class;
    }
}
