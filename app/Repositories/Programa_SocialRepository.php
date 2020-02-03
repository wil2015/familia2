<?php

namespace App\Repositories;

use App\Models\Programa_Social;
use App\Repositories\BaseRepository;

/**
 * Class Programa_SocialRepository
 * @package App\Repositories
 * @version January 31, 2020, 3:42 pm UTC
*/

class Programa_SocialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nome_programa'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Programa_Social::class;
    }
}
