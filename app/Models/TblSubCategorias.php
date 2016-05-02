<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblSubCategorias",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="AreaS",
 *          description="AreaS",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Categorias_id",
 *          description="Categorias_id",
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
class TblSubCategorias extends Model
{
    use SoftDeletes;

    public $table = 'tbl_sub_categorias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'AreaS',
        'Categorias_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'AreaS' => 'string',
        'Categorias_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'AreaS' => 'Required',
        'Categorias_id' => 'Required'
    ];
}
