<?php

namespace App\Repositories;

use App\Models\TblPaises;
use InfyOm\Generator\Common\BaseRepository;

class TblPaisesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Pais'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblPaises::class;
    }
}
