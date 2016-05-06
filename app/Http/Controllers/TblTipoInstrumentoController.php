<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblTipoInstrumentoDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblTipoInstrumentoRequest;
use FreelancerOnline\Http\Requests\UpdateTblTipoInstrumentoRequest;
use FreelancerOnline\Repositories\TblTipoInstrumentoRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblTipoInstrumentoController extends AppBaseController
{
    /** @var  TblTipoInstrumentoRepository */
    private $tblTipoInstrumentoRepository;

    public function __construct(TblTipoInstrumentoRepository $tblTipoInstrumentoRepo)
    {
        $this->tblTipoInstrumentoRepository = $tblTipoInstrumentoRepo;
    }

    /**
     * Display a listing of the TblTipoInstrumento.
     *
     * @param TblTipoInstrumentoDataTable $tblTipoInstrumentoDataTable
     * @return Response
     */
    public function index(TblTipoInstrumentoDataTable $tblTipoInstrumentoDataTable)
    {
        return $tblTipoInstrumentoDataTable->render('tblTipoInstrumentos.index');
    }

    /**
     * Show the form for creating a new TblTipoInstrumento.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblTipoInstrumentos.create');
    }

    /**
     * Store a newly created TblTipoInstrumento in storage.
     *
     * @param CreateTblTipoInstrumentoRequest $request
     *
     * @return Response
     */
    public function store(CreateTblTipoInstrumentoRequest $request)
    {
        $input = $request->all();

        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->create($input);

        Flash::success('TblTipoInstrumento saved successfully.');

        return redirect(route('tblTipoInstrumentos.index'));
    }

    /**
     * Display the specified TblTipoInstrumento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tblTipoInstrumento)) {
            Flash::error('TblTipoInstrumento not found');

            return redirect(route('tblTipoInstrumentos.index'));
        }

        return view('tblTipoInstrumentos.show')->with('tblTipoInstrumento', $tblTipoInstrumento);
    }

    /**
     * Show the form for editing the specified TblTipoInstrumento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tblTipoInstrumento)) {
            Flash::error('TblTipoInstrumento not found');

            return redirect(route('tblTipoInstrumentos.index'));
        }

        return view('tblTipoInstrumentos.edit')->with('tblTipoInstrumento', $tblTipoInstrumento);
    }

    /**
     * Update the specified TblTipoInstrumento in storage.
     *
     * @param  int              $id
     * @param UpdateTblTipoInstrumentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblTipoInstrumentoRequest $request)
    {
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tblTipoInstrumento)) {
            Flash::error('TblTipoInstrumento not found');

            return redirect(route('tblTipoInstrumentos.index'));
        }

        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->update($request->all(), $id);

        Flash::success('TblTipoInstrumento updated successfully.');

        return redirect(route('tblTipoInstrumentos.index'));
    }

    /**
     * Remove the specified TblTipoInstrumento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->findWithoutFail($id);

        if (empty($tblTipoInstrumento)) {
            Flash::error('TblTipoInstrumento not found');

            return redirect(route('tblTipoInstrumentos.index'));
        }

        $this->tblTipoInstrumentoRepository->delete($id);

        Flash::success('TblTipoInstrumento deleted successfully.');

        return redirect(route('tblTipoInstrumentos.index'));
    }
}
