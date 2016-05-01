<?php

namespace App\Http\Controllers;

use App\DataTables\TblPaisesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTblPaisesRequest;
use App\Http\Requests\UpdateTblPaisesRequest;
use App\Repositories\TblPaisesRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblPaisesController extends AppBaseController
{
    /** @var  TblPaisesRepository */
    private $tblPaisesRepository;

    public function __construct(TblPaisesRepository $tblPaisesRepo)
    {
        $this->tblPaisesRepository = $tblPaisesRepo;
    }

    /**
     * Display a listing of the TblPaises.
     *
     * @param TblPaisesDataTable $tblPaisesDataTable
     * @return Response
     */
    public function index(TblPaisesDataTable $tblPaisesDataTable)
    {
        return $tblPaisesDataTable->render('tblPaises.index');
    }

    /**
     * Show the form for creating a new TblPaises.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblPaises.create');
    }

    /**
     * Store a newly created TblPaises in storage.
     *
     * @param CreateTblPaisesRequest $request
     *
     * @return Response
     */
    public function store(CreateTblPaisesRequest $request)
    {
        $input = $request->all();

        $tblPaises = $this->tblPaisesRepository->create($input);

        Flash::success('TblPaises saved successfully.');

        return redirect(route('tblPaises.index'));
    }

    /**
     * Display the specified TblPaises.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblPaises = $this->tblPaisesRepository->findWithoutFail($id);

        if (empty($tblPaises)) {
            Flash::error('TblPaises not found');

            return redirect(route('tblPaises.index'));
        }

        return view('tblPaises.show')->with('tblPaises', $tblPaises);
    }

    /**
     * Show the form for editing the specified TblPaises.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblPaises = $this->tblPaisesRepository->findWithoutFail($id);

        if (empty($tblPaises)) {
            Flash::error('TblPaises not found');

            return redirect(route('tblPaises.index'));
        }

        return view('tblPaises.edit')->with('tblPaises', $tblPaises);
    }

    /**
     * Update the specified TblPaises in storage.
     *
     * @param  int              $id
     * @param UpdateTblPaisesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblPaisesRequest $request)
    {
        $tblPaises = $this->tblPaisesRepository->findWithoutFail($id);

        if (empty($tblPaises)) {
            Flash::error('TblPaises not found');

            return redirect(route('tblPaises.index'));
        }

        $tblPaises = $this->tblPaisesRepository->update($request->all(), $id);

        Flash::success('TblPaises updated successfully.');

        return redirect(route('tblPaises.index'));
    }

    /**
     * Remove the specified TblPaises from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblPaises = $this->tblPaisesRepository->findWithoutFail($id);

        if (empty($tblPaises)) {
            Flash::error('TblPaises not found');

            return redirect(route('tblPaises.index'));
        }

        $this->tblPaisesRepository->delete($id);

        Flash::success('TblPaises deleted successfully.');

        return redirect(route('tblPaises.index'));
    }
}
