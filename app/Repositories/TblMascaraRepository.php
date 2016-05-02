<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblMascara;
use InfyOm\Generator\Common\BaseRepository;

class TblMascaraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Mascara'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblMascara::class;
    }
}
