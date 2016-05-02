<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblPaises;
use InfyOm\Generator\Common\BaseRepository;

class TblPaisesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblPaises::class;
    }
}
