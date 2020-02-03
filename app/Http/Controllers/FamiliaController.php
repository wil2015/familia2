<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFamiliaRequest;
use App\Http\Requests\UpdateFamiliaRequest;
use App\Repositories\FamiliaRepository;
use App\Repositories\PessoaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Repositories\Programa_SocialRepository;
use Flash;
use Response;

class FamiliaController extends AppBaseController
{
    /** @var  FamiliaRepository */
    private $familiaRepository;

    public function __construct(FamiliaRepository $familiaRepo, PessoaRepository 
        $pessoaRepo, Programa_SocialRepository $programaSocialRepo)
    {
        $this->familiaRepository = $familiaRepo;
         $this->pessoaRepository = $pessoaRepo;
         $this->programaSocialRepository = $programaSocialRepo;

    }

    /**
     * Display a listing of the Familia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $familias = $this->familiaRepository->all();


               $familias = $this->familiaRepository->familia_social();

               
        $pessoas_da_familia = $this->familiaRepository->pessoa_da_familia();
       // $programaSocial = $this->programaSocialRepository->find($id);


        $id_familia = array();  
        $id_familia[] = 'Todas';
        foreach ($familias as $key => $value) {
            # code...
            $id_familia[$value -> id] = $value -> id; 
        }


        return view('familias.index')
            ->with(compact('familias', 'pessoas_da_familia', 'id_familia'));
    }

    /**
     * Show the form for creating a new Familia.
     *
     * @return Response
     */
    public function create()
    {
        //----
        $pessoas = $this->pessoaRepository->pessoa_sem_familia();
        $programaSocials = $this->programaSocialRepository->all();

         $id_programa = array();  
        foreach ($programaSocials as $key => $value) {
            # code...

                           
                 $id_programa[$value -> id] = $value -> nome_programa; 
        }
        //-- 
        return view('familias.create')->with(compact('pessoas', 'id_programa'));;
    }

    /**
     * Store a newly created Familia in storage.
     *
     * @param CreateFamiliaRequest $request
     *
     * @return Response
     */
    public function store(CreateFamiliaRequest $request)
    {
        $input = $request->all();
       
       
        $familia = $this->familiaRepository->create($input);

        $membros = $request->input('membro'); 

        $pessoas = $this->pessoaRepository->pessoa_sem_familia_array();
       
      
        if(empty($membros)){
            $membros = array();
        } 

                 
        $result = array_diff_assoc($pessoas, $membros);
        if(count($result) > 0){

            $familia_id = $familia -> id;
            $this->pessoaRepository->inseri_pessoa_na_familia($result, $familia_id);

        }

        Flash::success('Familia saved successfully.');

        return redirect(route('familias.index'));
    }

    /**
     * Display the specified Familia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        return view('familias.show')->with('familia', $familia);
    }

    public function pesquisa(Request $request)
    {


        $input = $request->all();
        $id = $request->input('id_familia'); 

            
        if ($id == 0){
            return redirect()->action('FamiliaController@index');

        }else{
              $familias = $this->familiaRepository->familia_social_especifica($id);
        };


        if (empty($familias)||(count($familias)==0)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $pessoas_da_familia = $this->familiaRepository->pessoa_da_familia();
        
        $todas_familias = $this->familiaRepository->all();

        $id_familia = array();  
        $id_familia[] = "Todas"; 

        foreach ($todas_familias as $key => $value) {
            # code...

                           
                 $id_familia[$value -> id] = $value -> id; 
        }

        return view('familias.index')
            ->with(compact('familias', 'pessoas_da_familia', 'id_familia'));
    }
    /**
     * Show the form for editing the specified Familia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $familia = $this->familiaRepository->find($id);
          $programaSocials = $this->programaSocialRepository->all();
          $pessoas = $this->familiaRepository->pessoa_da_familia();


         $id_programa = array();  
        foreach ($programaSocials as $key => $value) {
            # code...

                           
                 $id_programa[$value -> id] = $value -> nome_programa; 
        }

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        return view('familias.edit')->with(compact('familia','pessoas', 'id_programa'));
    }

    /**
     * Update the specified Familia in storage.
     *
     * @param int $id
     * @param UpdateFamiliaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamiliaRequest $request)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $familia = $this->familiaRepository->update($request->all(), $id);

        Flash::success('Familia updated successfully.');

        return redirect(route('familias.index'));
    }

    /**
     * Remove the specified Familia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $familia = $this->familiaRepository->find($id);

        if (empty($familia)) {
            Flash::error('Familia not found');

            return redirect(route('familias.index'));
        }

        $this->familiaRepository->delete($id);

        Flash::success('Familia deleted successfully.');

        return redirect(route('familias.index'));
    }
}
