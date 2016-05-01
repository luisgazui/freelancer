<?php

namespace App\Http\Controllers;

use App\DataTables\categoriasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecategoriasRequest;
use App\Http\Requests\UpdatecategoriasRequest;
use App\Repositories\categoriasRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;

class categoriasController extends AppBaseController
{
    /** @var  categoriasRepository */
    private $categoriasRepository;

    public function __construct(categoriasRepository $categoriasRepo)
    {
        $this->categoriasRepository = $categoriasRepo;
    }

    /**
     * Display a listing of the categorias.
     *
     * @param categoriasDataTable $categoriasDataTable
     * @return Response
     */
    public function index(categoriasDataTable $categoriasDataTable)
    {
        return $categoriasDataTable->render('categorias.index');
    }

    /**
     * Show the form for creating a new categorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created categorias in storage.
     *
     * @param CreatecategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriasRequest $request)
    {
        $input = $request->all();

        $categorias = $this->categoriasRepository->create($input);

        Flash::success('categorias saved successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified categorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('categorias not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categorias', $categorias);
    }

    /**
     * Show the form for editing the specified categorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('categorias not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categorias', $categorias);
    }

    /**
     * Update the specified categorias in storage.
     *
     * @param  int              $id
     * @param UpdatecategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriasRequest $request)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('categorias not found');

            return redirect(route('categorias.index'));
        }

        $categorias = $this->categoriasRepository->update($request->all(), $id);

        Flash::success('categorias updated successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified categorias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categorias = $this->categoriasRepository->findWithoutFail($id);

        if (empty($categorias)) {
            Flash::error('categorias not found');

            return redirect(route('categorias.index'));
        }

        $this->categoriasRepository->delete($id);

        Flash::success('categorias deleted successfully.');

        return redirect(route('categorias.index'));
    }
}
