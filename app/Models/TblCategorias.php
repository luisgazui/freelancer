<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblCategorias",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Area",
 *          description="Area",
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
class TblCategorias extends Model
{
    use SoftDeletes;

    public $table = 'tbl_categorias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Area'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Area' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Area' => 'Required'
    ];
}
