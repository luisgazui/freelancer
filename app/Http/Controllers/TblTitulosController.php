<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblTitulosDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblTitulosRequest;
use FreelancerOnline\Http\Requests\UpdateTblTitulosRequest;
use FreelancerOnline\Repositories\TblTitulosRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblTitulosController extends AppBaseController
{
    /** @var  TblTitulosRepository */
    private $tblTitulosRepository;

    public function __construct(TblTitulosRepository $tblTitulosRepo)
    {
        $this->tblTitulosRepository = $tblTitulosRepo;
    }

    /**
     * Display a listing of the TblTitulos.
     *
     * @param TblTitulosDataTable $tblTitulosDataTable
     * @return Response
     */
    public function index(TblTitulosDataTable $tblTitulosDataTable)
    {
        return $tblTitulosDataTable->render('tblTitulos.index');
    }

    /**
     * Show the form for creating a new TblTitulos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblTitulos.create');
    }

    /**
     * Store a newly created TblTitulos in storage.
     *
     * @param CreateTblTitulosRequest $request
     *
     * @return Response
     */
    public function store(CreateTblTitulosRequest $request)
    {
        $input = $request->all();

        $tblTitulos = $this->tblTitulosRepository->create($input);

        Flash::success('TblTitulos saved successfully.');

        return redirect(route('tblTitulos.index'));
    }

    /**
     * Display the specified TblTitulos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblTitulos = $this->tblTitulosRepository->findWithoutFail($id);

        if (empty($tblTitulos)) {
            Flash::error('TblTitulos not found');

            return redirect(route('tblTitulos.index'));
        }

        return view('tblTitulos.show')->with('tblTitulos', $tblTitulos);
    }

    /**
     * Show the form for editing the specified TblTitulos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblTitulos = $this->tblTitulosRepository->findWithoutFail($id);

        if (empty($tblTitulos)) {
            Flash::error('TblTitulos not found');

            return redirect(route('tblTitulos.index'));
        }

        return view('tblTitulos.edit')->with('tblTitulos', $tblTitulos);
    }

    /**
     * Update the specified TblTitulos in storage.
     *
     * @param  int              $id
     * @param UpdateTblTitulosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblTitulosRequest $request)
    {
        $tblTitulos = $this->tblTitulosRepository->findWithoutFail($id);

        if (empty($tblTitulos)) {
            Flash::error('TblTitulos not found');

            return redirect(route('tblTitulos.index'));
        }

        $tblTitulos = $this->tblTitulosRepository->update($request->all(), $id);

        Flash::success('TblTitulos updated successfully.');

        return redirect(route('tblTitulos.index'));
    }

    /**
     * Remove the specified TblTitulos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblTitulos = $this->tblTitulosRepository->findWithoutFail($id);

        if (empty($tblTitulos)) {
            Flash::error('TblTitulos not found');

            return redirect(route('tblTitulos.index'));
        }

        $this->tblTitulosRepository->delete($id);

        Flash::success('TblTitulos deleted successfully.');

        return redirect(route('tblTitulos.index'));
    }
}
