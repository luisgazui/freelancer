<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblBancos;
use InfyOm\Generator\Common\BaseRepository;

class TblBancosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NombreB',
        'Pais_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblBancos::class;
    }
}
