<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\tblCategoriaempDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreatetblCategoriaempRequest;
use FreelancerOnline\Http\Requests\UpdatetblCategoriaempRequest;
use FreelancerOnline\Repositories\tblCategoriaempRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class tblCategoriaempController extends AppBaseController
{
    /** @var  tblCategoriaempRepository */
    private $tblCategoriaempRepository;

    public function __construct(tblCategoriaempRepository $tblCategoriaempRepo)
    {
        $this->tblCategoriaempRepository = $tblCategoriaempRepo;
    }

    /**
     * Display a listing of the tblCategoriaemp.
     *
     * @param tblCategoriaempDataTable $tblCategoriaempDataTable
     * @return Response
     */
    public function index(tblCategoriaempDataTable $tblCategoriaempDataTable)
    {
        return $tblCategoriaempDataTable->render('tblCategoriaemps.index');
    }

    /**
     * Show the form for creating a new tblCategoriaemp.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblCategoriaemps.create');
    }

    /**
     * Store a newly created tblCategoriaemp in storage.
     *
     * @param CreatetblCategoriaempRequest $request
     *
     * @return Response
     */
    public function store(CreatetblCategoriaempRequest $request)
    {
        $input = $request->all();

        $tblCategoriaemp = $this->tblCategoriaempRepository->create($input);

        Flash::success('tblCategoriaemp saved successfully.');

        return redirect(route('tblCategoriaemps.index'));
    }

    /**
     * Display the specified tblCategoriaemp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblCategoriaemp = $this->tblCategoriaempRepository->findWithoutFail($id);

        if (empty($tblCategoriaemp)) {
            Flash::error('tblCategoriaemp not found');

            return redirect(route('tblCategoriaemps.index'));
        }

        return view('tblCategoriaemps.show')->with('tblCategoriaemp', $tblCategoriaemp);
    }

    /**
     * Show the form for editing the specified tblCategoriaemp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblCategoriaemp = $this->tblCategoriaempRepository->findWithoutFail($id);

        if (empty($tblCategoriaemp)) {
            Flash::error('tblCategoriaemp not found');

            return redirect(route('tblCategoriaemps.index'));
        }

        return view('tblCategoriaemps.edit')->with('tblCategoriaemp', $tblCategoriaemp);
    }

    /**
     * Update the specified tblCategoriaemp in storage.
     *
     * @param  int              $id
     * @param UpdatetblCategoriaempRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblCategoriaempRequest $request)
    {
        $tblCategoriaemp = $this->tblCategoriaempRepository->findWithoutFail($id);

        if (empty($tblCategoriaemp)) {
            Flash::error('tblCategoriaemp not found');

            return redirect(route('tblCategoriaemps.index'));
        }

        $tblCategoriaemp = $this->tblCategoriaempRepository->update($request->all(), $id);

        Flash::success('tblCategoriaemp updated successfully.');

        return redirect(route('tblCategoriaemps.index'));
    }

    /**
     * Remove the specified tblCategoriaemp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblCategoriaemp = $this->tblCategoriaempRepository->findWithoutFail($id);

        if (empty($tblCategoriaemp)) {
            Flash::error('tblCategoriaemp not found');

            return redirect(route('tblCategoriaemps.index'));
        }

        $this->tblCategoriaempRepository->delete($id);

        Flash::success('tblCategoriaemp deleted successfully.');

        return redirect(route('tblCategoriaemps.index'));
    }
}
