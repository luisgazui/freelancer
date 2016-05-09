<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\tblCodpaisDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreatetblCodpaisRequest;
use FreelancerOnline\Http\Requests\UpdatetblCodpaisRequest;
use FreelancerOnline\Repositories\tblCodpaisRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class tblCodpaisController extends AppBaseController
{
    /** @var  tblCodpaisRepository */
    private $tblCodpaisRepository;

    public function __construct(tblCodpaisRepository $tblCodpaisRepo)
    {
        $this->tblCodpaisRepository = $tblCodpaisRepo;
    }

    /**
     * Display a listing of the tblCodpais.
     *
     * @param tblCodpaisDataTable $tblCodpaisDataTable
     * @return Response
     */
    public function index(tblCodpaisDataTable $tblCodpaisDataTable)
    {
        return $tblCodpaisDataTable->render('tblCodpais.index');
    }

    /**
     * Show the form for creating a new tblCodpais.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblCodpais.create');
    }

    /**
     * Store a newly created tblCodpais in storage.
     *
     * @param CreatetblCodpaisRequest $request
     *
     * @return Response
     */
    public function store(CreatetblCodpaisRequest $request)
    {
        $input = $request->all();

        $tblCodpais = $this->tblCodpaisRepository->create($input);

        Flash::success('tblCodpais saved successfully.');

        return redirect(route('tblCodpais.index'));
    }

    /**
     * Display the specified tblCodpais.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblCodpais = $this->tblCodpaisRepository->findWithoutFail($id);

        if (empty($tblCodpais)) {
            Flash::error('tblCodpais not found');

            return redirect(route('tblCodpais.index'));
        }

        return view('tblCodpais.show')->with('tblCodpais', $tblCodpais);
    }

    /**
     * Show the form for editing the specified tblCodpais.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblCodpais = $this->tblCodpaisRepository->findWithoutFail($id);

        if (empty($tblCodpais)) {
            Flash::error('tblCodpais not found');

            return redirect(route('tblCodpais.index'));
        }

        return view('tblCodpais.edit')->with('tblCodpais', $tblCodpais);
    }

    /**
     * Update the specified tblCodpais in storage.
     *
     * @param  int              $id
     * @param UpdatetblCodpaisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblCodpaisRequest $request)
    {
        $tblCodpais = $this->tblCodpaisRepository->findWithoutFail($id);

        if (empty($tblCodpais)) {
            Flash::error('tblCodpais not found');

            return redirect(route('tblCodpais.index'));
        }

        $tblCodpais = $this->tblCodpaisRepository->update($request->all(), $id);

        Flash::success('tblCodpais updated successfully.');

        return redirect(route('tblCodpais.index'));
    }

    /**
     * Remove the specified tblCodpais from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblCodpais = $this->tblCodpaisRepository->findWithoutFail($id);

        if (empty($tblCodpais)) {
            Flash::error('tblCodpais not found');

            return redirect(route('tblCodpais.index'));
        }

        $this->tblCodpaisRepository->delete($id);

        Flash::success('tblCodpais deleted successfully.');

        return redirect(route('tblCodpais.index'));
    }
}
