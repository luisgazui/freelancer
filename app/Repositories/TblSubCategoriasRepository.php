<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblSubCategorias;
use InfyOm\Generator\Common\BaseRepository;

class TblSubCategoriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'AreaS',
        'Categorias_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblSubCategorias::class;
    }
}
