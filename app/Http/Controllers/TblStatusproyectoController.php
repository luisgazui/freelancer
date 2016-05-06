<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblStatusproyectoDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblStatusproyectoRequest;
use FreelancerOnline\Http\Requests\UpdateTblStatusproyectoRequest;
use FreelancerOnline\Repositories\TblStatusproyectoRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblStatusproyectoController extends AppBaseController
{
    /** @var  TblStatusproyectoRepository */
    private $tblStatusproyectoRepository;

    public function __construct(TblStatusproyectoRepository $tblStatusproyectoRepo)
    {
        $this->tblStatusproyectoRepository = $tblStatusproyectoRepo;
    }

    /**
     * Display a listing of the TblStatusproyecto.
     *
     * @param TblStatusproyectoDataTable $tblStatusproyectoDataTable
     * @return Response
     */
    public function index(TblStatusproyectoDataTable $tblStatusproyectoDataTable)
    {
        return $tblStatusproyectoDataTable->render('tblStatusproyectos.index');
    }

    /**
     * Show the form for creating a new TblStatusproyecto.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblStatusproyectos.create');
    }

    /**
     * Store a newly created TblStatusproyecto in storage.
     *
     * @param CreateTblStatusproyectoRequest $request
     *
     * @return Response
     */
    public function store(CreateTblStatusproyectoRequest $request)
    {
        $input = $request->all();

        $tblStatusproyecto = $this->tblStatusproyectoRepository->create($input);

        Flash::success('TblStatusproyecto saved successfully.');

        return redirect(route('tblStatusproyectos.index'));
    }

    /**
     * Display the specified TblStatusproyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblStatusproyecto = $this->tblStatusproyectoRepository->findWithoutFail($id);

        if (empty($tblStatusproyecto)) {
            Flash::error('TblStatusproyecto not found');

            return redirect(route('tblStatusproyectos.index'));
        }

        return view('tblStatusproyectos.show')->with('tblStatusproyecto', $tblStatusproyecto);
    }

    /**
     * Show the form for editing the specified TblStatusproyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblStatusproyecto = $this->tblStatusproyectoRepository->findWithoutFail($id);

        if (empty($tblStatusproyecto)) {
            Flash::error('TblStatusproyecto not found');

            return redirect(route('tblStatusproyectos.index'));
        }

        return view('tblStatusproyectos.edit')->with('tblStatusproyecto', $tblStatusproyecto);
    }

    /**
     * Update the specified TblStatusproyecto in storage.
     *
     * @param  int              $id
     * @param UpdateTblStatusproyectoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblStatusproyectoRequest $request)
    {
        $tblStatusproyecto = $this->tblStatusproyectoRepository->findWithoutFail($id);

        if (empty($tblStatusproyecto)) {
            Flash::error('TblStatusproyecto not found');

            return redirect(route('tblStatusproyectos.index'));
        }

        $tblStatusproyecto = $this->tblStatusproyectoRepository->update($request->all(), $id);

        Flash::success('TblStatusproyecto updated successfully.');

        return redirect(route('tblStatusproyectos.index'));
    }

    /**
     * Remove the specified TblStatusproyecto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblStatusproyecto = $this->tblStatusproyectoRepository->findWithoutFail($id);

        if (empty($tblStatusproyecto)) {
            Flash::error('TblStatusproyecto not found');

            return redirect(route('tblStatusproyectos.index'));
        }

        $this->tblStatusproyectoRepository->delete($id);

        Flash::success('TblStatusproyecto deleted successfully.');

        return redirect(route('tblStatusproyectos.index'));
    }
}
