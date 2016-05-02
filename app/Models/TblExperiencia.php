<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblExperiencia",
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
 *          property="Annos_Exp",
 *          description="Annos_Exp",
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
class TblExperiencia extends Model
{
    use SoftDeletes;

    public $table = 'tbl_experiencias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Descripcion',
        'Annos_Exp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Descripcion' => 'Required',
        'Annos_Exp' => 'Required'
    ];
}
