<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblTipoInstrumento",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="instrumento",
 *          description="instrumento",
 *          type="string"
 *      )
 * )
 */
class TblTipoInstrumento extends Model
{
    use SoftDeletes;

    public $table = 'tbl_tipo_instrumentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'instrumento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'instrumento' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
