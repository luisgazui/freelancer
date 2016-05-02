<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblDocumentosDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblDocumentosRequest;
use FreelancerOnline\Http\Requests\UpdateTblDocumentosRequest;
use FreelancerOnline\Repositories\TblDocumentosRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use FreelancerOnline\Models\tblPaises;

class TblDocumentosController extends AppBaseController
{
    /** @var  TblDocumentosRepository */
    private $tblDocumentosRepository;

    public function __construct(TblDocumentosRepository $tblDocumentosRepo)
    {
        $this->tblDocumentosRepository = $tblDocumentosRepo;
    }

    /**
     * Display a listing of the TblDocumentos.
     *
     * @param TblDocumentosDataTable $tblDocumentosDataTable
     * @return Response
     */
    public function index(TblDocumentosDataTable $tblDocumentosDataTable)
    {
        return $tblDocumentosDataTable->render('tblDocumentos.index');
    }

    /**
     * Show the form for creating a new TblDocumentos.
     *
     * @return Response
     */
    public function create()
    {
        $pais = TblPaises::lists('Nombre','id');
        return view('tblDocumentos.create', compact('pais'));
    }

    /**
     * Store a newly created TblDocumentos in storage.
     *
     * @param CreateTblDocumentosRequest $request
     *
     * @return Response
     */
    public function store(CreateTblDocumentosRequest $request)
    {
        $input = $request->all();

        $tblDocumentos = $this->tblDocumentosRepository->create($input);

        Flash::success('TblDocumentos saved successfully.');

        return redirect(route('tblDocumentos.index'));
    }

    /**
     * Display the specified TblDocumentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblDocumentos = $this->tblDocumentosRepository->findWithoutFail($id);

        if (empty($tblDocumentos)) {
            Flash::error('TblDocumentos not found');

            return redirect(route('tblDocumentos.index'));
        }

        return view('tblDocumentos.show')->with('tblDocumentos', $tblDocumentos);
    }

    /**
     * Show the form for editing the specified TblDocumentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pais = TblPaises::lists('Nombre','id');
        $tblDocumentos = $this->tblDocumentosRepository->findWithoutFail($id);

        if (empty($tblDocumentos)) {
            Flash::error('TblDocumentos not found');

            return redirect(route('tblDocumentos.index'));
        }

        return view('tblDocumentos.edit', compact('pais'))->with('tblDocumentos', $tblDocumentos);
    }

    /**
     * Update the specified TblDocumentos in storage.
     *
     * @param  int              $id
     * @param UpdateTblDocumentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblDocumentosRequest $request)
    {
        $tblDocumentos = $this->tblDocumentosRepository->findWithoutFail($id);

        if (empty($tblDocumentos)) {
            Flash::error('TblDocumentos not found');

            return redirect(route('tblDocumentos.index'));
        }

        $tblDocumentos = $this->tblDocumentosRepository->update($request->all(), $id);

        Flash::success('TblDocumentos updated successfully.');

        return redirect(route('tblDocumentos.index'));
    }

    /**
     * Remove the specified TblDocumentos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblDocumentos = $this->tblDocumentosRepository->findWithoutFail($id);

        if (empty($tblDocumentos)) {
            Flash::error('TblDocumentos not found');

            return redirect(route('tblDocumentos.index'));
        }

        $this->tblDocumentosRepository->delete($id);

        Flash::success('TblDocumentos deleted successfully.');

        return redirect(route('tblDocumentos.index'));
    }
}
