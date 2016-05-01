<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\bancosDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreatebancosRequest;
use FreelancerOnline\Http\Requests\UpdatebancosRequest;
use FreelancerOnline\Repositories\bancosRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class bancosController extends AppBaseController
{
    /** @var  bancosRepository */
    private $bancosRepository;

    public function __construct(bancosRepository $bancosRepo)
    {
        $this->bancosRepository = $bancosRepo;
    }

    /**
     * Display a listing of the bancos.
     *
     * @param bancosDataTable $bancosDataTable
     * @return Response
     */
    public function index(bancosDataTable $bancosDataTable)
    {
        return $bancosDataTable->render('bancos.index');
    }

    /**
     * Show the form for creating a new bancos.
     *
     * @return Response
     */
    public function create()
    {
        return view('bancos.create');
    }

    /**
     * Store a newly created bancos in storage.
     *
     * @param CreatebancosRequest $request
     *
     * @return Response
     */
    public function store(CreatebancosRequest $request)
    {
        $input = $request->all();

        $bancos = $this->bancosRepository->create($input);

        Flash::success('bancos saved successfully.');

        return redirect(route('bancos.index'));
    }

    /**
     * Display the specified bancos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bancos = $this->bancosRepository->findWithoutFail($id);

        if (empty($bancos)) {
            Flash::error('bancos not found');

            return redirect(route('bancos.index'));
        }

        return view('bancos.show')->with('bancos', $bancos);
    }

    /**
     * Show the form for editing the specified bancos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bancos = $this->bancosRepository->findWithoutFail($id);

        if (empty($bancos)) {
            Flash::error('bancos not found');

            return redirect(route('bancos.index'));
        }

        return view('bancos.edit')->with('bancos', $bancos);
    }

    /**
     * Update the specified bancos in storage.
     *
     * @param  int              $id
     * @param UpdatebancosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebancosRequest $request)
    {
        $bancos = $this->bancosRepository->findWithoutFail($id);

        if (empty($bancos)) {
            Flash::error('bancos not found');

            return redirect(route('bancos.index'));
        }

        $bancos = $this->bancosRepository->update($request->all(), $id);

        Flash::success('bancos updated successfully.');

        return redirect(route('bancos.index'));
    }

    /**
     * Remove the specified bancos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bancos = $this->bancosRepository->findWithoutFail($id);

        if (empty($bancos)) {
            Flash::error('bancos not found');

            return redirect(route('bancos.index'));
        }

        $this->bancosRepository->delete($id);

        Flash::success('bancos deleted successfully.');

        return redirect(route('bancos.index'));
    }
}
