<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblTipousuario",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipou",
 *          description="tipou",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="empresa",
 *          description="empresa",
 *          type="boolean"
 *      )
 * )
 */
class TblTipousuario extends Model
{
    use SoftDeletes;

    public $table = 'tbl_tipousuarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipou',
        'empresa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipou' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
