<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblTelefonotipo;
use InfyOm\Generator\Common\BaseRepository;

class TblTelefonotipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Codigo',
        'pais_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblTelefonotipo::class;
    }
}
