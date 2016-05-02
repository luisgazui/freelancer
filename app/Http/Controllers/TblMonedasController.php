<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblMonedasDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblMonedasRequest;
use FreelancerOnline\Http\Requests\UpdateTblMonedasRequest;
use FreelancerOnline\Repositories\TblMonedasRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblMonedasController extends AppBaseController
{
    /** @var  TblMonedasRepository */
    private $tblMonedasRepository;

    public function __construct(TblMonedasRepository $tblMonedasRepo)
    {
        $this->tblMonedasRepository = $tblMonedasRepo;
    }

    /**
     * Display a listing of the TblMonedas.
     *
     * @param TblMonedasDataTable $tblMonedasDataTable
     * @return Response
     */
    public function index(TblMonedasDataTable $tblMonedasDataTable)
    {
        return $tblMonedasDataTable->render('tblMonedas.index');
    }

    /**
     * Show the form for creating a new TblMonedas.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblMonedas.create');
    }

    /**
     * Store a newly created TblMonedas in storage.
     *
     * @param CreateTblMonedasRequest $request
     *
     * @return Response
     */
    public function store(CreateTblMonedasRequest $request)
    {
        $input = $request->all();

        $tblMonedas = $this->tblMonedasRepository->create($input);

        Flash::success('TblMonedas saved successfully.');

        return redirect(route('tblMonedas.index'));
    }

    /**
     * Display the specified TblMonedas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblMonedas = $this->tblMonedasRepository->findWithoutFail($id);

        if (empty($tblMonedas)) {
            Flash::error('TblMonedas not found');

            return redirect(route('tblMonedas.index'));
        }

        return view('tblMonedas.show')->with('tblMonedas', $tblMonedas);
    }

    /**
     * Show the form for editing the specified TblMonedas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblMonedas = $this->tblMonedasRepository->findWithoutFail($id);

        if (empty($tblMonedas)) {
            Flash::error('TblMonedas not found');

            return redirect(route('tblMonedas.index'));
        }

        return view('tblMonedas.edit')->with('tblMonedas', $tblMonedas);
    }

    /**
     * Update the specified TblMonedas in storage.
     *
     * @param  int              $id
     * @param UpdateTblMonedasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblMonedasRequest $request)
    {
        $tblMonedas = $this->tblMonedasRepository->findWithoutFail($id);

        if (empty($tblMonedas)) {
            Flash::error('TblMonedas not found');

            return redirect(route('tblMonedas.index'));
        }

        $tblMonedas = $this->tblMonedasRepository->update($request->all(), $id);

        Flash::success('TblMonedas updated successfully.');

        return redirect(route('tblMonedas.index'));
    }

    /**
     * Remove the specified TblMonedas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblMonedas = $this->tblMonedasRepository->findWithoutFail($id);

        if (empty($tblMonedas)) {
            Flash::error('TblMonedas not found');

            return redirect(route('tblMonedas.index'));
        }

        $this->tblMonedasRepository->delete($id);

        Flash::success('TblMonedas deleted successfully.');

        return redirect(route('tblMonedas.index'));
    }
}
