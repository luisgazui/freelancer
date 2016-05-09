<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\tblCategoriaemp;
use InfyOm\Generator\Common\BaseRepository;

class tblCategoriaempRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'catemp'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tblCategoriaemp::class;
    }
}
