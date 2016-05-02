<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblPaises",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Nombre",
 *          description="Nombre",
 *          type="string"
 *      )
 * )
 */
class TblPaises extends Model
{
    use SoftDeletes;

    public $table = 'tbl_paises';
    

    protected $dates = ['deleted_at'];

    public function bancos_pais(){
        // creamos una relación con el modelo de vehiculo
        return $this->hasMany('tblbancos', 'pais_id');
    }

    public $fillable = [
        'Nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
