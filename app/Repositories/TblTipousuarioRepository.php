<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblTipousuario;
use InfyOm\Generator\Common\BaseRepository;

class TblTipousuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipou',
        'empresa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblTipousuario::class;
    }
}
