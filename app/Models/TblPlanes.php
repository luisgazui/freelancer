<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblPlanes",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombreplan",
 *          description="nombreplan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="costo",
 *          description="costo",
 *          type="number",
 *          format="double"
 *      ),
 *      @SWG\Property(
 *          property="vigencia",
 *          description="vigencia",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="imagen",
 *          description="imagen",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numeroproyectos",
 *          description="numeroproyectos",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="numeroexperiencias",
 *          description="numeroexperiencias",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class TblPlanes extends Model
{
    use SoftDeletes;

    public $table = 'tbl_planes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombreplan',
        'costo',
        'vigencia',
        'imagen',
        'numeroproyectos',
        'numeroexperiencias'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombreplan' => 'string',
        'costo' => 'double',
        'vigencia' => 'integer',
        'imagen' => 'string',
        'numeroproyectos' => 'integer',
        'numeroexperiencias' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
