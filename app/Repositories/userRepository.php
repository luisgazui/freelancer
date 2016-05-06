<?php

namespace FreelancerOnline\Repositories;

use FreelancerOnline\Models\user;
use InfyOm\Generator\Common\BaseRepository;

class userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'lastname',
        'documento_id',
        'documentoi',
        'email',
        'password',
        'tipousuario_id',
        'pais_id',
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return user::class;
    }
}
