<?php

class user extends Model
{
    use SoftDeletes;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'lastname',
        'documento_id',
        'documentoi',
        'email',
        'password',
        'tipousuario_id',
        'pais_id',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'lastname' => 'string',
        'documento_id' => 'integer',
        'documentoi' => 'string',
        'email' => 'string',
        'password' => 'string',
        'tipousuario_id' => 'integer',
        'pais_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
