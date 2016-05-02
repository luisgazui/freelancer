<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblSanciones;
use InfyOm\Generator\Common\BaseRepository;

class TblSancionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Severidad',
        'Descripcion',
        'Duracion_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblSanciones::class;
    }
}
