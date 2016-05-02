<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblDuracion;
use InfyOm\Generator\Common\BaseRepository;

class TblDuracionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Duracion',
        'Tiempo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblDuracion::class;
    }
}
