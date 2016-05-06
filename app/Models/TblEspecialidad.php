<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblEspecialidad",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="especialidad",
 *          description="especialidad",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tempo_exp",
 *          description="tempo_exp",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class TblEspecialidad extends Model
{
    use SoftDeletes;

    public $table = 'tbl_especialidads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'especialidad',
        'tempo_exp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'especialidad' => 'string',
        'tempo_exp' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
