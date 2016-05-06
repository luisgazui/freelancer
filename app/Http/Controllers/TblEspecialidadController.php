<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblEspecialidadDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblEspecialidadRequest;
use FreelancerOnline\Http\Requests\UpdateTblEspecialidadRequest;
use FreelancerOnline\Repositories\TblEspecialidadRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblEspecialidadController extends AppBaseController
{
    /** @var  TblEspecialidadRepository */
    private $tblEspecialidadRepository;

    public function __construct(TblEspecialidadRepository $tblEspecialidadRepo)
    {
        $this->tblEspecialidadRepository = $tblEspecialidadRepo;
    }

    /**
     * Display a listing of the TblEspecialidad.
     *
     * @param TblEspecialidadDataTable $tblEspecialidadDataTable
     * @return Response
     */
    public function index(TblEspecialidadDataTable $tblEspecialidadDataTable)
    {
        return $tblEspecialidadDataTable->render('tblEspecialidads.index');
    }

    /**
     * Show the form for creating a new TblEspecialidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblEspecialidads.create');
    }

    /**
     * Store a newly created TblEspecialidad in storage.
     *
     * @param CreateTblEspecialidadRequest $request
     *
     * @return Response
     */
    public function store(CreateTblEspecialidadRequest $request)
    {
        $input = $request->all();

        $tblEspecialidad = $this->tblEspecialidadRepository->create($input);

        Flash::success('TblEspecialidad saved successfully.');

        return redirect(route('tblEspecialidads.index'));
    }

    /**
     * Display the specified TblEspecialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblEspecialidad = $this->tblEspecialidadRepository->findWithoutFail($id);

        if (empty($tblEspecialidad)) {
            Flash::error('TblEspecialidad not found');

            return redirect(route('tblEspecialidads.index'));
        }

        return view('tblEspecialidads.show')->with('tblEspecialidad', $tblEspecialidad);
    }

    /**
     * Show the form for editing the specified TblEspecialidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblEspecialidad = $this->tblEspecialidadRepository->findWithoutFail($id);

        if (empty($tblEspecialidad)) {
            Flash::error('TblEspecialidad not found');

            return redirect(route('tblEspecialidads.index'));
        }

        return view('tblEspecialidads.edit')->with('tblEspecialidad', $tblEspecialidad);
    }

    /**
     * Update the specified TblEspecialidad in storage.
     *
     * @param  int              $id
     * @param UpdateTblEspecialidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblEspecialidadRequest $request)
    {
        $tblEspecialidad = $this->tblEspecialidadRepository->findWithoutFail($id);

        if (empty($tblEspecialidad)) {
            Flash::error('TblEspecialidad not found');

            return redirect(route('tblEspecialidads.index'));
        }

        $tblEspecialidad = $this->tblEspecialidadRepository->update($request->all(), $id);

        Flash::success('TblEspecialidad updated successfully.');

        return redirect(route('tblEspecialidads.index'));
    }

    /**
     * Remove the specified TblEspecialidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblEspecialidad = $this->tblEspecialidadRepository->findWithoutFail($id);

        if (empty($tblEspecialidad)) {
            Flash::error('TblEspecialidad not found');

            return redirect(route('tblEspecialidads.index'));
        }

        $this->tblEspecialidadRepository->delete($id);

        Flash::success('TblEspecialidad deleted successfully.');

        return redirect(route('tblEspecialidads.index'));
    }
}
