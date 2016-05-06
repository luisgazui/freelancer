<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblTelefonotipoDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblTelefonotipoRequest;
use FreelancerOnline\Http\Requests\UpdateTblTelefonotipoRequest;
use FreelancerOnline\Repositories\TblTelefonotipoRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblTelefonotipoController extends AppBaseController
{
    /** @var  TblTelefonotipoRepository */
    private $tblTelefonotipoRepository;

    public function __construct(TblTelefonotipoRepository $tblTelefonotipoRepo)
    {
        $this->tblTelefonotipoRepository = $tblTelefonotipoRepo;
    }

    /**
     * Display a listing of the TblTelefonotipo.
     *
     * @param TblTelefonotipoDataTable $tblTelefonotipoDataTable
     * @return Response
     */
    public function index(TblTelefonotipoDataTable $tblTelefonotipoDataTable)
    {
        return $tblTelefonotipoDataTable->render('tblTelefonotipos.index');
    }

    /**
     * Show the form for creating a new TblTelefonotipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblTelefonotipos.create');
    }

    /**
     * Store a newly created TblTelefonotipo in storage.
     *
     * @param CreateTblTelefonotipoRequest $request
     *
     * @return Response
     */
    public function store(CreateTblTelefonotipoRequest $request)
    {
        $input = $request->all();

        $tblTelefonotipo = $this->tblTelefonotipoRepository->create($input);

        Flash::success('TblTelefonotipo saved successfully.');

        return redirect(route('tblTelefonotipos.index'));
    }

    /**
     * Display the specified TblTelefonotipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblTelefonotipo = $this->tblTelefonotipoRepository->findWithoutFail($id);

        if (empty($tblTelefonotipo)) {
            Flash::error('TblTelefonotipo not found');

            return redirect(route('tblTelefonotipos.index'));
        }

        return view('tblTelefonotipos.show')->with('tblTelefonotipo', $tblTelefonotipo);
    }

    /**
     * Show the form for editing the specified TblTelefonotipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblTelefonotipo = $this->tblTelefonotipoRepository->findWithoutFail($id);

        if (empty($tblTelefonotipo)) {
            Flash::error('TblTelefonotipo not found');

            return redirect(route('tblTelefonotipos.index'));
        }

        return view('tblTelefonotipos.edit')->with('tblTelefonotipo', $tblTelefonotipo);
    }

    /**
     * Update the specified TblTelefonotipo in storage.
     *
     * @param  int              $id
     * @param UpdateTblTelefonotipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblTelefonotipoRequest $request)
    {
        $tblTelefonotipo = $this->tblTelefonotipoRepository->findWithoutFail($id);

        if (empty($tblTelefonotipo)) {
            Flash::error('TblTelefonotipo not found');

            return redirect(route('tblTelefonotipos.index'));
        }

        $tblTelefonotipo = $this->tblTelefonotipoRepository->update($request->all(), $id);

        Flash::success('TblTelefonotipo updated successfully.');

        return redirect(route('tblTelefonotipos.index'));
    }

    /**
     * Remove the specified TblTelefonotipo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblTelefonotipo = $this->tblTelefonotipoRepository->findWithoutFail($id);

        if (empty($tblTelefonotipo)) {
            Flash::error('TblTelefonotipo not found');

            return redirect(route('tblTelefonotipos.index'));
        }

        $this->tblTelefonotipoRepository->delete($id);

        Flash::success('TblTelefonotipo deleted successfully.');

        return redirect(route('tblTelefonotipos.index'));
    }
}
