<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblStatusproyecto;
use InfyOm\Generator\Common\BaseRepository;

class TblStatusproyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblStatusproyecto::class;
    }
}
