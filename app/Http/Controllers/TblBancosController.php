<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\TblBancosDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateTblBancosRequest;
use FreelancerOnline\Http\Requests\UpdateTblBancosRequest;
use FreelancerOnline\Repositories\TblBancosRepository;
use FreelancerOnline\Repositories\TblPaisesRepository;
use FreelancerOnline\Models\TblPaises;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class TblBancosController extends AppBaseController
{
    /** @var  TblBancosRepository */
    private $tblBancosRepository;

    public function __construct(TblBancosRepository $tblBancosRepo)
    {
        $this->tblBancosRepository = $tblBancosRepo;
    }

    /**
     * Display a listing of the TblBancos.
     *
     * @param TblBancosDataTable $tblBancosDataTable
     * @return Response
     */
    public function index(TblBancosDataTable $tblBancosDataTable)
    {
        return $tblBancosDataTable->render('tblBancos.index');
    }

    /**
     * Show the form for creating a new TblBancos.
     *
     * @return Response
     */
    public function create()
    {
        $pais = TblPaises::lists('Nombre','id');
        return view('tblBancos.create', compact('pais') );
    }

    /**
     * Store a newly created TblBancos in storage.
     *
     * @param CreateTblBancosRequest $request
     *
     * @return Response
     */
    public function store(CreateTblBancosRequest $request)
    {
        $input = $request->all();

        $tblBancos = $this->tblBancosRepository->create($input);

        Flash::success('TblBancos saved successfully.');

        return redirect(route('tblBancos.index'));
    }

    /**
     * Display the specified TblBancos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblBancos = $this->tblBancosRepository->findWithoutFail($id);

        if (empty($tblBancos)) {
            Flash::error('TblBancos not found');

            return redirect(route('tblBancos.index'));
        }

        return view('tblBancos.show')->with('tblBancos', $tblBancos);
    }

    /**
     * Show the form for editing the specified TblBancos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pais = TblPaises::lists('Nombre','id');
        $tblBancos = $this->tblBancosRepository->findWithoutFail($id);

        if (empty($tblBancos)) {
            Flash::error('TblBancos not found');

            return redirect(route('tblBancos.index'));
        }

        return view('tblBancos.edit',compact('pais'))->with('tblBancos', $tblBancos);
    }

    /**
     * Update the specified TblBancos in storage.
     *
     * @param  int              $id
     * @param UpdateTblBancosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTblBancosRequest $request)
    {
        $tblBancos = $this->tblBancosRepository->findWithoutFail($id);

        if (empty($tblBancos)) {
            Flash::error('TblBancos not found');

            return redirect(route('tblBancos.index'));
        }

        $tblBancos = $this->tblBancosRepository->update($request->all(), $id);

        Flash::success('TblBancos updated successfully.');

        return redirect(route('tblBancos.index'));
    }

    /**
     * Remove the specified TblBancos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblBancos = $this->tblBancosRepository->findWithoutFail($id);

        if (empty($tblBancos)) {
            Flash::error('TblBancos not found');

            return redirect(route('tblBancos.index'));
        }

        $this->tblBancosRepository->delete($id);

        Flash::success('TblBancos deleted successfully.');

        return redirect(route('tblBancos.index'));
    }
}
