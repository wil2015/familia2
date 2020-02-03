<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Familia
 * @package App\Models
 * @version January 29, 2020, 2:39 pm UTC
 *
 * @property string estado
 * @property string cidade
 * @property string bairro
 * @property string cep
 * @property string logradouro
 * @property integer num_logradouro
 * @property integer id_programa
 */
class Familia extends Model
{

    public $table = 'familia';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'estado',
        'cidade',
        'bairro',
        'cep',
        'logradouro',
        'num_logradouro',
        'id_programa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'string',
        'cidade' => 'string',
        'bairro' => 'string',
        'cep' => 'string',
        'logradouro' => 'string',
        'num_logradouro' => 'integer',
        'id_programa' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estado' => 'required',
        'cidade' => 'required',
        'bairro' => 'required',
        'cep' => 'required',
        'logradouro' => 'required',
        'num_logradouro' => 'required'
    ];

    
}
