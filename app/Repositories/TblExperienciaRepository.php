<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblExperiencia;
use InfyOm\Generator\Common\BaseRepository;

class TblExperienciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Descripcion',
        'Annos_Exp'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblExperiencia::class;
    }
}
