<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblCategorias;
use InfyOm\Generator\Common\BaseRepository;

class TblCategoriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Area'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblCategorias::class;
    }
}
