<?php

namespace FreelancerOnline\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TblDocumentos",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Documento",
 *          description="Documento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Pais_id",
 *          description="Pais_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Empresa",
 *          description="Empresa",
 *          type="boolean"
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
class TblDocumentos extends Model
{
    use SoftDeletes;

    public $table = 'tbl_documentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Documento',
        'Pais_id',
        'Empresa'
    ];
    public static function documentos($id){
        return TblDocumentos::where('pais_id','=',$id)
        ->get();
    }
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Documento' => 'string',
        'Pais_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Documento' => 'Required',
        'Pais_id' => 'Required'
    ];
}
