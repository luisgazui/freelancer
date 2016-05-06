<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblPlanes;
use InfyOm\Generator\Common\BaseRepository;

class TblPlanesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombreplan',
        'costo',
        'vigencia',
        'imagen',
        'numeroproyectos',
        'numeroexperiencias'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblPlanes::class;
    }
}
