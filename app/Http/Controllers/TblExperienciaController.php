<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblExperienciaDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblExperienciaRequest;
use FreelancerOnline\Http\Requests\UpdateTblExperienciaRequest;
use FreelancerOnline\Repositories\TblExperienciaRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblExperienciaController extends AppBaseController
{
    /** @var  TblExperienciaRepository */
    private $tblExperienciaRepository;

    public function __construct(TblExperienciaRepository $tblExperienciaRepo)
    {
        $this->tblExperienciaRepository = $tblExperienciaRepo;
    }

    /**
     * Display a listing of the TblExperiencia.
     *
     * @param TblExperienciaDataTable $tblExperienciaDataTable
     * @return Response
     */
    public function index(TblExperienciaDataTable $tblExperienciaDataTable)
    {
        return $tblExperienciaDataTable->render('tblExperiencias.index');
    }

    /**
     * Show the form for creating a new TblExperiencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblExperiencias.create');
    }

    /**
     * Store a newly created TblExperiencia in storage.
     *
     * @param CreateTblExperienciaRequest $request
     *
     * @return Response
     */
    public function store(CreateTblExperienciaRequest $request)
    {
        $input = $request->all();

        $tblExperiencia = $this->tblExperienciaRepository->create($input);

        Flash::success('TblExperiencia saved successfully.');

        return redirect(route('tblExperiencias.index'));
    }

    /**
     * Display the specified TblExperiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblExperiencia = $this->tblExperienciaRepository->findWithoutFail($id);

        if (empty($tblExperiencia)) {
            Flash::error('TblExperiencia not found');

            return redirect(route('tblExperiencias.index'));
        }

        return view('tblExperiencias.show')->with('tblExperiencia', $tblExperiencia);
    }

    /**
     * Show the form for editing the specified TblExperiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblExperiencia = $this->tblExperienciaRepository->findWithoutFail($id);

        if (empty($tblExperiencia)) {
            Flash::error('TblExperiencia not found');

            return redirect(route('tblExperiencias.index'));
        }

        return view('tblExperiencias.edit')->with('tblExperiencia', $tblExperiencia);
    }

    /**
     * Update the specified TblExperiencia in storage.
     *
     * @param  int              $id
     * @param UpdateTblExperienciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblExperienciaRequest $request)
    {
        $tblExperiencia = $this->tblExperienciaRepository->findWithoutFail($id);

        if (empty($tblExperiencia)) {
            Flash::error('TblExperiencia not found');

            return redirect(route('tblExperiencias.index'));
        }

        $tblExperiencia = $this->tblExperienciaRepository->update($request->all(), $id);

        Flash::success('TblExperiencia updated successfully.');

        return redirect(route('tblExperiencias.index'));
    }

    /**
     * Remove the specified TblExperiencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblExperiencia = $this->tblExperienciaRepository->findWithoutFail($id);

        if (empty($tblExperiencia)) {
            Flash::error('TblExperiencia not found');

            return redirect(route('tblExperiencias.index'));
        }

        $this->tblExperienciaRepository->delete($id);

        Flash::success('TblExperiencia deleted successfully.');

        return redirect(route('tblExperiencias.index'));
    }
}
