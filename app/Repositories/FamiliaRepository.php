<?php

namespace App\Repositories;

use App\Models\Familia;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;


/**
 * Class FamiliaRepository
 * @package App\Repositories
 * @version January 29, 2020, 2:39 pm UTC
*/

class FamiliaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'estado',
        'cidade',
        'bairro',
        'cep',
        'logradouro',
        'num_logradouro',
        'id_programa'
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
        return Familia::class;
    }

    public function pessoa_da_familia(){

         $pessoas = DB::table('familia')
            ->join('pessoa', 'familia.id', '=', 'pessoa.familia_id')
            ->get();

        return $pessoas;


    }

    public function familia_especifica($id){


         $familia = DB::table('familia')
            ->where('id', $id)
            ->get();

        return $familia;
    }

    public function familia_social(){


         $social = DB::table('familia')
            ->leftjoin('programa_social', 'programa_social.id', '=', 'familia.id_programa')
            ->select( 'familia.*', 'programa_social.nome_programa' )
            ->get();

        return $social;


    }

    public function familia_social_especifica($id){


         $social = DB::table('familia')
            ->leftjoin('programa_social', 'programa_social.id', '=', 'familia.id_programa')
            ->select( 'familia.*', 'programa_social.nome_programa' )
                        ->where('familia.id', $id)

            ->get();

        return $social;


    }

    public function familia_pessoa_social(){

        $tudo = DB::table('familia')
            ->leftjoin('programa_social', 'programa_social.id', '=', 'familia.id_programa')
            ->leftjoin('pessoa', 'familia.id', '=', 'pessoa.familia_id')
            ->select( 'familia.*', 'programa_social.nome_programa', 'pessoa.nome' )

            ->get();

        return $tudo;



    }
}
