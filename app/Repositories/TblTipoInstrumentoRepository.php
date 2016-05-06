<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblTipoInstrumento;
use InfyOm\Generator\Common\BaseRepository;

class TblTipoInstrumentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'instrumento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblTipoInstrumento::class;
    }
}
