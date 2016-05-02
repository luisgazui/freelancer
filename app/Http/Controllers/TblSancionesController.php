<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblSancionesDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblSancionesRequest;
use FreelancerOnline\Http\Requests\UpdateTblSancionesRequest;
use FreelancerOnline\Repositories\TblSancionesRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblSancionesController extends AppBaseController
{
    /** @var  TblSancionesRepository */
    private $tblSancionesRepository;

    public function __construct(TblSancionesRepository $tblSancionesRepo)
    {
        $this->tblSancionesRepository = $tblSancionesRepo;
    }

    /**
     * Display a listing of the TblSanciones.
     *
     * @param TblSancionesDataTable $tblSancionesDataTable
     * @return Response
     */
    public function index(TblSancionesDataTable $tblSancionesDataTable)
    {
        return $tblSancionesDataTable->render('tblSanciones.index');
    }

    /**
     * Show the form for creating a new TblSanciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblSanciones.create');
    }

    /**
     * Store a newly created TblSanciones in storage.
     *
     * @param CreateTblSancionesRequest $request
     *
     * @return Response
     */
    public function store(CreateTblSancionesRequest $request)
    {
        $input = $request->all();

        $tblSanciones = $this->tblSancionesRepository->create($input);

        Flash::success('TblSanciones saved successfully.');

        return redirect(route('tblSanciones.index'));
    }

    /**
     * Display the specified TblSanciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblSanciones = $this->tblSancionesRepository->findWithoutFail($id);

        if (empty($tblSanciones)) {
            Flash::error('TblSanciones not found');

            return redirect(route('tblSanciones.index'));
        }

        return view('tblSanciones.show')->with('tblSanciones', $tblSanciones);
    }

    /**
     * Show the form for editing the specified TblSanciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblSanciones = $this->tblSancionesRepository->findWithoutFail($id);

        if (empty($tblSanciones)) {
            Flash::error('TblSanciones not found');

            return redirect(route('tblSanciones.index'));
        }

        return view('tblSanciones.edit')->with('tblSanciones', $tblSanciones);
    }

    /**
     * Update the specified TblSanciones in storage.
     *
     * @param  int              $id
     * @param UpdateTblSancionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblSancionesRequest $request)
    {
        $tblSanciones = $this->tblSancionesRepository->findWithoutFail($id);

        if (empty($tblSanciones)) {
            Flash::error('TblSanciones not found');

            return redirect(route('tblSanciones.index'));
        }

        $tblSanciones = $this->tblSancionesRepository->update($request->all(), $id);

        Flash::success('TblSanciones updated successfully.');

        return redirect(route('tblSanciones.index'));
    }

    /**
     * Remove the specified TblSanciones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblSanciones = $this->tblSancionesRepository->findWithoutFail($id);

        if (empty($tblSanciones)) {
            Flash::error('TblSanciones not found');

            return redirect(route('tblSanciones.index'));
        }

        $this->tblSancionesRepository->delete($id);

        Flash::success('TblSanciones deleted successfully.');

        return redirect(route('tblSanciones.index'));
    }
}
