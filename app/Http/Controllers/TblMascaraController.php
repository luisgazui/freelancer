<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblMascaraDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblMascaraRequest;
use FreelancerOnline\Http\Requests\UpdateTblMascaraRequest;
use FreelancerOnline\Repositories\TblMascaraRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblMascaraController extends AppBaseController
{
    /** @var  TblMascaraRepository */
    private $tblMascaraRepository;

    public function __construct(TblMascaraRepository $tblMascaraRepo)
    {
        $this->tblMascaraRepository = $tblMascaraRepo;
    }

    /**
     * Display a listing of the TblMascara.
     *
     * @param TblMascaraDataTable $tblMascaraDataTable
     * @return Response
     */
    public function index(TblMascaraDataTable $tblMascaraDataTable)
    {
        return $tblMascaraDataTable->render('tblMascaras.index');
    }

    /**
     * Show the form for creating a new TblMascara.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblMascaras.create');
    }

    /**
     * Store a newly created TblMascara in storage.
     *
     * @param CreateTblMascaraRequest $request
     *
     * @return Response
     */
    public function store(CreateTblMascaraRequest $request)
    {
        $input = $request->all();

        $tblMascara = $this->tblMascaraRepository->create($input);

        Flash::success('TblMascara saved successfully.');

        return redirect(route('tblMascaras.index'));
    }

    /**
     * Display the specified TblMascara.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblMascara = $this->tblMascaraRepository->findWithoutFail($id);

        if (empty($tblMascara)) {
            Flash::error('TblMascara not found');

            return redirect(route('tblMascaras.index'));
        }

        return view('tblMascaras.show')->with('tblMascara', $tblMascara);
    }

    /**
     * Show the form for editing the specified TblMascara.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblMascara = $this->tblMascaraRepository->findWithoutFail($id);

        if (empty($tblMascara)) {
            Flash::error('TblMascara not found');

            return redirect(route('tblMascaras.index'));
        }

        return view('tblMascaras.edit')->with('tblMascara', $tblMascara);
    }

    /**
     * Update the specified TblMascara in storage.
     *
     * @param  int              $id
     * @param UpdateTblMascaraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblMascaraRequest $request)
    {
        $tblMascara = $this->tblMascaraRepository->findWithoutFail($id);

        if (empty($tblMascara)) {
            Flash::error('TblMascara not found');

            return redirect(route('tblMascaras.index'));
        }

        $tblMascara = $this->tblMascaraRepository->update($request->all(), $id);

        Flash::success('TblMascara updated successfully.');

        return redirect(route('tblMascaras.index'));
    }

    /**
     * Remove the specified TblMascara from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblMascara = $this->tblMascaraRepository->findWithoutFail($id);

        if (empty($tblMascara)) {
            Flash::error('TblMascara not found');

            return redirect(route('tblMascaras.index'));
        }

        $this->tblMascaraRepository->delete($id);

        Flash::success('TblMascara deleted successfully.');

        return redirect(route('tblMascaras.index'));
    }
}
