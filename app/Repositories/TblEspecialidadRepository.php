<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblEspecialidad;
use InfyOm\Generator\Common\BaseRepository;

class TblEspecialidadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'especialidad',
        'tempo_exp'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblEspecialidad::class;
    }
}
