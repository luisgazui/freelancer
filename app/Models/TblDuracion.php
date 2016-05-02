<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblDuracion",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Duracion",
 *          description="Duracion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Tiempo",
 *          description="Tiempo",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class TblDuracion extends Model
{
    use SoftDeletes;

    public $table = 'tbl_duracions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Duracion',
        'Tiempo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Tiempo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
