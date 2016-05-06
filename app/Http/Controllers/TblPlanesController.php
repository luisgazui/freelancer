<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblPlanesDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblPlanesRequest;
use FreelancerOnline\Http\Requests\UpdateTblPlanesRequest;
use FreelancerOnline\Repositories\TblPlanesRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblPlanesController extends AppBaseController
{
    /** @var  TblPlanesRepository */
    private $tblPlanesRepository;

    public function __construct(TblPlanesRepository $tblPlanesRepo)
    {
        $this->tblPlanesRepository = $tblPlanesRepo;
    }

    /**
     * Display a listing of the TblPlanes.
     *
     * @param TblPlanesDataTable $tblPlanesDataTable
     * @return Response
     */
    public function index(TblPlanesDataTable $tblPlanesDataTable)
    {
        return $tblPlanesDataTable->render('tblPlanes.index');
    }

    /**
     * Show the form for creating a new TblPlanes.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblPlanes.create');
    }

    /**
     * Store a newly created TblPlanes in storage.
     *
     * @param CreateTblPlanesRequest $request
     *
     * @return Response
     */
    public function store(CreateTblPlanesRequest $request)
    {
        $input = $request->all();

        $tblPlanes = $this->tblPlanesRepository->create($input);

        Flash::success('TblPlanes saved successfully.');

        return redirect(route('tblPlanes.index'));
    }

    /**
     * Display the specified TblPlanes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblPlanes = $this->tblPlanesRepository->findWithoutFail($id);

        if (empty($tblPlanes)) {
            Flash::error('TblPlanes not found');

            return redirect(route('tblPlanes.index'));
        }

        return view('tblPlanes.show')->with('tblPlanes', $tblPlanes);
    }

    /**
     * Show the form for editing the specified TblPlanes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblPlanes = $this->tblPlanesRepository->findWithoutFail($id);

        if (empty($tblPlanes)) {
            Flash::error('TblPlanes not found');

            return redirect(route('tblPlanes.index'));
        }

        return view('tblPlanes.edit')->with('tblPlanes', $tblPlanes);
    }

    /**
     * Update the specified TblPlanes in storage.
     *
     * @param  int              $id
     * @param UpdateTblPlanesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblPlanesRequest $request)
    {
        $tblPlanes = $this->tblPlanesRepository->findWithoutFail($id);

        if (empty($tblPlanes)) {
            Flash::error('TblPlanes not found');

            return redirect(route('tblPlanes.index'));
        }

        $tblPlanes = $this->tblPlanesRepository->update($request->all(), $id);

        Flash::success('TblPlanes updated successfully.');

        return redirect(route('tblPlanes.index'));
    }

    /**
     * Remove the specified TblPlanes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblPlanes = $this->tblPlanesRepository->findWithoutFail($id);

        if (empty($tblPlanes)) {
            Flash::error('TblPlanes not found');

            return redirect(route('tblPlanes.index'));
        }

        $this->tblPlanesRepository->delete($id);

        Flash::success('TblPlanes deleted successfully.');

        return redirect(route('tblPlanes.index'));
    }
}
