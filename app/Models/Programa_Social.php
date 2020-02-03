<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Programa_Social
 * @package App\Models
 * @version January 31, 2020, 3:42 pm UTC
 *
 * @property string nome_programa
 */
class Programa_Social extends Model
{

    public $table = 'programa_social';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nome_programa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome_programa' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome_programa' => 'required'
    ];

    
}
