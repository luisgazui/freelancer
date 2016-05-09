<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\tblCodpais;
use InfyOm\Generator\Common\BaseRepository;

class tblCodpaisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codpais',
        'pais_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tblCodpais::class;
    }
}
