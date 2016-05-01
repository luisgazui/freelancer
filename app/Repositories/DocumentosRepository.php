<?php

namespace App\Repositories;

use App\Models\Documentos;
use InfyOm\Generator\Common\BaseRepository;

class DocumentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Documento',
        'pais_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Documentos::class;
    }
}
