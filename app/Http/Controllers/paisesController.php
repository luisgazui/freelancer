<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\paisesDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreatepaisesRequest;
use FreelancerOnline\Http\Requests\UpdatepaisesRequest;
use FreelancerOnline\Repositories\paisesRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class paisesController extends AppBaseController
{
    /** @var  paisesRepository */
    private $paisesRepository;

    public function __construct(paisesRepository $paisesRepo)
    {
        $this->paisesRepository = $paisesRepo;
    }

    /**
     * Display a listing of the paises.
     *
     * @param paisesDataTable $paisesDataTable
     * @return Response
     */
    public function index(paisesDataTable $paisesDataTable)
    {
        return $paisesDataTable->render('paises.index');
    }

    /**
     * Show the form for creating a new paises.
     *
     * @return Response
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created paises in storage.
     *
     * @param CreatepaisesRequest $request
     *
     * @return Response
     */
    public function store(CreatepaisesRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        Flash::success('paises saved successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Display the specified paises.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paises = $this->paisesRepository->findWithoutFail($id);

        if (empty($paises)) {
            Flash::error('paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.show')->with('paises', $paises);
    }

    /**
     * Show the form for editing the specified paises.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paises = $this->paisesRepository->findWithoutFail($id);

        if (empty($paises)) {
            Flash::error('paises not found');

            return redirect(route('paises.index'));
        }

        return view('paises.edit')->with('paises', $paises);
    }

    /**
     * Update the specified paises in storage.
     *
     * @param  int              $id
     * @param UpdatepaisesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepaisesRequest $request)
    {
        $paises = $this->paisesRepository->findWithoutFail($id);

        if (empty($paises)) {
            Flash::error('paises not found');

            return redirect(route('paises.index'));
        }

        $paises = $this->paisesRepository->update($request->all(), $id);

        Flash::success('paises updated successfully.');

        return redirect(route('paises.index'));
    }

    /**
     * Remove the specified paises from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paises = $this->paisesRepository->findWithoutFail($id);

        if (empty($paises)) {
            Flash::error('paises not found');

            return redirect(route('paises.index'));
        }

        $this->paisesRepository->delete($id);

        Flash::success('paises deleted successfully.');

        return redirect(route('paises.index'));
    }
}
