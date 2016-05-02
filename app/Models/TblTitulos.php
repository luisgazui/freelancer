<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblTitulos",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Descripcion",
 *          description="Descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Anno_est",
 *          description="Anno_est",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class TblTitulos extends Model
{
    use SoftDeletes;

    public $table = 'tbl_titulos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Descripcion',
        'Anno_est',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Anno_est' => 'integer',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Descripcion' => 'Required',
        'Anno_est' => 'Required',
        'tipo' => 'Required'
    ];
}
