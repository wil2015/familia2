<?php

namespace App\Repositories;

use App\Models\Pessoa;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;


/**
 * Class PessoaRepository
 * @package App\Repositories
 * @version January 29, 2020, 2:50 pm UTC
*/

class PessoaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Pessoa::class;
    }
    public function pessoa_sem_familia()
    {
        $id = null;
        $users = DB::table('pessoa')
     //   ->select('id', 'nome')
        ->where('familia_id', '=', $id)

            ->get();
         return$users;   
    }

    public function pessoa_sem_familia_array(){

        $result = $this -> pessoa_sem_familia();
        $resultado = array(); 
        foreach ($result as $key => $value) {
             # code...
            $caralho = (string)($value -> id);
            $resultado[] = $caralho;  
         };

         return $resultado; 
         
     }

     public function inseri_pessoa_na_familia($array, $familia){

        foreach ($array as $key => $value) {
            # code...

            $pessoa = Pessoa::find($value);

            $pessoa->familia_id = $familia;

            $pessoa->save();
        }

     }
}
