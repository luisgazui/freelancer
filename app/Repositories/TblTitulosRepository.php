<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblTitulos;
use InfyOm\Generator\Common\BaseRepository;

class TblTitulosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Descripcion',
        'Anno_est',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblTitulos::class;
    }
}
