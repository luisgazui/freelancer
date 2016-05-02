<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblMascara",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Mascara",
 *          description="Mascara",
 *          type="string"
 *      )
 * )
 */
class TblMascara extends Model
{
    use SoftDeletes;

    public $table = 'tbl_mascaras';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Mascara'
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
        
    ];
}
