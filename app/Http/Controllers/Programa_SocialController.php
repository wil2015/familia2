<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrograma_SocialRequest;
use App\Http\Requests\UpdatePrograma_SocialRequest;
use App\Repositories\Programa_SocialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Programa_SocialController extends AppBaseController
{
    /** @var  Programa_SocialRepository */
    private $programaSocialRepository;

    public function __construct(Programa_SocialRepository $programaSocialRepo)
    {
        $this->programaSocialRepository = $programaSocialRepo;
    }

    /**
     * Display a listing of the Programa_Social.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $programaSocials = $this->programaSocialRepository->all();

        return view('programa__socials.index')
            ->with('programaSocials', $programaSocials);
    }

    /**
     * Show the form for creating a new Programa_Social.
     *
     * @return Response
     */
    public function create()
    {
        return view('programa__socials.create');
    }

    /**
     * Store a newly created Programa_Social in storage.
     *
     * @param CreatePrograma_SocialRequest $request
     *
     * @return Response
     */
    public function store(CreatePrograma_SocialRequest $request)
    {
        $input = $request->all();

        $programaSocial = $this->programaSocialRepository->create($input);

        Flash::success('Programa  Social saved successfully.');

        return redirect(route('programaSocials.index'));
    }

    /**
     * Display the specified Programa_Social.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $programaSocial = $this->programaSocialRepository->find($id);

        if (empty($programaSocial)) {
            Flash::error('Programa  Social not found');

            return redirect(route('programaSocials.index'));
        }

        return view('programa__socials.show')->with('programaSocial', $programaSocial);
    }

    /**
     * Show the form for editing the specified Programa_Social.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $programaSocial = $this->programaSocialRepository->find($id);

        if (empty($programaSocial)) {
            Flash::error('Programa  Social not found');

            return redirect(route('programaSocials.index'));
        }

        return view('programa__socials.edit')->with('programaSocial', $programaSocial);
    }

    /**
     * Update the specified Programa_Social in storage.
     *
     * @param int $id
     * @param UpdatePrograma_SocialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrograma_SocialRequest $request)
    {
        $programaSocial = $this->programaSocialRepository->find($id);

        if (empty($programaSocial)) {
            Flash::error('Programa  Social not found');

            return redirect(route('programaSocials.index'));
        }

        $programaSocial = $this->programaSocialRepository->update($request->all(), $id);

        Flash::success('Programa  Social updated successfully.');

        return redirect(route('programaSocials.index'));
    }

    /**
     * Remove the specified Programa_Social from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $programaSocial = $this->programaSocialRepository->find($id);

        if (empty($programaSocial)) {
            Flash::error('Programa  Social not found');

            return redirect(route('programaSocials.index'));
        }

        $this->programaSocialRepository->delete($id);

        Flash::success('Programa  Social deleted successfully.');

        return redirect(route('programaSocials.index'));
    }
}
