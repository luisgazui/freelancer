<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="tblCategoriaemp",
 *      required={catemp},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="catemp",
 *          description="catemp",
 *          type="string"
 *      )
 * )
 */
class tblCategoriaemp extends Model
{
    use SoftDeletes;

    public $table = 'tbl_categoriaemps';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'catemp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'catemp' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'catemp' => 'required'
    ];
}
