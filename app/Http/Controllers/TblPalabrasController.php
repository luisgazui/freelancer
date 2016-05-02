<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblPalabrasDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblPalabrasRequest;
use FreelancerOnline\Http\Requests\UpdateTblPalabrasRequest;
use FreelancerOnline\Repositories\TblPalabrasRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblPalabrasController extends AppBaseController
{
    /** @var  TblPalabrasRepository */
    private $tblPalabrasRepository;

    public function __construct(TblPalabrasRepository $tblPalabrasRepo)
    {
        $this->tblPalabrasRepository = $tblPalabrasRepo;
    }

    /**
     * Display a listing of the TblPalabras.
     *
     * @param TblPalabrasDataTable $tblPalabrasDataTable
     * @return Response
     */
    public function index(TblPalabrasDataTable $tblPalabrasDataTable)
    {
        return $tblPalabrasDataTable->render('tblPalabras.index');
    }

    /**
     * Show the form for creating a new TblPalabras.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblPalabras.create');
    }

    /**
     * Store a newly created TblPalabras in storage.
     *
     * @param CreateTblPalabrasRequest $request
     *
     * @return Response
     */
    public function store(CreateTblPalabrasRequest $request)
    {
        $input = $request->all();

        $tblPalabras = $this->tblPalabrasRepository->create($input);

        Flash::success('TblPalabras saved successfully.');

        return redirect(route('tblPalabras.index'));
    }

    /**
     * Display the specified TblPalabras.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblPalabras = $this->tblPalabrasRepository->findWithoutFail($id);

        if (empty($tblPalabras)) {
            Flash::error('TblPalabras not found');

            return redirect(route('tblPalabras.index'));
        }

        return view('tblPalabras.show')->with('tblPalabras', $tblPalabras);
    }

    /**
     * Show the form for editing the specified TblPalabras.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblPalabras = $this->tblPalabrasRepository->findWithoutFail($id);

        if (empty($tblPalabras)) {
            Flash::error('TblPalabras not found');

            return redirect(route('tblPalabras.index'));
        }

        return view('tblPalabras.edit')->with('tblPalabras', $tblPalabras);
    }

    /**
     * Update the specified TblPalabras in storage.
     *
     * @param  int              $id
     * @param UpdateTblPalabrasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblPalabrasRequest $request)
    {
        $tblPalabras = $this->tblPalabrasRepository->findWithoutFail($id);

        if (empty($tblPalabras)) {
            Flash::error('TblPalabras not found');

            return redirect(route('tblPalabras.index'));
        }

        $tblPalabras = $this->tblPalabrasRepository->update($request->all(), $id);

        Flash::success('TblPalabras updated successfully.');

        return redirect(route('tblPalabras.index'));
    }

    /**
     * Remove the specified TblPalabras from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblPalabras = $this->tblPalabrasRepository->findWithoutFail($id);

        if (empty($tblPalabras)) {
            Flash::error('TblPalabras not found');

            return redirect(route('tblPalabras.index'));
        }

        $this->tblPalabrasRepository->delete($id);

        Flash::success('TblPalabras deleted successfully.');

        return redirect(route('tblPalabras.index'));
    }
}
