<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\experienciaDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateexperienciaRequest;
use FreelancerOnline\Http\Requests\UpdateexperienciaRequest;
use FreelancerOnline\Repositories\experienciaRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class experienciaController extends AppBaseController
{
    /** @var  experienciaRepository */
    private $experienciaRepository;

    public function __construct(experienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
    }

    /**
     * Display a listing of the experiencia.
     *
     * @param experienciaDataTable $experienciaDataTable
     * @return Response
     */
    public function index(experienciaDataTable $experienciaDataTable)
    {
        return $experienciaDataTable->render('experiencias.index');
    }

    /**
     * Show the form for creating a new experiencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('experiencias.create');
    }

    /**
     * Store a newly created experiencia in storage.
     *
     * @param CreateexperienciaRequest $request
     *
     * @return Response
     */
    public function store(CreateexperienciaRequest $request)
    {
        $input = $request->all();

        $experiencia = $this->experienciaRepository->create($input);

        Flash::success('experiencia saved successfully.');

        return redirect(route('experiencias.index'));
    }

    /**
     * Display the specified experiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('experiencia not found');

            return redirect(route('experiencias.index'));
        }

        return view('experiencias.show')->with('experiencia', $experiencia);
    }

    /**
     * Show the form for editing the specified experiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('experiencia not found');

            return redirect(route('experiencias.index'));
        }

        return view('experiencias.edit')->with('experiencia', $experiencia);
    }

    /**
     * Update the specified experiencia in storage.
     *
     * @param  int              $id
     * @param UpdateexperienciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateexperienciaRequest $request)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('experiencia not found');

            return redirect(route('experiencias.index'));
        }

        $experiencia = $this->experienciaRepository->update($request->all(), $id);

        Flash::success('experiencia updated successfully.');

        return redirect(route('experiencias.index'));
    }

    /**
     * Remove the specified experiencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('experiencia not found');

            return redirect(route('experiencias.index'));
        }

        $this->experienciaRepository->delete($id);

        Flash::success('experiencia deleted successfully.');

        return redirect(route('experiencias.index'));
    }
}
