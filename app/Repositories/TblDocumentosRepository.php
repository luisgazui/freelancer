<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\TblDocumentos;
use InfyOm\Generator\Common\BaseRepository;

class TblDocumentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Documento',
        'Pais_id',
        'Empresa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TblDocumentos::class;
    }
}
