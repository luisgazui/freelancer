<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblPalabras;
use InfyOm\Generator\Common\BaseRepository;

class TblPalabrasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Palabra'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblPalabras::class;
    }
}
