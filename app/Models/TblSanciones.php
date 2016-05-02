<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblSanciones",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Severidad",
 *          description="Severidad",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Descripcion",
 *          description="Descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Duracion_id",
 *          description="Duracion_id",
 *          type="integer",
 *          format="int32"
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
class TblSanciones extends Model
{
    use SoftDeletes;

    public $table = 'tbl_sanciones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Severidad',
        'Descripcion',
        'Duracion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Severidad' => 'integer',
        'Duracion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
