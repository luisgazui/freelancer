<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblTipousuarioDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblTipousuarioRequest;
use FreelancerOnline\Http\Requests\UpdateTblTipousuarioRequest;
use FreelancerOnline\Repositories\TblTipousuarioRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblTipousuarioController extends AppBaseController
{
    /** @var  TblTipousuarioRepository */
    private $tblTipousuarioRepository;

    public function __construct(TblTipousuarioRepository $tblTipousuarioRepo)
    {
        $this->tblTipousuarioRepository = $tblTipousuarioRepo;
    }

    /**
     * Display a listing of the TblTipousuario.
     *
     * @param TblTipousuarioDataTable $tblTipousuarioDataTable
     * @return Response
     */
    public function index(TblTipousuarioDataTable $tblTipousuarioDataTable)
    {
        return $tblTipousuarioDataTable->render('tblTipousuarios.index');
    }

    /**
     * Show the form for creating a new TblTipousuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblTipousuarios.create');
    }

    /**
     * Store a newly created TblTipousuario in storage.
     *
     * @param CreateTblTipousuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateTblTipousuarioRequest $request)
    {
        $input = $request->all();

        $tblTipousuario = $this->tblTipousuarioRepository->create($input);

        Flash::success('TblTipousuario saved successfully.');

        return redirect(route('tblTipousuarios.index'));
    }

    /**
     * Display the specified TblTipousuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblTipousuario = $this->tblTipousuarioRepository->findWithoutFail($id);

        if (empty($tblTipousuario)) {
            Flash::error('TblTipousuario not found');

            return redirect(route('tblTipousuarios.index'));
        }

        return view('tblTipousuarios.show')->with('tblTipousuario', $tblTipousuario);
    }

    /**
     * Show the form for editing the specified TblTipousuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblTipousuario = $this->tblTipousuarioRepository->findWithoutFail($id);

        if (empty($tblTipousuario)) {
            Flash::error('TblTipousuario not found');

            return redirect(route('tblTipousuarios.index'));
        }

        return view('tblTipousuarios.edit')->with('tblTipousuario', $tblTipousuario);
    }

    /**
     * Update the specified TblTipousuario in storage.
     *
     * @param  int              $id
     * @param UpdateTblTipousuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblTipousuarioRequest $request)
    {
        $tblTipousuario = $this->tblTipousuarioRepository->findWithoutFail($id);

        if (empty($tblTipousuario)) {
            Flash::error('TblTipousuario not found');

            return redirect(route('tblTipousuarios.index'));
        }

        $tblTipousuario = $this->tblTipousuarioRepository->update($request->all(), $id);

        Flash::success('TblTipousuario updated successfully.');

        return redirect(route('tblTipousuarios.index'));
    }

    /**
     * Remove the specified TblTipousuario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblTipousuario = $this->tblTipousuarioRepository->findWithoutFail($id);

        if (empty($tblTipousuario)) {
            Flash::error('TblTipousuario not found');

            return redirect(route('tblTipousuarios.index'));
        }

        $this->tblTipousuarioRepository->delete($id);

        Flash::success('TblTipousuario deleted successfully.');

        return redirect(route('tblTipousuarios.index'));
    }
}
