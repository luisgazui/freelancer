<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblCategoriasDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblCategoriasRequest;
use FreelancerOnline\Http\Requests\UpdateTblCategoriasRequest;
use FreelancerOnline\Repositories\TblCategoriasRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblCategoriasController extends AppBaseController
{
    /** @var  TblCategoriasRepository */
    private $tblCategoriasRepository;

    public function __construct(TblCategoriasRepository $tblCategoriasRepo)
    {
        $this->tblCategoriasRepository = $tblCategoriasRepo;
    }

    /**
     * Display a listing of the TblCategorias.
     *
     * @param TblCategoriasDataTable $tblCategoriasDataTable
     * @return Response
     */
    public function index(TblCategoriasDataTable $tblCategoriasDataTable)
    {
        return $tblCategoriasDataTable->render('tblCategorias.index');
    }

    /**
     * Show the form for creating a new TblCategorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblCategorias.create');
    }

    /**
     * Store a newly created TblCategorias in storage.
     *
     * @param CreateTblCategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreateTblCategoriasRequest $request)
    {
        $input = $request->all();

        $tblCategorias = $this->tblCategoriasRepository->create($input);

        Flash::success('TblCategorias saved successfully.');

        return redirect(route('tblCategorias.index'));
    }

    /**
     * Display the specified TblCategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblCategorias = $this->tblCategoriasRepository->findWithoutFail($id);

        if (empty($tblCategorias)) {
            Flash::error('TblCategorias not found');

            return redirect(route('tblCategorias.index'));
        }

        return view('tblCategorias.show')->with('tblCategorias', $tblCategorias);
    }

    /**
     * Show the form for editing the specified TblCategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblCategorias = $this->tblCategoriasRepository->findWithoutFail($id);

        if (empty($tblCategorias)) {
            Flash::error('TblCategorias not found');

            return redirect(route('tblCategorias.index'));
        }

        return view('tblCategorias.edit')->with('tblCategorias', $tblCategorias);
    }

    /**
     * Update the specified TblCategorias in storage.
     *
     * @param  int              $id
     * @param UpdateTblCategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblCategoriasRequest $request)
    {
        $tblCategorias = $this->tblCategoriasRepository->findWithoutFail($id);

        if (empty($tblCategorias)) {
            Flash::error('TblCategorias not found');

            return redirect(route('tblCategorias.index'));
        }

        $tblCategorias = $this->tblCategoriasRepository->update($request->all(), $id);

        Flash::success('TblCategorias updated successfully.');

        return redirect(route('tblCategorias.index'));
    }

    /**
     * Remove the specified TblCategorias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblCategorias = $this->tblCategoriasRepository->findWithoutFail($id);

        if (empty($tblCategorias)) {
            Flash::error('TblCategorias not found');

            return redirect(route('tblCategorias.index'));
        }

        $this->tblCategoriasRepository->delete($id);

        Flash::success('TblCategorias deleted successfully.');

        return redirect(route('tblCategorias.index'));
    }
}
