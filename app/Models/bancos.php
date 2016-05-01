<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="bancos",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Nombre",
 *          description="Nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pais_id",
 *          description="pais_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class bancos extends Model
{
    use SoftDeletes;

    public $table = 'bancos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Nombre',
        'pais_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Nombre' => 'string',
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
