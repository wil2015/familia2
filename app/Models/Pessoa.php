<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Pessoa
 * @package App\Models
 * @version January 29, 2020, 2:50 pm UTC
 *
 * @property integer familia_id
 * @property string nome
 * @property string sexo
 * @property string data_nascimento
 * @property string naturalidade
 * @property string cpf
 * @property string rg
 * @property string estado_civil
 */
class Pessoa extends Model
{

    public $table = 'pessoa';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'familia_id',
        'nome',
        'sexo',
        'data_nascimento',
        'naturalidade',
        'cpf',
        'rg',
        'estado_civil'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'familia_id' => 'integer',
        'nome' => 'string',
        'sexo' => 'string',
        'data_nascimento' => 'date',
        'naturalidade' => 'string',
        'cpf' => 'string',
        'rg' => 'string',
        'estado_civil' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'sexo' => 'required',
        'data_nascimento' => 'required',
        'naturalidade' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'estado_civil' => 'required'
    ];

    
}
