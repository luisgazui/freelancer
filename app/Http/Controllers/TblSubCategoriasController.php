<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblSubCategoriasDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblSubCategoriasRequest;
use FreelancerOnline\Http\Requests\UpdateTblSubCategoriasRequest;
use FreelancerOnline\Repositories\TblSubCategoriasRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblSubCategoriasController extends AppBaseController
{
    /** @var  TblSubCategoriasRepository */
    private $tblSubCategoriasRepository;

    public function __construct(TblSubCategoriasRepository $tblSubCategoriasRepo)
    {
        $this->tblSubCategoriasRepository = $tblSubCategoriasRepo;
    }

    /**
     * Display a listing of the TblSubCategorias.
     *
     * @param TblSubCategoriasDataTable $tblSubCategoriasDataTable
     * @return Response
     */
    public function index(TblSubCategoriasDataTable $tblSubCategoriasDataTable)
    {
        return $tblSubCategoriasDataTable->render('tblSubCategorias.index');
    }

    /**
     * Show the form for creating a new TblSubCategorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblSubCategorias.create');
    }

    /**
     * Store a newly created TblSubCategorias in storage.
     *
     * @param CreateTblSubCategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreateTblSubCategoriasRequest $request)
    {
        $input = $request->all();

        $tblSubCategorias = $this->tblSubCategoriasRepository->create($input);

        Flash::success('TblSubCategorias saved successfully.');

        return redirect(route('tblSubCategorias.index'));
    }

    /**
     * Display the specified TblSubCategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblSubCategorias = $this->tblSubCategoriasRepository->findWithoutFail($id);

        if (empty($tblSubCategorias)) {
            Flash::error('TblSubCategorias not found');

            return redirect(route('tblSubCategorias.index'));
        }

        return view('tblSubCategorias.show')->with('tblSubCategorias', $tblSubCategorias);
    }

    /**
     * Show the form for editing the specified TblSubCategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblSubCategorias = $this->tblSubCategoriasRepository->findWithoutFail($id);

        if (empty($tblSubCategorias)) {
            Flash::error('TblSubCategorias not found');

            return redirect(route('tblSubCategorias.index'));
        }

        return view('tblSubCategorias.edit')->with('tblSubCategorias', $tblSubCategorias);
    }

    /**
     * Update the specified TblSubCategorias in storage.
     *
     * @param  int              $id
     * @param UpdateTblSubCategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblSubCategoriasRequest $request)
    {
        $tblSubCategorias = $this->tblSubCategoriasRepository->findWithoutFail($id);

        if (empty($tblSubCategorias)) {
            Flash::error('TblSubCategorias not found');

            return redirect(route('tblSubCategorias.index'));
        }

        $tblSubCategorias = $this->tblSubCategoriasRepository->update($request->all(), $id);

        Flash::success('TblSubCategorias updated successfully.');

        return redirect(route('tblSubCategorias.index'));
    }

    /**
     * Remove the specified TblSubCategorias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblSubCategorias = $this->tblSubCategoriasRepository->findWithoutFail($id);

        if (empty($tblSubCategorias)) {
            Flash::error('TblSubCategorias not found');

            return redirect(route('tblSubCategorias.index'));
        }

        $this->tblSubCategoriasRepository->delete($id);

        Flash::success('TblSubCategorias deleted successfully.');

        return redirect(route('tblSubCategorias.index'));
    }
}
