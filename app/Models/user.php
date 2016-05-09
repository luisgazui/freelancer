<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="user",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lastname",
 *          description="lastname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="documento_id",
 *          description="documento_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="documentoi",
 *          description="documentoi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipousuario_id",
 *          description="tipousuario_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pais_id",
 *          description="pais_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class user extends Model
{
    use SoftDeletes;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'lastname',
        'documento_id',
        'documentoi',
        'email',
        'password',
        'tipousuario_id',
        'pais_id',
        'Direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'lastname' => 'string',
        'documento_id' => 'integer',
        'documentoi' => 'string',
        'email' => 'string',
        'password' => 'string',
        'tipousuario_id' => 'integer',
        'pais_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
