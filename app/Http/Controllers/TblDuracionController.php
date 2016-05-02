<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblDuracionDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblDuracionRequest;
use FreelancerOnline\Http\Requests\UpdateTblDuracionRequest;
use FreelancerOnline\Repositories\TblDuracionRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblDuracionController extends AppBaseController
{
    /** @var  TblDuracionRepository */
    private $tblDuracionRepository;

    public function __construct(TblDuracionRepository $tblDuracionRepo)
    {
        $this->tblDuracionRepository = $tblDuracionRepo;
    }

    /**
     * Display a listing of the TblDuracion.
     *
     * @param TblDuracionDataTable $tblDuracionDataTable
     * @return Response
     */
    public function index(TblDuracionDataTable $tblDuracionDataTable)
    {
        return $tblDuracionDataTable->render('tblDuracions.index');
    }

    /**
     * Show the form for creating a new TblDuracion.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblDuracions.create');
    }

    /**
     * Store a newly created TblDuracion in storage.
     *
     * @param CreateTblDuracionRequest $request
     *
     * @return Response
     */
    public function store(CreateTblDuracionRequest $request)
    {
        $input = $request->all();

        $tblDuracion = $this->tblDuracionRepository->create($input);

        Flash::success('TblDuracion saved successfully.');

        return redirect(route('tblDuracions.index'));
    }

    /**
     * Display the specified TblDuracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblDuracion = $this->tblDuracionRepository->findWithoutFail($id);

        if (empty($tblDuracion)) {
            Flash::error('TblDuracion not found');

            return redirect(route('tblDuracions.index'));
        }

        return view('tblDuracions.show')->with('tblDuracion', $tblDuracion);
    }

    /**
     * Show the form for editing the specified TblDuracion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblDuracion = $this->tblDuracionRepository->findWithoutFail($id);

        if (empty($tblDuracion)) {
            Flash::error('TblDuracion not found');

            return redirect(route('tblDuracions.index'));
        }

        return view('tblDuracions.edit')->with('tblDuracion', $tblDuracion);
    }

    /**
     * Update the specified TblDuracion in storage.
     *
     * @param  int              $id
     * @param UpdateTblDuracionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblDuracionRequest $request)
    {
        $tblDuracion = $this->tblDuracionRepository->findWithoutFail($id);

        if (empty($tblDuracion)) {
            Flash::error('TblDuracion not found');

            return redirect(route('tblDuracions.index'));
        }

        $tblDuracion = $this->tblDuracionRepository->update($request->all(), $id);

        Flash::success('TblDuracion updated successfully.');

        return redirect(route('tblDuracions.index'));
    }

    /**
     * Remove the specified TblDuracion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblDuracion = $this->tblDuracionRepository->findWithoutFail($id);

        if (empty($tblDuracion)) {
            Flash::error('TblDuracion not found');

            return redirect(route('tblDuracions.index'));
        }

        $this->tblDuracionRepository->delete($id);

        Flash::success('TblDuracion deleted successfully.');

        return redirect(route('tblDuracions.index'));
    }
}
